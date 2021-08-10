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
        $data = \App\Models\ActiveCases::orderBy('date_issued', 'DESC')->paginate();

        return view('activecases.index', [
            'data' => $data,
            'count' => $data->count(),
            'currentPage' => $data->currentPage(),
            'perPage' => $data->perPage(),
            'totalCount' => \App\Models\ActiveCases::count(),
        ]);
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
    public function edit($date_issued)
    {
        $entry = \App\Models\ActiveCases::where('date_issued', '=', $date_issued)->first();
        if(!$entry) abort(404);

        return view('activecases.edit', [
            'entry' => $entry,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $date_issued)
    {
        \App\Models\ActiveCases::where('date_issued', '=', $date_issued)->update([
            'date_issued' => $request->date_issued,
            'confirmed' => $request->confirmed,
            'probable' => $request->probable,
            'suspected' => $request->suspected,
            'reference' => $request->reference,
        ]);

        return redirect()->route('activecases.index');
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
