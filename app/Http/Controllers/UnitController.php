<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Tenants;
use App\Models\Units;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units = Units::all();
        return view('unit.index', compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $apartment = Apartment::all();
        return view('unit.create', compact('apartment'));
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
            'unit_name' => ['required', 'string', 'max:255'],
            'rent_amount' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $unit = Units::create([
            'unit_name' => $request->unit_name,
            'unit_size' => $request->unit_size,
            'email' => $request->email,
            'rent_amount' => $request->rent_amount,
            'balance_amount' => $request->rent_amount,
            'apartment_id' => $request->apartment_id,
        ]);

        $unit_id = $unit->id;

        $tenant = Tenants::create([
            'name' => $request->tenant_name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'unit' => $unit_id,
        ]);

        $user = User::create([
            'type' => '2',
            'unit_id' => $unit_id,
            'name' => $request->tenant_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('units.index');
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
        Units::find($id)->delete();
        return redirect()->route('unit.index');
    }
}
