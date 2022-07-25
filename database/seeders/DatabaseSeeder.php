<?php

namespace Database\Seeders;

use App\Models\Role;
use DB;
use Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::table('offices')->insert([
            'name' => 'Matríz',
        ]);

        DB::table('offices')->insert([
            'name' => 'Sucursal Virrey',
        ]);

        $RolAdministrador = Role::create([
            'role' => 'Administrador',
        ]);

        $RolEmpleado = Role::create([
            'role' => 'Empleado',
        ]);

        DB::table('users')->insert([
            'role_id'   => $RolAdministrador->id,
            'name'      => 'Janathan Medero Pineda',
            'email'     => 'webmaster@pyscom.com',
            'password'  => Hash::make('webmaster.pyscom2021'),
        ]);

        DB::table('users')->insert([
            'role_id'   => $RolAdministrador->id,
            'name'      => 'Jose Alberto Avalos Villaseñor',
            'email'     => 'gerencia@pyscom.com',
            'password'  => Hash::make('gerencia.pyscom.2021'),
        ]);

        DB::table('users')->insert([
            'role_id'   => $RolAdministrador->id,
            'name'      => 'Catalina Alcocer',
            'email'     => 'ventas@pyscom.com',
            'password'  => Hash::make('ventas.pyscom2021'),
        ]);

        DB::table('users')->insert([
            'role_id'   => $RolEmpleado->id,
            'name'      => 'Ana Manuela Bautista Cruz',
            'email'     => 'pyscom@live.com.mx',
            'password'  => Hash::make('ana.pyscom2021'),
        ]);

        DB::table('users')->insert([
            'role_id'   => $RolEmpleado->id,
            'name'      => 'Eduardo de la Cruz',
            'email'     => 'sistemas@pyscom.com',
            'password'  => Hash::make('sistemas.pyscom2021'),
        ]);

        DB::table('users')->insert([
            'role_id'   => $RolEmpleado->id,
            'name'      => 'Sinuhé Daniel Velzquez',
            'email'     => 'logistica@pyscom.com',
            'password'  => Hash::make('logistica.pyscom2021'),
        ]);

        DB::table('users')->insert([
            'role_id'   => $RolEmpleado->id,
            'name'      => 'Estefany',
            'email'     => 'ventasvirrey@pyscom.com',
            'password'  => Hash::make('ventas.virrey.pyscom.2021'),
        ]);

        DB::table('users')->insert([
            'role_id'   => $RolEmpleado->id,
            'name'      => 'Jessica Hernandez Pille',
            'email'     => 'adminvirrey@pyscom.com',
            'password'  => Hash::make('adminvirrey.pyscom.2021'),
        ]);

        DB::table('categories')->insert([
            'name' => 'Toner',
        ]);

        DB::table('categories')->insert([
            'name' => 'Redes',
        ]);

        DB::table('categories')->insert([
            'name' => 'Accesorios',
        ]);

        DB::table('categories')->insert([
            'name' => 'Energía',
        ]);

        DB::table('categories')->insert([
            'name' => 'Perifericos',
        ]);

        DB::table('categories')->insert([
            'name' => 'Papelería',
        ]);

    }
}
