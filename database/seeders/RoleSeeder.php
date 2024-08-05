<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $json = File::get("database/data/roles.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            Role::create(array(
                'name' => $obj->name,
            ));
        }
    }
}
