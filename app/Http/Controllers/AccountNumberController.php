<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccStoreRequest;
use App\Models\AccountNumber;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Symfony\Component\HttpFoundation\AcceptHeader;

class AccountNumberController extends Controller
{
    public function index()
    {
        $today = Carbon::now()->format('Y-m-d');
        $accounts = AccountNumber::whereDate('created_at', $today)->get();

        return view('pages.account.index', compact('accounts'));
    }

    public function create()
    {
        return view('pages.account.create');
    }

    public function store(AccStoreRequest $request)
    {
        $data = $request->all();
        $encryptedValue = Crypt::encrypt($data['password']);
        $data['password'] = $encryptedValue;
        $request['corporate_id'] = $request['corporate_id'] ? $request['corporate_id'] :'';
        AccountNumber::create($data);

        return redirect()->route('account.index');
    }

    public function show(AccountNumber $account)
    {
        return view('pages.account.show', compact('account'));

    }

    public function edit(AccountNumber $account)
    {
        return view('pages.account.edit', compact('account'));
    }

    public function update(AccStoreRequest $request, AccountNumber $account)
    {
        $request['corporate_id'] = $request['corporate_id'] ? $request['corporate_id'] :'';
        $account->update($request->validated());

        return redirect()->route('account.index');
    }

    public function destroy(AccountNumber $account)
    {
        $account->delete();

        return redirect()->route('account.index');
    }
}
