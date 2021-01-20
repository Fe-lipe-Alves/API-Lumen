<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    protected $table = 'series';
    public $timestamps = false;
    protected $fillable = ['nome'];
    protected $perPage = 3;
    protected $appends = ['links'];

    public function episodios()
    {
        return $this->hasMany(Episodio::class);
    }

    public function getLinksAttribute($links): array
    {
        return [
            'self' => route('series.show', ['id' => $this->id]),
            'episodios' => route('series.todosEpisodios', ['id' => $this->id])
        ];
    }
}
