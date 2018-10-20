<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';
    public $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function votes()
    {
        return $this->hasMany('App\Vote');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment','prod_id','id');
    }

}
