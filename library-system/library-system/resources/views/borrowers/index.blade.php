@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Borrowers</h1>
    <a href="{{ route('borrowers.create') }}" class="btn btn-primary">+ Add Borrower</a>
</div>

<div class="card p-3 mb-4 shadow-sm">
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th width="150">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($borrowers as $borrower)
                <tr>
                    <td>{{ $borrower->name }}</td>
                    <td>{{ $borrower->email }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('borrowers.edit', $borrower->id) }}" class="btn btn-sm btn-warning flex-fill">Edit</a>
                            <form action="{{ route('borrowers.destroy', $borrower->id) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger flex-fill" onclick="return confirm('Delete this borrower?')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
