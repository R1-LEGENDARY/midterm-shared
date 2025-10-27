@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Authors</h1>
    <a href="{{ route('authors.create') }}" class="btn btn-primary">+ Add Author</a>
</div>

<div class="card p-3 mb-4 shadow-sm">
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Bio</th>
                <th width="150">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($authors as $author)
                <tr>
                    <td>{{ $author->name }}</td>
                    <td>{{ $author->bio }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-sm btn-warning flex-fill">Edit</a>
                            <form action="{{ route('authors.destroy', $author->id) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger flex-fill" onclick="return confirm('Delete this author?')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
