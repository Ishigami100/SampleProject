<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item_user extends Model
{
    protected $fillable = [
        'id',
        'username',
        'itemID',
        'flag',
      ];
}
