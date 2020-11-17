<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerStoreRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::latest()->paginate(10);
        return view('customers.index')->with('customers', $customers);
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(CustomerStoreRequest $request)
    {
        $avatar_path = '';

        if ($request->hasFile('avatar')) {
            $avatar_path = $request->file('avatar')->store('customers');
        }

        $customer = Customer::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'avatar' => $avatar_path,
            'user_id' => $request->user()->id,
        ]);

        if (!$customer) {
            return redirect()->back()->with('error', 'Sorry, there\'re a problem while creating customer.');
        }
        return redirect()->route('customers.index')->with('success', 'Success, your customer have been created.');
    }
}
