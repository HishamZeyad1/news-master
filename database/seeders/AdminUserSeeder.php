<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;


class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Hisham Zeyad',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'usertype'=>'admin',
            'email_verified_at' => now(),
            // 'api_token' => Str::random(30),
            'api_token' => bin2hex(random_bytes(30)),        

            'remember_token' => Str::random(10),
        ]);


    }
}
