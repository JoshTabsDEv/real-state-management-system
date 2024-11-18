<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AssignRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Role::create(["name"=> "admin"]);
        Role::create(["name"=> "agent"]);
        Role::create(["name"=> "owner"]);
        Role::create(["name"=> "cleint"]);
    }
}
