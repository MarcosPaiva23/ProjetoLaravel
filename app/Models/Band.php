<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'photo', 'albums'];
}
