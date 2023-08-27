<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Owner;
use Illuminate\Database\Seeder;
use App\Models\Bicycle;
use App\Models\Manufacturer;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        User::truncate();
        Manufacturer::truncate();
        Owner::truncate();
        Bicycle::truncate();

        User::factory(100)->create();

        Manufacturer::insert([
            [
                "name" => "Capriolo",
                "city" => "Berlin",
                "CEO" => "Bicyclel Benz"
            ],
            [
                "name" => "Polar",
                "city" => "Munnich",
                "CEO" => "Michael Sins"
            ],
            [
                "name" => "Cross",
                "city" => "Boston",
                "CEO" => "John Cena"
            ]
        ]);

        Owner::insert([
            [
                "name" => "Milos Mitrovic",
                "age" => 61,
                "is_invalid" => true,
                "nationality" => "serbian",
                "driver_license" => 2475
            ],
            [
                "name" => "Pera Peric",
                "age" => 36,
                "is_invalid" => false,
                "nationality" => "serbian",
                "driver_license" => 2551
            ]
        ]);


        $bicycle_1 = new Bicycle;
        $bicycle_1->model_name = "Express";
        $bicycle_1->color = "Black";
        $bicycle_1->description = "This bicycle is super fast and has many fun things.";
        $bicycle_1->price = "86421";
        $bicycle_1->manufacturer_id = 2;
        $bicycle_1->owner_id = 2;
        $bicycle_1->save();

        Bicycle::create([
            "model_name" => "Adrenalin",
            "color" => "Black",
            "description" => "For luxury and smooth rides this is best bicycle ever.",
            "price" => "82084",
            "manufacturer_id" => 1,
            "owner_id" => 1
        ]);
    }
}
