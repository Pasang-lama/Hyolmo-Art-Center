<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

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
            "name" => "Hyolmo Art Center Pvt. Ltd.",
            "email" => "admin@hyolmoartcenter.com",
            "phone" => "9745948260",
            "address" => "Kathmandu, Bouddha, Gokarneshwor-8 ",
            "photo" => NULL,
            "role" => "admin",
            "provider" => NULL,
            "provider_id" => NULL,
            "status" => "active",
            "email_verified_at" => NULL,
            "password" => bcrypt("Admin@321"),
            "remember_token" => NULL,
            "created_at" => date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s'),
        ]);
    }
}
