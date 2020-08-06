<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'contactno','product_id','type','answerOne',
        'answerTwo','answerThree','answerFour','answerFive','answerSix',
        'answerSeven','answerEight','answerNine','answerTen'
    ];
    public function product(){
        return $this->belongsTo('App\Product');
    }
}
