<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    public $timestamps = false;

    protected $fillable = ['name', 'image', 'release_date', 'band_id'];

    public function band()
    {
        return $this->belongsTo(Band::class);
    }
}
