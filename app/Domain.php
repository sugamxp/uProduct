<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    //
    protected $table = 'domains';
    public $timestamps = false;
    public $primaryKey = 'id';
    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
