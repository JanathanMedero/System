<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Hash;
use Auth;

class EmployeController extends Controller
{
    public function index()
    {
        $employees = User::where('id', '!=',  Auth::user()->id)->paginate(10);

        return view('auth.employees.index', compact('employees'));
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

    public function update(Request $request, $id)
    {
        $user = User::where('id', $id)->first();

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->role_id = $request->rol_id;

        $user->save();

        return back()->with('info', 'Empleado actualizado correctamente');

    }

    public function suspend_account($id)
    {
        $user = User::where('id', $id)->first();

        if ($user->confirmed === 1) {
            $user->confirmed = 0;
        }else{
            $user->confirmed = 1;
        }

        $user->save();

        if ($user->confirmed == 1) {
            return back()->with('success', 'Cuenta de empleado activada correctamente');
        }
        return back()->with('danger', 'Cuenta de empleado suspendida correctamente');
    }
}
