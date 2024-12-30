<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use CrudTrait;
    

    protected $fillable = [
        'name',
        'address',
        'state',
        'country',
    ];
}
