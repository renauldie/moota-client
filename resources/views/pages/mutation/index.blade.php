<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Mutation
        </h2>
    </x-slot>

    <div>
        <div class="max-w-2xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('mutation.store') }}">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="type" class="block font-medium text-sm text-gray-700">Active
                                Status</label>

                            <select name="type" id="type"
                                class="form-input rounded-md shadow-sm mt-1 block w-full">
                                <option value="CR" value="{{ old('type' == 1 ? 'selected' : '') }}">Debit
                                </option>
                                <option value="DB" value="{{ old('type' == 0 ? 'selected' : '') }}">Credit
                                </option>
                            </select>
                            @error('type')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="bank" class="block font-medium text-sm text-gray-700">Bank Token</label>
                            <input type="text" name="bank" id="bank" type="text"
                                class="form-input rounded-md shadow-sm mt-1 block w-full"
                                value="{{ old('bank', '') }}" />
                            @error('bank')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="amount" class="block font-medium text-sm text-gray-700">Amount</label>
                            <input type="number" name="amount" id="amount" type="text"
                                class="form-input rounded-md shadow-sm mt-1 block w-full"
                                value="{{ old('amount', '') }}" />
                            @error('amount')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="description" class="block font-medium text-sm text-gray-700">Description</label>
                            <input type="text" name="description" id="description" type="text"
                                class="form-input rounded-md shadow-sm mt-1 block w-full"
                                value="{{ old('description', '') }}" />
                            @error('description')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="note" class="block font-medium text-sm text-gray-700">Note</label>
                            <input type="text" name="note" id="note" type="text"
                                class="form-input rounded-md shadow-sm mt-1 block w-full"
                                value="{{ old('note', '') }}" />
                            @error('note')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="date" class="block font-medium text-sm text-gray-700">Date</label>
                            <input type="text" name="date" id="date" type="text"
                                class="form-input rounded-md shadow-sm mt-1 block w-full"
                                value="{{ old('date', '') }}" />
                            @error('date')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="start_date" class="block font-medium text-sm text-gray-700">Start Date
                                ID</label>
                            <input type="text" name="start_date" id="start_date" type="text"
                                class="form-input rounded-md shadow-sm mt-1 block w-full"
                                value="{{ old('start_date', '') }}" />
                            @error('start_date')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="end_date" class="block font-medium text-sm text-gray-700">End Date</label>
                            <input type="text" name="end_date" id="end_date" type="text"
                                class="form-input rounded-md shadow-sm mt-1 block w-full"
                                value="{{ old('end_date', '') }}" />
                            @error('end_date')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="tag" class="block font-medium text-sm text-gray-700">Tag</label>
                            <input type="text" name="tag" id="tag" type="text"
                                class="form-input rounded-md shadow-sm mt-1 block w-full"
                                value="{{ old('tag', '') }}" />
                            @error('tag')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="page" class="block font-medium text-sm text-gray-700">Page</label>
                            <input type="text" name="page" id="page" type="text"
                                class="form-input rounded-md shadow-sm mt-1 block w-full"
                                value="{{ old('page', '') }}" />
                            @error('page')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="per_page" class="block font-medium text-sm text-gray-700">Per Page</label>
                            <input type="text" name="per_page" id="per_page" type="text"
                                class="form-input rounded-md shadow-sm mt-1 block w-full"
                                value="{{ old('per_page', '') }}" />
                            @error('per_page')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Search Mutation
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
