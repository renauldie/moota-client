<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Register Customer Account Number
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('account.store') }}">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="is_active" class="block font-medium text-sm text-gray-700">Active
                                Status</label>
                            {{-- <input type="text" name="is_active" id="is_active" type="text"
                                class="form-input rounded-md shadow-sm mt-1 block w-full"
                                value="{{ old('is_active', '') }}" /> --}}

                            <select name="is_active" id="is_active" class="form-input rounded-md shadow-sm mt-1 block w-full">
                              <option value="1" value="{{ old('is_active' == 1 ? 'selected' : '') }}">Active</option>
                              <option value="0" value="{{ old('is_active' == 0 ? 'selected' : '') }}">Deactive</option>
                            </select>
                            @error('is_active')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="account_number" class="block font-medium text-sm text-gray-700">Account
                                Number</label>
                            <input type="text" name="account_number" id="account_number" type="text"
                                class="form-input rounded-md shadow-sm mt-1 block w-full"
                                value="{{ old('account_number', '') }}" />
                            @error('account_number')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="name_holder" class="block font-medium text-sm text-gray-700">Name Holder</label>
                            <input type="text" name="name_holder" id="name_holder" type="text"
                                class="form-input rounded-md shadow-sm mt-1 block w-full"
                                value="{{ old('name_holder', '') }}" />
                            @error('name_holder')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="username" class="block font-medium text-sm text-gray-700">Username</label>
                            <input type="text" name="username" id="username" type="text"
                                class="form-input rounded-md shadow-sm mt-1 block w-full"
                                value="{{ old('username', '') }}" />
                            @error('username')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="password" class="block font-medium text-sm text-gray-700">Password</label>
                            <input type="text" name="password" id="password" type="text"
                                class="form-input rounded-md shadow-sm mt-1 block w-full"
                                value="{{ old('password', '') }}" />
                            @error('password')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="bank_type" class="block font-medium text-sm text-gray-700">Bank Type</label>
                            <input type="text" name="bank_type" id="bank_type" type="text"
                                class="form-input rounded-md shadow-sm mt-1 block w-full"
                                value="{{ old('bank_type', '') }}" />
                            @error('bank_type')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="corporate_id" class="block font-medium text-sm text-gray-700">Corporate
                                ID</label>
                            <input type="text" name="corporate_id" id="corporate_id" type="text"
                                class="form-input rounded-md shadow-sm mt-1 block w-full"
                                value="{{ old('corporate_id', '') }}" />
                            @error('corporate_id')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Create
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
