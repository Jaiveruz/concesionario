<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $table = 'vehiculos';
    protected $primaryKey = 'vehiculo_id';

    protected $fillable = [
        'marca',
        'modelo',
        'ano',
        'color',
        'precio',
        'kilometraje',
        'image'
    ];
}
