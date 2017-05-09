<?php

namespace App\Http\Controllers;

use App\IncomeType;
use Illuminate\Http\Request;
use App\Http\Requests\IncomeTypeRequest;

class IncomeTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incomeTypes = IncomeType::all();

        return view('incomeType.list', compact('incomeTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('incomeType.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IncomeTypeRequest $request)
    {
        IncomeType::create($request->all());

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\IncomeType  $incomeType
     * @return \Illuminate\Http\Response
     */
    public function show(IncomeType $incomeType)
    {
        return view('incomeType.show', compact('incomeType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\IncomeType  $incomeType
     * @return \Illuminate\Http\Response
     */
    public function edit(IncomeType $incomeType)
    {
        return view('incomeType.edit', compact('incomeType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\IncomeType  $incomeType
     * @return \Illuminate\Http\Response
     */
    public function update(IncomeTypeRequest $request, IncomeType $incomeType)
    {
        $incomeType->update($request->all());

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IncomeType  $incomeType
     * @return \Illuminate\Http\Response
     */
    public function destroy(IncomeType $incomeType)
    {
        $incomeType->delete();

        return redirect('/');
    }
}
