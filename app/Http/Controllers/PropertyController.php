<?php

namespace App\Http\Controllers;

use App\Classes\Search\SearchBuilder;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function filter(Request $request, Property $property)
    {
        
        // $property = new Property;
        // $property = Property::findOrFail($request->id);

        // * Si no enviamos un valor la consulta va a fallar
        // $property = $property->where('name', $request->name)
        //     ->where('id', $request->id)
        //     ->get();

        // * Abajo hacemos mas flexible la consulta
        // if ($request->id) {
        //     $property = $property->where('id', $request->id);
        // }

        // if ($request->name) {
        //     $property = $property->where('name', $request->name);
        // }

        // * Se movio a un archivo de busqueda 
        // $query = $property->newQuery();

        // if ($request->id) {
        //     $query->where('id', $request->id);
        // }

        // if ($request->name) {
        //     $query->where('name', 'like', '%' . $request->name . '%');
        // }

        // if ($request->features) {
        //     $query->whereHas('features', function($q) use ($request) {
        //         $q->whereIn('features.id', $request->features);
        //     });
        // }

        // return response()->json($query->get());

        //* Si lo quieres llamas de forma static
        // $query = PropertySearch::filter($request);
        
        $builder = new SearchBuilder('Property', $request);

        $query = $builder->filter();

        return response()->json($query->get());
    }
}
