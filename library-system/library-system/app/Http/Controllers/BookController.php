<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Section;
use App\Models\Author;
use App\Models\Borrower;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::with(['section', 'author']);

        // Search by title or author
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('author', 'like', '%' . $request->search . '%');
            });
        }

        // Filter by section
        if ($request->filled('section')) {
            $query->where('section_id', $request->section);
        }

        // Paginate results (10 per page)
        $books = $query->paginate(10);

        // Fetch all sections for the filter dropdown
        $sections = Section::all();
        $authors = Author::all();

        return view('books.index', compact('books', 'sections', 'authors'));
    }

    public function create()
    {
        $sections = Section::all();
        $authors = Author::all();
        return view('books.create', compact('sections', 'authors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'published_year' => 'required|digits:4|integer',
            'section_id' => 'required',
            'author_id' => 'required'
        ]);

        Book::create($request->all());
        return redirect()->route('books.index')->with('success', 'Book added successfully');
    }

    public function edit(Book $book)
    {
        $sections = Section::all();
        $authors = Author::all();
        return view('books.edit', compact('book', 'sections', 'authors'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'published_year' => 'required|digits:4|integer',
            'section_id' => 'required',
            'author_id' => 'required'
        ]);

        $book->update($request->all());
        return redirect()->route('books.index')->with('success', 'Book updated successfully');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully');
    }

    public function borrow(Request $request, Book $book)
    {
        $request->validate(['borrower_id' => 'required|exists:borrowers,id']);
        // Only allow if not already borrowed
        if ($book->borrowers()->whereNull('returned_at')->exists()) {
            return back()->with('success', 'Book is already borrowed.');
        }
        $book->borrowers()->attach($request->borrower_id, ['borrowed_at' => now()]);
        return back()->with('success', 'Book assigned to borrower.');
    }

    public function return(Book $book, Borrower $borrower)
    {
        // Mark as returned (update pivot)
        $book->borrowers()->updateExistingPivot($borrower->id, ['returned_at' => now()]);
        return back()->with('success', 'Book marked as returned.');
    }
}
