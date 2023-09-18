<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Visitor;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        Visitor::create(
            [

                'name' => 'akbar',
                'company' => 'PLN UBINFRA',
                'identity_number' => '1234567890',
                'purpose' => 'meeting',
                'out_at' => date('Y-m-d H:i:s P'),
                'signature' => 'signature'
            ]
        );

         User::create(
            [

                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'username' => 'admin',
                'password' => bcrypt('@dmin123'),
            ]
        );
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
