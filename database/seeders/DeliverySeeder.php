<?php

namespace Database\Seeders;

use App\Models\Delivery;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DeliverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/deliverys.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            Delivery::create(array(
                'name' => $obj->name,
            ));
        }
    }
}