<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = true;

    // public function Branches()
    // {
    //     return $this->hasMany('App\Branch', 'companyId', 'Id');
    // }

    public function Company()
    {
        return $this->belongsTo('App\Company','companyId', 'Id');
    }
}
