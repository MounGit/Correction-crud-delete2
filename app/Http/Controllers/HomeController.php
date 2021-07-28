<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index (){
        $dataCars = Car::all();
        $dataLow = Car::all()
                    ->where('price', "<", 4000);
        $dataHigh = Car::all()
                    ->where('price', ">=", 4000);
        return view('pages.home', compact('dataCars', 'dataHigh', 'dataLow'));
    }
    public function create (){
        return view('pages.carsCreate');
    }
    public function store(Request $request){
        $newEntry = new Car;
        $newEntry->brand=$request->brand;
        $newEntry->year=$request->year;
        $newEntry->color=$request->color;
        $newEntry->price=$request->price;
        $newEntry->discount=$request->discount;
        $newEntry->save();
        return redirect()->back();

    }
    public function destroy (Car $id){
        $id->delete();
        return redirect()->back();
    }
}
