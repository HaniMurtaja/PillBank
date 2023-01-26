<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\UserHealth::create([
            'user_id' => -1,
            'careby_id' => -1,
            'name' => 'anas',
            'gender' => '',
            'dob' => '2012-10-2',
            'phone' => '',
            'blood_pressure' => '',
            'blood_group' => '',
            'height' => 1,
            'weight' => 1,
            'bmI' => '',
            'total_cholestrol' => '',
            'LDL_cholestrol' => '',
            'HDL_cholestrol' => '',
            'triglycerides' => '',
            'glucose' => '',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Anas',
            'email' => 'anas@sirius-it.co',
            'password' => Hash::make('123456'),
            'user_id' => 1,
            'phone' => "",
            'address' => "",
            'profile' => "",
            'image' => "",
        ]);
    }
}
