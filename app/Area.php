<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'areas';

    public function governorates()
    {
        return $this->belongsTo(Governorate::class);
    }
}
