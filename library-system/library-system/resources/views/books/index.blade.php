@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Books</h1>
    <div class="d-flex">
        {{-- Search Form --}}
        <form method="GET" action="{{ route('books.index') }}" class="d-flex me-2">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control me-2" placeholder="Search title/author">
            
            {{-- Section Filter --}}
            <select name="section" class="form-select me-2" onchange="this.form.submit()">
                <option value="">All Sections</option>
                @foreach($sections as $section)
                    <option value="{{ $section->id }}" {{ request('section') == $section->id ? 'selected' : '' }}>
                        {{ $section->name }}
                    </option>
                @endforeach
            </select>

        </form>
        <a href="{{ route('books.create') }}" class="btn btn-success">+ Add Book</a>
    </div>
</div>

<div class="card p-3 mb-4 shadow-sm">
    {{-- Books Table --}}
    <table class="table table-hover table-striped">
        <thead class="table-dark">
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Year</th>
                <th>Section</th>
                <th>Borrower(s)</th>
                <th width="150">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author->name }}</td>
                    <td>{{ $book->published_year }}</td>
                    <td>
                        <a href="{{ route('sections.show', $book->section->id) }}" class="badge bg-info text-decoration-none">
                            {{ $book->section->name }}
                        </a>
                    </td>
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
                        <div class="d-flex gap-2">
                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-sm btn-warning flex-fill">Edit</a>
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger flex-fill" onclick="return confirm('Delete this book?')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">No books found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- Pagination --}}
<div class="d-flex justify-content-center">
    {{ $books->links() }}
</div>
@endsection
