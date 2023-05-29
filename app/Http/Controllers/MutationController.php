<?php

namespace App\Http\Controllers;

use App\Models\Parameter;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class MutationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.mutation.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $type = $request->input('type');
        $bank = $request->input('bank');
        $amount = $request->input('amount');
        $description = $request->input('description');
        $note = $request->input('note');
        $date = $request->input('date');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $tag = $request->input('tag');
        $page = $request->input('page');
        $per_page = $request->input('per_page');

        $endpoint = Parameter::where('name', 'URL_MOOTA')->first();
        $url = $endpoint->values.'/mutation?'.'type='.$type.'&bank='.$bank.'&amount='.$amount.'&description='.$description.'&note='.$note
                .'&date='.$date.'&start_date='.$start_date.'&end_date='.$end_date.'&tag='.$tag.'&page='.$page.'&per_page='.$per_page;

        

        $response = Http::get($url);
        
        if ($response->successful()) {
            Log::info('ok'.$response->successful());
            $data = $response->json();
            $pdf = PDF::loadview('pages/mutation.mutation', $data);

            $now = Carbon::now();
            return $pdf->download($now.'MootaClient.pdf');
        } else {
            Log::warning('Something went wrong');
        }   

        // return view('pages.mutation.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
