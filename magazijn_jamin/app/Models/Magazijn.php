<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magazijn extends Model
{
    /** @use HasFactory<\Database\Factories\MagazijnFactory> */
    use HasFactory;

    protected $fillable = [
        'ProductId',
        'VerpakkingsEenheid',
        'AantalAanwezig',
        'IsActief',
        'Opmerkingen',
        'DatumAangemaakt',
        'DatumGewijzigd'
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
