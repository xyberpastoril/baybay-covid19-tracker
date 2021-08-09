<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActiveCasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('activecases.create', [
            'today' => \Carbon\Carbon::now()->format('Y-m-d'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(\App\Models\ActiveCases::where('date_issued', '=', $request->date_issued)->count() != 0) {
            throw \Illuminate\Validation\ValidationException::withMessages(['date_issued' => "Data for this date already exists. If you want to edit, proceed to its page."]);
        }

        // dd($request);

        \App\Models\ActiveCases::create([
            'date_issued' => $request->date_issued,
            'confirmed' => $request->confirmed,
            'probable' => $request->probable,
            'suspected' => $request->suspected,
            'reference' => $request->reference,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
