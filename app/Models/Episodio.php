<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Episodio extends Model
{
    protected $table = 'episodios';
    public $timestamps = false;
    protected $fillable = ['temporada', 'numero', 'assistido', 'serie_id'];
    protected $perPage = 10;
    protected $appends  = ['links'];

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }

    public function getAssistidoAttribute($assistido): bool
    {
        return $assistido;
    }

    public function getLinksAttribute($links): array
    {
        return [
            'self' => route('episodios.show', ['id' => $this->id]),
            'serie' => route('series.show', ['id' => $this->serie_id])
        ];
    }
}
