<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Hash;

class EmployeController extends Controller
{
    public function index()
    {
        $employees = User::paginate(10);

        return view('auth.orders.index', compact('employees'));
    }

    public function store(Request $request)
    {
        User::create([
            'role_id'   => $request->rol_id,
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
        ]);

        return back()->with('success', 'Empleado creado correctamente');
    }

    public function destroy($id)
    {
        $user = User::where('id', $id)->first();

        $user->delete();

        return back()->with('danger', 'Empleado eliminado correctamente');
    }
}
