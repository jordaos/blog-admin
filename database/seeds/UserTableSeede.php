<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Role;

class UserTableSeede extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'Administradores')->first();

        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@mail.com';
        $user->password = bcrypt('qwe123');
        $user->save();
        $user->roles()->attach($role_admin);
    }
}
