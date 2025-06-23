<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarModel;
use App\Models\Maker;
use App\Models\Model;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;


class HomeController extends Controller
{
    public function index()
    {
        // $car = new Car();
        // $car->maker_id = 1;
        // $car->model_id = 1;
        // $car->year = 1900;
        // $car->price = 123;
        // $car->vin = 123;
        // $car->mileage = 123;
        // $car->car_type_id = 1;
        // $car->fuel_type_id = 1;
        // $car->user_id = 1;
        // $car->city_id = 1;
        // $car->address = "lorem ipsum";
        // $car->phone = 123;
        // $car->description = null;
        // $car->published_at = now();
        // $car->save();

        // $carData = [
        //     "maker_id" => 1,
        //     "model_id" => 1,
        //     "year" => 2024,
        //     "price" => 20000,
        //     "vin" => '999',
        //     "mileage" => 5000,
        //     "car_type_id" => 1,
        //     "fuel_type_id" => 1,
        //     "user_id" => 1,
        //     "city_id" => 1,
        //     "address" => 'something',
        //     "phone" => '999',
        //     "description" => null,
        //     "published_at" => now(),
        // ];

        // $car = new Car($carData);
        // $car->save();


        // Car::where('published_at', null)
        //     ->where('user_id', 1)
        //     ->update(['published_at' => now()]);


        // $car = Car::find(1);
        // dd($car->features);


        // $maker = Maker::factory()->create();
        // dd($maker);

        // User::factory()->create([
        //     'name' => 'Sazzad'
        // ]);



        // CarModel::factory()
        //     ->count(1)
        //     ->forMaker(['name' => 'new'])
        //     ->create();

        User::factory()
            ->has(Car::factory()->count(5), 'favouriteCars')
            ->create();

        return view('home.index');


    }
}