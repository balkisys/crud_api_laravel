<?php

namespace App\Http\Controllers;
use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
            'first_name' => 'required|max:25',
            'last_name' => 'required|max:25',
            'email' => 'required|max:25',
            
        ]);

        if($validator->fails()){
            $response = array('response' => $validator->messages(), 'success' => false);

            return $response;
        }else{
            // Create Customer
            $customer = new Customer;

            
            $customer->first_name = $request->first_name;
            $customer->last_name = $request->last_name;
            $customer->email = $request->email;
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
        $customer = Customer::findOrFail($id);

        return response()->json($customer);
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
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|max:25',
            'last_name' => 'required|max:25',
            'email'=> 'required|max:25',
        ]);

        if($validator->fails()){
            $response = array('response' => $validator->messages(), 'success' => false);

            return $response;
        }else{
            // Update Customer
            $customer = Customer::findOrFail($id);

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
