<?php


namespace App\Http\Controllers;


use App\Models\Serie;

class SerieController extends BaseController
{
    public function __construct()
    {
        $this->classe = Serie::class;
    }

    public function todosEpisodios($id)
    {
        $serie = Serie::query()->find($id);
        if (is_null($serie)){
            return response()->json(['eror' => 'Série não encontrada'], 404);
        }

        $episodios = $serie->episodios()->paginate();
        return response()->json($episodios);
    }
}
