<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\Author;
use App\Models\Publisher; // Tambahkan ini jika diperlukan di view

class BookController extends Controller
{
    // Metode untuk Admin - Daftar semua buku
    public function index()
    {
        $books = Book::with(['author', 'publisher', 'category'])->paginate(10);
        return view('admin.books.index', compact('books'));
    }

    // Metode untuk Admin - Tampilkan form tambah
    public function create()
    {
        $categories = Category::all();
        $authors = Author::all();
        $publishers = Publisher::all();
        return view('admin.books.create', compact('categories', 'authors', 'publishers'));
    }

    // Metode untuk Admin - Simpan buku baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author_id' => 'required|exists:authors,id',
            'publisher_id' => 'required|exists:publishers,id',
            'category_id' => 'required|exists:categories,id',
            'year' => 'required|integer|min:1000|max:' . date('Y'),
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
        ]);

        Book::create($request->all());

        return redirect()->route('admin.books.index')->with('success', 'Book created successfully.');
    }

    // Metode untuk Admin - Tampilkan form edit
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::all();
        $authors = Author::all();
        $publishers = Publisher::all();
        return view('admin.books.edit', compact('book', 'categories', 'authors', 'publishers'));
    }

    // Metode untuk Admin - Update buku
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author_id' => 'required|exists:authors,id',
            'publisher_id' => 'required|exists:publishers,id',
            'category_id' => 'required|exists:categories,id',
            'year' => 'required|integer|min:1000|max:' . date('Y'),
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
        ]);

        $book = Book::findOrFail($id);
        $book->update($request->all());

        return redirect()->route('admin.books.index')->with('success', 'Book updated successfully.');
    }

    // Metode untuk Admin - Hapus buku
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('admin.books.index')->with('success', 'Book deleted successfully.');
    }
    // Untuk Student
    public function studentIndex(Request $request)
    {
        $query = Book::query();

        // Filter berdasarkan pencarian judul
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        // Filter berdasarkan kategori
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // Filter berdasarkan penulis
        if ($request->filled('author')) {
            $query->where('author_id', $request->author);
        }

        $books = $query->with(['author', 'publisher', 'category'])->paginate(10);
        // Kirim data categories dan authors ke view
        $categories = Category::all();
        $authors = Author::all();

        return view('student.books.index', compact('books', 'categories', 'authors'));
    }
}