<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item_user extends Model
{
  use HasFactory;
  protected $table = 'item_user';
  
    protected $fillable = [
        'username',
        'itemID',
        'flag',
        'furnitureID'
      ];
}
