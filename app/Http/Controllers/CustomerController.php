<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{

    public function deleteCustomer(Request $request, $id) {
        
        try {
            $customer = Customer::findOrFail($id);

            $customer->delete();
        } catch (\Throwable $th) {
            return response()->json([
                'customer' => $customer,
                'operation' => 'delete',
                'status' => 'failed',
                'code' => '0'
            ]);    
        }
        

        return response()->json([
            'customer' => $customer,
            'operation' => 'delete',
            'status' => 'successful',
            'code' => '1'
        ]);        
    }

    public function getCustomers() 
    {
        $customers = Customer::orderBy('id', 'DESC')->get();

        return $customers;
    }
    
    public function index() 
    {
        $customers = Customer::orderBy('id', 'DESC')->get();
        return view('customer')->with('customers', $customers);
    }

    
    public function create()
    {
        return view('customer.create');
    }

    public function store(Request $request)
    {
        //
        $customer = new Customer();
        $customer->first_name = $request->get('first_name');
        $customer->second_name = $request->get('second_name');
        $customer->last_name = $request->get('last_name');
        $customer->address = $request->get('address');
        $customer->phone_number = $request->get('phone_number');
        
        $customer->save();

        return response()->json([
            'customer' => $request->all(),
            'operation' => 'save',
            'status' => 'successful',
            'code' => '1'
        ]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
        $customer = Customer::find($id);
        return view('customer.edit')->with('customer', $customer);
    }

    public function update(Request $request, $id)
    {
        //
        $customer = Customer::find($id);
        $customer->first_name = $request->get('first_name');
        $customer->second_name = $request->get('second_name');
        $customer->last_name = $request->get('last_name');
        $customer->address = $request->get('address');
        $customer->phone_number = $request->get('phone_number');

        $customer->save();

        
        return response()->json([
            'customer' => $request->all(),
            'operation' => 'update',
            'status' => 'successful',
            'code' => '1'
        ]);
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);

        $customer->delete();
    }
}

