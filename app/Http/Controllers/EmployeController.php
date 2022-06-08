<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    public function index()
    {
        $employees = User::paginate(10);

        return view('auth.orders.index', compact('employees'));
    }
}
