<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'widdyarfiansyah00@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('Rahasia123'),
        ]);
    }
}
