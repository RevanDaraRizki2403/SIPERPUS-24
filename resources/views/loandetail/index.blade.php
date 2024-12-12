<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Loan Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">



                    <x-table>
                        <x-slot name="header">
                            <tr class="py-10">
                                <th scope="col">#</th>
                                <th scope="col">Loan Id</th>
                                <th scope="col">Title</th>
                                <th scope="col">Status</th>


                            </tr>
                        </x-slot>
                        @foreach ($loanDetails as $loan)
                            <tr>
                                
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $loan->loan_id}}</td>
                                <td>{{ $loan->book->title }}</td>
                                <td>{{ $loan->is_return->label() }}</td>


                            </tr>
                        @endforeach
                    </x-table>

                    <x-modal name="confirm-book-deletion" focusable maxWidth="xl">
                        <form method="post" x-bind:action="action" class="p-6">
                            @method('delete')
                            @csrf
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Apakah anda yakin akan menghapus data?') }}
                            </h2>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Setelah proses dilaksanakan. Data akan dihilangkan secara permanen.') }}
                            </p>
                            <div class="mt-6 flex justify-end">
                                <x-secondary-button x-on:click="$dispatch('close')">
                                    {{ __('Cancel') }}
                                </x-secondary-button>
                                <x-danger-button class="ml-3">
                                    {{ __('Delete!!!') }}
                                </x-danger-button>
                            </div>
                        </form>
                    </x-modal>

                    <x-modal name="import-book" focusable maxWidth="xl">
                        <form method="post" action="{{ route('book.import') }}" class="p-6"
                            enctype="multipart/form-data">
                            @csrf
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Import Data Buku') }}
                            </h2>
                            <div class="max-w-xl">
                                <x-input-label for="cover" class="sr-only" value="File Import" />
                                <x-file-input id="cover" name="file" class="mt-1 block w-full" required />
                            </div>
                            <div class="mt-6 flex justify-end">
                                <x-secondary-button x-on:click="$dispatch('close')">
                                    {{ __('Batal') }}
                                </x-secondary-button>
                                <x-primary-button class="ml-3">
                                    {{ __('Upload') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </x-modal>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
