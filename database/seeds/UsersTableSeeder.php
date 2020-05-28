<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('users')->delete();
        DB::table('role_user')->delete();


        $adminRole = Role::where('name','admin')->first();
        $editorRole = Role::where('name','editor')->first();
        $userRole = Role::where('name','user')->first();

        $admin = User::create([
        	'name' => 'Admin User',
        	'email' => 'admin@admin.com',
        	'password' => Hash::make('Alex1996'),
            'phone' => '0',
            'company_name' => 'n/a',
            'position' => 'n/a',
            'type_company_user' => 'n/a',

        ]);

        $editor = User::create([
        	'name' => 'Editor User',
        	'email' => 'editor@editor.com',
        	'password' => Hash::make('Alex1996'),
            'phone' => '0',
            'company_name' => 'n/a',
            'position' => 'n/a',
            'type_company_user' => 'n/a',

        ]);

        $user = User::create([
        	'name' => 'Simple User',
        	'email' => 'user@user.com',
        	'password' => Hash::make('Alex1996'),
            'phone' => '0',
            'company_name' => 'n/a',
            'position' => 'n/a',
            'type_company_user' => 'n/a',

        ]);

        $vicente = User::create([
            'name' => 'Vicente Sanchez',
            'email' => 'vicente@admin.com',
            'password' => Hash::make('123456'),
            'phone' => '0',
            'company_name' => 'n/a',
            'position' => 'n/a',
            'type_company_user' => 'n/a',

        ]);

        $admin->roles()->attach(1);
        $editor->roles()->attach(2);
        $user->roles()->attach(3);
        $vicente->role()->attach(1);

        factory(User::class, 30)->create()->each(function($user){

            $user->roles()->attach(3);

        });

    }
}
