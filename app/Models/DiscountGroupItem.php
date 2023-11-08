<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountGroupItem extends Model
{
    use HasFactory;

    protected $table = 'product_group_items';

    protected $fillable = [
        'group_id',
        'product_id',
    ];
}
