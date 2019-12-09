<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\User;

class SuperAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        User::create([
            'name' => 'admin',
            'username' => 'Admin',
            'email' => 'admin@example.com',
            'role_id' => 1,
            'photo' => 'images/avatars/1.png',
            'password' => bcrypt('admin123456'),
        ]);
    }
}
