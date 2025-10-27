@extends('layouts.app')

@section('content')
<h1>Edit Section</h1>
<div class="card p-4 shadow-sm">
<form action="{{ route('sections.update', $section->id) }}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ $section->name }}" required>
    </div>
    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control">{{ $section->description }}</textarea>
    </div>
    <button class="btn btn-primary">Update</button>
    <a href="{{ route('sections.index') }}" class="btn btn-secondary">Cancel</a>
</form>
</div>
@endsection
