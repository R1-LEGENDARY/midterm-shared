@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="form-card shadow-lg p-4 rounded-3 bg-white">
        
        <h2 class="fw-bold text-success mb-4">Add New Section</h2>

        <form action="{{ route('sections.store') }}" method="POST">
            @csrf

            <!-- Section Name -->
            <div class="mb-3">
                <label for="name" class="form-label fw-semibold">Section Name</label>
                <input type="text" name="name" id="name" 
                       class="form-control form-control-lg border-success" 
                       placeholder="Enter section name" required>
            </div>

            <!-- Section Description -->
            <div class="mb-3">
                <label for="description" class="form-label fw-semibold">Description</label>
                <textarea name="description" id="description" 
                          class="form-control border-success" rows="4" 
                          placeholder="Enter section details (optional)"></textarea>
            </div>

            <!-- Buttons -->
            <div class="d-flex justify-content-end gap-2 mt-4">
                <a href="{{ route('sections.index') }}" class="btn btn-outline-secondary px-4">
                    Cancel
                </a>
                <button type="submit" class="btn btn-success px-4">
                    💾 Save Section
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
