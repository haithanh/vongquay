<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class History extends Model
{
    use SoftDeletes;
    protected $table       = 'history';
    protected $fillable    = [
        'store_id',
        'item_id',
        'code_id',
        'name',
        'phone',
        'email'
    ];

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }

    public function code()
    {
        return $this->belongsTo(Code::class, 'code_id');
    }
}
