@extends('layouts.app')

@section('content')
<h1>Edit Book</h1>
<div class="card p-4 shadow-sm">
<form action="{{ route('books.update', $book->id) }}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3">
        <label>Title</label>
        <input type="text" name="title" class="form-control" value="{{ $book->title }}" required>
    </div>
    <div class="mb-3">
        <label>Author</label>
        <select name="author_id" class="form-control" required>
            @foreach($authors as $author)
                <option value="{{ $author->id }}" @if($author->id == $book->author_id) selected @endif>
                    {{ $author->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Published Year</label>
        <input type="number" name="published_year" class="form-control" value="{{ $book->published_year }}" required>
    </div>
    <div class="mb-3">
        <label>Section</label>
        <select name="section_id" class="form-control" required>
            @foreach($sections as $section)
                <option value="{{ $section->id }}" @if($section->id == $book->section_id) selected @endif>
                    {{ $section->name }}
                </option>
            @endforeach
        </select>
    </div>
    <button class="btn btn-primary">Update</button>
    <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancel</a>
</form>
</div>

{{-- Borrower assignment/return --}}
<div class="card p-4 shadow-sm mt-4">
    <h4>Borrowers</h4>
    @php
        $currentBorrowers = $book->borrowers()->whereNull('returned_at')->get();
        $allBorrowers = \App\Models\Borrower::all();
    @endphp

    @if($currentBorrowers->isEmpty())
        <form action="{{ route('books.borrow', $book->id) }}" method="POST" class="d-flex align-items-end gap-2">
            @csrf
            <div>
                <label for="borrower_id" class="form-label">Assign to Borrower</label>
                <select name="borrower_id" id="borrower_id" class="form-select" required>
                    <option value="">Select Borrower</option>
                    @foreach($allBorrowers as $borrower)
                        <option value="{{ $borrower->id }}">{{ $borrower->name }} ({{ $borrower->email }})</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success mb-1">Assign</button>
        </form>
    @else
        <div>
            <div class="mb-2">Currently borrowed by:</div>
            @foreach($currentBorrowers as $borrower)
                <span class="badge bg-secondary">{{ $borrower->name }} ({{ $borrower->email }})</span>
                <form action="{{ route('books.return', [$book->id, $borrower->id]) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-danger ms-2">Mark as Returned</button>
                </form>
            @endforeach
        </div>
    @endif
</div>
@endsection
