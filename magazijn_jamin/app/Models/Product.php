<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Task;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $table = 'product'; // Ensure the table name is correct

    protected $fillable = [
        'Naam',
        'Omschrijving',
        'Prijs',
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
