<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;
use App\Models\Borrow;
use App\Models\Category;
use App\Models\Author;
use App\Models\Publisher;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function adminDashboard()
    {
        $totalBooks = Book::count();
        $totalCategories = Category::count();
        $totalAuthors = Author::count();
        $totalPublishers = Publisher::count();
        $activeBorrows = Borrow::where('status', 'approved')->count();

        return view('admin.dashboard', compact(
            'totalBooks',
            'totalCategories',
            'totalAuthors',
            'totalPublishers',
            'activeBorrows'
        ));
    }

    public function studentDashboard()
    {
        $userId = Auth::id();
        $totalBooks = Book::count(); // Jumlah total buku di perpustakaan
        $borrowedBooks = Borrow::where('user_id', $userId)->count(); // Jumlah buku yang pernah dipinjam oleh user
        $activeBorrows = Borrow::where('user_id', $userId)->where('status', 'approved')->count(); // Jumlah buku yang sedang dipinjam
        $totalBorrows = Borrow::where('user_id', $userId)->count(); // Total jumlah riwayat peminjaman
        $recentBorrows = Borrow::where('user_id', $userId)->with('book')->latest()->take(5)->get(); // 5 riwayat terbaru

        return view('student.dashboard', compact(
            'totalBooks',
            'borrowedBooks',
            'activeBorrows',
            'totalBorrows',
            'recentBorrows'
        ));
    }
}