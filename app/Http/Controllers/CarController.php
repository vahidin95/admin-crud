<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\People;

class CarController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $people = People::all();
        $cars = Car::latest()->paginate(5);
        return view('cars.index', compact('cars', 'people'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $people = People::all();
        return view('cars.create', compact('people'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'people_id' => 'required',
            'name' => 'required',
            'type' => 'required',
            'color' => 'required',
         ]);

        $data = array(
            'people_id' => $request->people_id,
            'name' => $request->name,
            'type' => $request->type,
            'color' => $request->color,
        );
        $car = Car::create($data);
        $people = People::all();
        $cars = Car::latest()->paginate(5);
        session()->flash('message', 'You successfully added new car');
        return view('cars.index', compact('cars', 'car', 'people'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {

        $car = Car::findOrFail($id);
        return view('cars.detail', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $car = Car::findOrFail($id);
        return view('cars.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [ 
            'name' => 'required|max:20',
            'type' => 'required|max:20',
            'color' => 'required|max:20',
        ]);

        $car = Car::findOrFail($id);
        $car->update($request->all());
        $cars = Car::latest()->paginate(5);
        return view('cars.index', compact('car', 'cars'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $this->validate($request, [ 
            'car_id' => 'required',
        ]);

        $car = Car::findOrFail($request->car_id);
        //dd($car);
        $car->delete();
        return back();
    }
}
