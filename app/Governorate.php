<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Governorate extends Model
{
    protected $table = 'governorates';

    public function area()
    {
        return $this->hasMany(Area::class,'governorate_id');
    }
}
