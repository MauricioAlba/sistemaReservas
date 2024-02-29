<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEnvironmentRequest;
use App\Models\Environment;
use Illuminate\Http\Request;

class EnvironmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Environment::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEnvironmentRequest $request)
    {
        $request->validated();

        Environment::create($request->all());
        
        return response([
            'message' => 'Se creo el ambiente',
            'environment' => $request->all()
        ]);
        
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $environment = Environment::find($id);

        if(!$environment){
            return response()->json([
                'message' => 'no se encontro el ambiente'
            ], 404);
        }

        return $environment;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $environment = $this->show($id);

        if(!$environment){
            return response()->json([
                'message' => 'no se encontro el ambiente'
            ],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $environment = $this->show($id);

        if(!$environment){
            return response()->json([
                'message' => 'no se encontro el ambiente'
            ]);
        }

        $environment->delete();
        return response([
            'message' => 'El ambiente fue eliminado'
        ]);
    }
}
