<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RoleTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles =[
            'Admin',
            'Teacher',
            'Supporter'
        ];



        foreach ($roles as $role){
            $roleTable =new \Spatie\Permission\Models\Role();
            $roleTable->name = $role;
            $roleTable->save();
        }

        App\User::create([
            'name'=>'admin',
            'email'=>'admin@admin.com',
            'password'=>Hash::make('123456')
        ])->assignRole('Admin');

    }
}
