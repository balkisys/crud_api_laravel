<?php

namespace App\Http\Controllers;
use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();

        return response()->json($customers);
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:25',
            'address' => 'required|max:25',
            'country' => 'required|max:250',
        ]);

        if($validator->fails()){
            $response = array('response' => $validator->messages(), 'success' => false);

            return $response;
        }else{
            // Create Customer
            $customer = new Customer;

            $customer->company = $request->company;
            $customer->name = $request->name;
            $customer->address = $request->address;
            $customer->country = $request->country;
            $customer->email = $request->email;
            $customer->phone = $request->phone;
            $customer->tax_id_number = $request->tax_id_number;
            $customer->trade_register = $request->trade_register;
            $customer->invoice_id = $request->invoice_id;

            $customer->save();

            return response()->json($customer);
        }
    
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
