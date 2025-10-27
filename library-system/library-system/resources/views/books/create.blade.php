@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="form-card shadow-lg p-4 rounded-3 bg-white">
        
        <h2 class="fw-bold text-primary mb-4">📚 Add New Book</h2>

        <form action="{{ route('books.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label fw-semibold">Book Title</label>
                <input type="text" name="title" id="title" 
                       class="form-control form-control-lg border-primary" 
                       placeholder="Enter book title" required>
            </div>

            <div class="mb-3">
                <label for="author_id" class="form-label fw-semibold">Author</label>
                <select name="author_id" id="author_id" class="form-select border-primary" required>
                    <option value="">Select Author</option>
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="published_year" class="form-label fw-semibold">Published Year</label>
                <input type="number" name="published_year" id="published_year" 
                       class="form-control border-primary" 
                       placeholder="Enter year (e.g., 2022)" required>
            </div>

            <div class="mb-3">
                <label for="section_id" class="form-label fw-semibold">Section</label>
                <select name="section_id" id="section_id" 
                        class="form-select border-primary" required>
                    <option value="">Select Section</option>
                    @foreach($sections as $section)
                        <option value="{{ $section->id }}">{{ $section->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="d-flex justify-content-end gap-2 mt-4">
                <a href="{{ route('books.index') }}" class="btn btn-outline-secondary px-4">
                    Cancel
                </a>
                <button type="submit" class="btn btn-primary px-4">
                    💾 Save Book
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
