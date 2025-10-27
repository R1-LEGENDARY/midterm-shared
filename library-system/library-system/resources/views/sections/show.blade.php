@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Section: {{ $section->name }}</h1>
    <a href="{{ route('sections.index') }}" class="btn btn-secondary">⬅ Back</a>
</div>

<div class="card p-4 shadow-sm mb-4">
    <p><strong>Description:</strong> {{ $section->description ?? 'No description' }}</p>
</div>

<h3 class="mt-4 mb-3">Books in this Section</h3>

@if($section->books->count() > 0)
    <div class="card p-3 shadow-sm">
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Year</th>
                <th>Borrower(s)</th>
                <th width="150">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($section->books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author->name }}</td>
                    <td>{{ $book->published_year }}</td>
                    <td>
                        @php
                            $currentBorrowers = $book->borrowers()->whereNull('returned_at')->get();
                        @endphp
                        @if($currentBorrowers->isEmpty())
                            <span class="text-muted">Available</span>
                        @else
                            @foreach($currentBorrowers as $borrower)
                                <span class="badge bg-secondary">{{ $borrower->name }}</span>
                            @endforeach
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this book?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
@else
    <p class="text-muted">No books found in this section.</p>
@endif
@endsection
