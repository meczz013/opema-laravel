<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	$user = User::where('email', 'super@admin.com')->first();
    	if (!$user)
    	{
        $user = new User;
        $user->name = 'Super Admin';
        $user->email = 'super@admin.com';
        $user->password = bcrypt('secret'); 
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();
    	}
    }
}
