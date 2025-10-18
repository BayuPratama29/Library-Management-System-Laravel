<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrow;
use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BorrowController extends Controller
{
    // Admin methods
    public function index()
    {
        $borrows = Borrow::with(['user', 'book'])->paginate(10);
        return view('admin.borrows.index', compact('borrows'));
    }

    public function approve($id)
    {
        $borrow = Borrow::findOrFail($id);
        
        if ($borrow->status === 'pending') {
            $book = $borrow->book;
            if ($book->stock > 0) {
                $borrow->update([
                    'status' => 'approved'
                ]);
                $book->decrement('stock');
                
                return redirect()->route('admin.borrows.index')->with('success', 'Borrow request approved.');
            } else {
                return redirect()->route('admin.borrows.index')->with('error', 'Book is not available.');
            }
        }
        
        return redirect()->route('admin.borrows.index')->with('error', 'Invalid borrow status.');
    }

    public function reject($id)
    {
        $borrow = Borrow::findOrFail($id);
        $borrow->update(['status' => 'rejected']);
        
        return redirect()->route('admin.borrows.index')->with('success', 'Borrow request rejected.');
    }
        

    // Student methods
    public function studentIndex()
    {
        $userId = Auth::id();
        $borrows = Borrow::where('user_id', $userId)
                        ->with(['book'])
                        ->orderBy('created_at', 'desc')
                        ->paginate(10);
        return view('student.borrows.index', compact('borrows'));
    }

    public function requestBorrow(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
        ]);

        $book = Book::findOrFail($request->book_id);
        
        if ($book->stock <= 0) {
            return redirect()->back()->with('error', 'Book is not available.');
        }

        Borrow::create([
            'user_id' => Auth::id(),
            'book_id' => $request->book_id,
            'borrow_date' => now(),
            'status' => 'pending'
        ]);

        return redirect()->back()->with('success', 'Borrow request submitted successfully.');
    }

    public function returnBook($id)
    {
        $borrow = Borrow::findOrFail($id);
        
        if ($borrow->user_id !== Auth::id() || $borrow->status !== 'approved') {
            return redirect()->back()->with('error', 'Invalid return request.');
        }

        $borrow->update([
            'return_date' => now(),
            'status' => 'returned'
        ]);

        $book = $borrow->book;
        $book->increment('stock');

        return redirect()->back()->with('success', 'Book returned successfully.');
    }
}