<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\CarImage;
use App\Models\CarModel;
use App\Models\CarType;
use App\Models\City;
use App\Models\FuelType;
use App\Models\Maker;
use App\Models\State;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //creating car types
        CarType::factory()
            ->sequence(
                ['name' => 'Sedan'],
                ['name' => 'Hatchback'],
                ['name' => 'SUV'],
                ['name' => 'Pickup Truck'],
                ['name' => 'Minivan'],
                ['name' => 'Jeep'],
                ['name' => 'Coupe'],
                ['name' => 'Crossover'],
                ['name' => 'Sports Car'],
            )
            ->count(9)
            ->create();

        //Fuel Type
        FuelType::factory()
            ->sequence(
                ['name' => 'Gasoline'],
                ['name' => 'Diesel'],
                ['name' => 'Electric'],
                ['name' => 'Hybrid']
            )
            ->count(4)
            ->create();

        //states
        $states = [
            'California' => ['Los Angeles', 'San Francisco', 'San Diego'],
            'Texas' => ['Houston', 'San Antonio', 'Dallas'],
            'Florida' => ['Miami', 'Orlando', 'Jacksonville'],
            'New York' => ['New York City', 'Buffalo', 'Yonkers'],
            'Ohio' => ['Columbus', 'Cleveland', 'Toledo'],
            'Georgia' => ['Atlanta', 'Savannah', 'Augusta']
        ];

        foreach ($states as $state => $cities) {
            State::factory()
                ->state(['name' => $state])
                ->has(
                    City::factory()
                        ->count(count($cities))
                        ->sequence(...array_map(fn($city) => ['name' => $city], $cities))
                )
                ->create();
        }

        //makers
        $makers = [
            'Toyota' => ['Camry', 'Corolla', 'Prius'],
            'Ford' => ['Escape', 'Mustang', 'Fusion'],
            'Honda' => ['Civic', 'Accord', 'Odyssey'],
            'Chevrolet' => ['Malibu', 'Impala', 'Silverado'],
            'Nissan' => ['Rouge', 'Maxima', 'Sentra'],
            'Lexus' => ['RX400', 'ES350', 'LS500']
        ];

        foreach ($makers as $maker => $carModels) {
            Maker::factory()
                ->state(['name' => $maker])
                ->has(
                    CarModel::factory()
                        ->count(count($carModels))
                        ->sequence(...array_map(fn($carModel) => ['name' => $carModel], $carModels))
                )
                ->create();
        }


        //create users

        User::factory()
            ->count(3)
            ->create();

        User::factory()
            ->count(2)
            ->has(
                Car::factory()
                    ->count(50)
                    ->has(
                        CarImage::factory()
                            ->count(5)
                            ->sequence(fn(Sequence $sequence) => ['position' => $sequence->index % 5 + 1]),
                        'images'
                    )
                    ->hasFeatures(),
                'favouriteCars'
            )
            ->create();
    }
}
