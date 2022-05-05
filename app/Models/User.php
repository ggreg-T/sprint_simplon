<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'inputFirstName',
        'inputLastName',
        'inputPseudo',
        'inputEmail',
        'inputAge',
        'inputTel',
        'inputContact1',
        'inputPhoneContact1',
        'inputContact2',
        'inputPhoneContact2',
        'inputPassword'
    ];

    public $timestamps = true;
    protected $dateFormat = 'Y/m/d H:i:s';
}
