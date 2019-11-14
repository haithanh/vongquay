<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemToStore extends Model
{
    use SoftDeletes;
    protected $table       = 'item_to_store';

    protected $fillable = [
        'store_id',
        'item_id',
        'number',
        'percent'
    ];

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }
}
