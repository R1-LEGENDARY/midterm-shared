@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Sections</h1>
    <a href="{{ route('sections.create') }}" class="btn btn-primary">+ Add Section</a>
</div>

<div class="card p-3 mb-4 shadow-sm">
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th width="150">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sections as $section)
                <tr>
                    <td>{{ $section->name }}</td>
                    <td>{{ $section->description }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('sections.edit', $section->id) }}" class="btn btn-sm btn-warning flex-fill">Edit</a>
                            <form action="{{ route('sections.destroy', $section->id) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger flex-fill" onclick="return confirm('Delete this section?')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
