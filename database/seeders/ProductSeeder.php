<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/products.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            Product::create(array(
                'name' => $obj->name,
                'type_id' => $obj->type_id,
                'detail' => $obj->detail,
                'image' => $obj->image,
                'stock' => $obj->stock,
                'price' => $obj->price,
            ));
        }
    }
}