@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="form-card shadow-lg p-4 rounded-3 bg-white">
        <h2 class="fw-bold text-primary mb-4">Add New Borrower</h2>
        <form action="{{ route('borrowers.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label fw-semibold">Name</label>
                <input type="text" name="name" id="name" class="form-control border-primary" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label fw-semibold">Email</label>
                <input type="email" name="email" id="email" class="form-control border-primary" required>
            </div>
            <div class="d-flex justify-content-end gap-2 mt-4">
                <a href="{{ route('borrowers.index') }}" class="btn btn-outline-secondary px-4">Cancel</a>
                <button type="submit" class="btn btn-primary px-4">💾 Save Borrower</button>
            </div>
        </form>
    </div>
</div>
@endsection
