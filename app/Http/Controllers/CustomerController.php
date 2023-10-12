<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //

    public function index()
    {
        $customers = Customer::all();
        return response()->json($customers);
    }

    public function store()
    {
        $customer = new Customer();
        $customer->customer_name = request()->get('customer_name', '');
        $customer->phone = request()->get('phone', '');
        $customer->address = request()->get('address', '');
        $customer->save();

        // INSERT INTO customers(....) VALUE()

        return response()->json([
            "message" => "Berhasil Menambah Pelanggan",
            "data" => $customer
        ]);
    }

    public function update($id)
    {
        $customer = Customer::find($id);
        // SELECT * FROM customers WHERE id = ?
        $customer->customer_name = request()->get('customer_name', '');
        $customer->phone = request()->get('phone', '');
        $customer->address = request()->get('address', '');
        $customer->save();

        // UPDATE customers SET .... WHERE id = ?

        return response()->json([
            "message" => "Berhasil Mengubah Pelanggan",
            "data" => $customer
        ]);
    }

    public function show($id)
    {
        $customer = Customer::find($id);

        return response()->json([
            "data" => $customer
        ]);
    }

    public function delete($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        // DELETE FROM .... WHERE id = ?
        return response()->json([
            "message" => "Berhasil Menghapus Pelanggan",
            "data" => $customer
        ]);
    }
}
