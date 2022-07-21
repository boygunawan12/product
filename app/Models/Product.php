<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Product extends Model
{
    public $table = 'produk';
    protected $guarded = [
        'id'
    ];

}
