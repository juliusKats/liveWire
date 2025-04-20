<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlevelCombs extends Model
{
    //
   protected $fillable=['PSubjects','SSubjects','Combination','category', 'category_value'];

   public static function boot(){
    parent::boot();
    static::creating(function($model){
        $model->category_value = substr(md5(rand()),0,7);
    });
   }
}
