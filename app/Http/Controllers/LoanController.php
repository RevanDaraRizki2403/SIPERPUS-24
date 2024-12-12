<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
{
    public function index()
    {
        $loans = Loan::with('user')->get(); // Contoh: Mengambil data pinjaman dengan relasi ke user
        return view('loan.index', compact('loans'));
    }
    public function create()
    {
        $books = Book::all();

        if ($books->isEmpty()) {

            return redirect()->route('books.index')->with('error', 'No books found.');
        }

        return view('loan.create', compact('books'));
    }


    public function store(Request $request)
    {

        $request->validate([
            'book_id' => 'required|exists:books,id',  // Validasi bahwa book_id ada di tabel books
        ]);

        // Membuat pinjaman baru (Loan)
        $loan = Loan::create([
            'user_id' => Auth::user()->id,
            'loan_at' => Carbon::now(),
            'return_at' => null,
        ]);


        $book_id = $request->input('book_id');


        return view('loandetail.store', ['loan_id' => $loan->id, 'book_id' => $book_id]);
    }


}
