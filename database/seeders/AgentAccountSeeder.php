<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;


class AgentAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $agent1 = User::create([
            'name' => 'Agent One',
            'email' => 'agent1@example.com',
            'phone' => '0123456789',
            'password' => Hash::make('password'),
            'is_agent' => 1,
            'email_verified_at' => now(), 
            'remember_token' => Str::random(10),
            'created_at' => now(), 
            'updated_at' => now(), 

        ]);

        $agent2 = User::create([
            'name' => 'Agent Two',
            'email' => 'agent2@example.com',
            'phone' => '0123456799',
            'password' => Hash::make('password'),
            'is_agent' => 1,
            'email_verified_at' => now(), 
            'remember_token' => Str::random(10),
            'created_at' => now(), 
            'updated_at' => now(), 
        ]);
    }
}
