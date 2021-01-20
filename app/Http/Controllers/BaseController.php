<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

abstract class BaseController extends Controller
{
    protected $classe;

    public function index()
    {
        return $this->classe::query()->paginate();
    }

    public function store(Request $request)
    {
        return response()->json($this->classe::query()->create($request->all()), 201);
    }

    public function show($id)
    {
        $recurso = $this->classe::query()->find($id);
        if (is_null($recurso))
            return response()->json('', 204);

        return response()->json($recurso);
    }

    public function update($id, Request $request)
    {
        $recurso = $this->classe::query()->find($id);
        if (is_null($recurso)){
            return response()->json([
                'erro' => 'Recurso não encontrado'
            ], 404);
        }

        $recurso->fill($request->all());
        $recurso->save();
        return response()->json($recurso);
    }

    public function destroy($id)
    {
        $removido = $this->classe::destroy($id);
        if ($removido === 0){
            return response()->json([
                'erro' => 'Recurso não encontrado'
            ], 404);
        }

        return response()->json('', 204);
    }
}
