<?php

namespace App\Http\Controllers;

use App\Models\LoanDetail;

use Illuminate\Http\Request;

class LoanDetailController extends Controller
{
    public function index($id)
    {
        $loanDetails = LoanDetail::where('loan_id', $id)->get();
        return view("loandetail.index", compact("loanDetails"));
    }
    public function store(Request $request)
{
    // Validasi input request
    $request->validate([
        'loan_id' => 'required|exists:loans,id',
        'book_id' => 'required|exists:books,id',
    ]);


    $loan_id = $request->input('loan_id');
    $book_id = $request->input('book_id');


    LoanDetail::create([
        'loan_id' => $loan_id,
        'book_id' => $book_id,
        'is_return' => 0,
    ]);

    return redirect()->route('dashboard')->with('success', 'Loan detail successfully created.');
}


}
