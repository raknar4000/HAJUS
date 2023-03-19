<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marker;
use Inertia\Inertia;

class MapsController extends Controller
{
    public function index(){
        $data = Marker::all();
        return Inertia::render('GoogleMaps', ['data' => $data]);
    }

    public function show($id){
        $marker = Marker::find($id);
        return Inertia::render('MarkerEdit', ['marker' => $marker]);
    }

    public function store(Request $request){
        Marker::create([
            'name' => $request->name,
            'description' => $request->description,
            'latitude' => $request->lat,
            'longitude' => $request->lng,
            'edited' => $request->edited,
            'added' => $request->added
        ]);
        return redirect("/map");
    }

    public function update(Request $request, $id){

        $marker = Marker::findOrFail($id);

        $marker->update($request->all());

        return redirect("/map");
    }

    public function delete(Request $request, $id){
        $marker = Marker::find($id);
        $marker->delete();
        return redirect("/map");
    }
}
