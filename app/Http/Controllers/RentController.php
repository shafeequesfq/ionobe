<?php

namespace App\Http\Controllers;

use App\Models\installment;
use App\Models\Units;
use Illuminate\Http\Request;

class RentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unit_id = auth()->user()->unit_id;
        $units = Units::find($unit_id);
        return view('rent.index', compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rent.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'paid_amount' => ['required'],
        ]);


        $unit_id = auth()->user()->unit_id;
        $installment = installment::create([
            'unit_id' => $unit_id,
            'paid_amount' => $request->paid_amount,
            'mode_of_payment' => $request->mode_of_payment,
        ]);

        $unit = Units::find($unit_id);
        $unit->paid_amount += $request->paid_amount;
        $unit->balance_amount = $unit->rent_amount - $unit->paid_amount;
        $unit->save();

        return redirect()->route('rent.index');
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

    public function paymentlist(){
        $unit_id = auth()->user()->unit_id;
        $installment = installment::where('unit_id' ,$unit_id)->get();
        return view('rent.payment_list', compact('installment'));
    }
}
