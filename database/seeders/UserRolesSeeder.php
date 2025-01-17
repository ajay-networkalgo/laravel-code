<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserRole;
use Carbon\Carbon;

class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $timestamp = Carbon::now();
        UserRole::create([
            'roles' => 'admin',
            'created_at' => $timestamp,
            'updated_at' => $timestamp,
        ]);

        UserRole::create([
            'roles' => 'manager',
            'created_at' => $timestamp,
            'updated_at' => $timestamp,
        ]);
    }
}
