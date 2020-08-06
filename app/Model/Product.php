<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'user_id'
    ];
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function responses(){
        return $this->hasMany('App\Model\Response');
    }
}
