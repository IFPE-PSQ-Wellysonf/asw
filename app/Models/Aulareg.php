<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aulareg extends Model
{
    public function responsavel()
    {
        return $this->belongsTo('App\User','id_responsavel');
    }
}
