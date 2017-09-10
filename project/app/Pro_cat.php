<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pro_cat extends Model {

    protected $table = 'pro_cat';
    protected $fillable = ['name'];

    public function products() {
        return $this->hasMany(Products::class);
    }

}
