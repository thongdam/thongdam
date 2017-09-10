<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model {

    protected $table = 'products';

    public function pro_cat() {
        return $this->belongsTo(Pro_cat::class, 'cat_id');
    }

}
