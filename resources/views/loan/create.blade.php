<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Minjem') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form method="post" action="{{ route('loan.store') }}" enctype="multipart/form-data"
                        class="mt-6 space-y-6">
                        @csrf

                        <!-- Form untuk memilih buku -->
                        <div class="max-w-xl">
                            <x-input-label for="book_id" value="Pilih Buku" />
                            <x-select-input id="book_id" name="book_id" class="mt-1 block w-full" required>
                                <option value="">Open this select menu</option>
                                @foreach ($books as $book)
                                    <option value="{{ $book->id }}"
                                        @if (old('book_id') == $book->id) selected @endif>
                                        {{ $book->title }}
                                    </option>
                                @endforeach
                            </x-select-input>
                        </div>


                        <!-- Submit Buttons -->
                        <x-secondary-button tag="a" href="{{ route('dashboard') }}">Cancel</x-secondary-button>
                        <x-primary-button type="submit" name="save" value="true">Save</x-primary-button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
