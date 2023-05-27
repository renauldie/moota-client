<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Account Registered
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div>
            <div class="flex justify-between mt-3 mb-3">
                <a href="{{ route('account.create') }}"
                    class="py-2 px-2 bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Add Account</a>
                <div class="flex">
                    <input type="date" placeholder="Search" id="myDateInput"
                        class="py-2 px-4 rounded-l-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                    <button class="py-2 px-4 bg-gray-600 hover:bg-gray-600 text-white rounded-r-md">Search</button>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg mt-2">
                <!-- component -->
                <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md m-5">
                    <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Status</th>
                                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Name Holder</th>
                                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Username</th>
                                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Bank_type</th>
                                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Corporate ID</th>
                                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                            {{-- @dd($accounts) --}}
                            @foreach ($accounts as $account)
                                <tr class="hover:bg-gray-50">
                                    <td class="flex gap-3 px-6 py-4 font-normal text-gray-900">
                                        <span class="rounded-full px-2 py-1 text-xs font-semibold text-green-600">
                                            <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>
                                            Active
                                        </span>
                                    </td>
                                    {{-- @dd($account) --}}
                                    <td class="px-6 py-4">{{ $account->name_holder }}</td>
                                    <td class="px-6 py-4">{{ $account->username }}</td>
                                    <td class="px-6 py-4">{{ $account->bank_type }}</td>
                                    <td class="px-6 py-4">{{ $account->corporate_id }}</td>
                                    <td class="px-6 py-4">
                                        <div class="flex justify-end gap-4">
                                            <form class="inline-block" action="{{ route('account.destroy', $account->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                @csrf
                                                @method('delete')
                                                <button x-data="{ tooltip: 'Delete' }" href="{{ route('account.destroy', $account->id) }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="h-6 w-6" x-tooltip="tooltip">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                    </svg>
                                                </button>
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            </form>
                                            
                                            <a x-data="{ tooltip: 'Edite' }" href="{{ route('account.edit', $account->id) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="h-6 w-6" x-tooltip="tooltip">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                                </svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    // Get the current date
    var today = new Date();

    // Format the date as "YYYY-MM-DD"
    var yyyy = today.getFullYear();
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var dd = String(today.getDate()).padStart(2, '0');
    var formattedDate = yyyy + '-' + mm + '-' + dd;

    // Set the value attribute of the date input
    document.getElementById('myDateInput').value = formattedDate;
</script>
