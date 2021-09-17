<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return view('pages.customer.index',['customer'=>User::class]);
    }
    public function create()
    {
        return view('pages.customer.create');
    }

    public function edit($id)
    {
        return view('pages.customer.edit',compact('id'));
    }
    public function show($id)
    {
        return view('pages.customer.show',compact('id'));
    }
}
