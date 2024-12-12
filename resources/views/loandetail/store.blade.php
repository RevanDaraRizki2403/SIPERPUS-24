<form method="POST" action="{{ route('loandetail.store') }}">
    @csrf
    <input type="text" name="loan_id" value="{{ $loan_id }}">
    <input type="text" name="book_id" value="{{ $book_id }}">

    <x-primary-button>Save Loan Detail</x-primary-button>
</form>
