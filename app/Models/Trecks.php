<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trecks extends Model
{
    use HasFactory;

    protected $fillable = [
        'treckName',
        'idUser',
        'pseudo',
        'hardness',
        'time',
        'type',
        'distance',
        'location',
        'coords',
        'description',
        'img',
        'profil'
    ];
}
