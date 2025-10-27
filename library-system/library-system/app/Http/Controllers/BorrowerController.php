<?php

namespace App\Http\Controllers;

use App\Models\Borrower;
use Illuminate\Http\Request;

class BorrowerController extends Controller
{
    public function index()
    {
        $borrowers = Borrower::all();
        return view('borrowers.index', compact('borrowers'));
    }

    public function create()
    {
        return view('borrowers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:borrowers,email'
        ]);
        Borrower::create($request->all());
        return redirect()->route('borrowers.index')->with('success', 'Borrower created.');
    }

    public function edit(Borrower $borrower)
    {
        return view('borrowers.edit', compact('borrower'));
    }

    public function update(Request $request, Borrower $borrower)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:borrowers,email,' . $borrower->id
        ]);
        $borrower->update($request->all());
        return redirect()->route('borrowers.index')->with('success', 'Borrower updated.');
    }

    public function destroy(Borrower $borrower)
    {
        $borrower->delete();
        return redirect()->route('borrowers.index')->with('success', 'Borrower deleted.');
    }
}
