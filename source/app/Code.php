<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Code
 *
 * @property int $id
 * @property int $store_id
 * @property int $item_id
 * @property string $code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Item $item
 * @property-read \App\Store $store
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Code newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Code newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Code query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Code whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Code whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Code whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Code whereStoreId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Code whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int|null $status
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Code whereStatus($value)
 * @property int $code_type
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Code whereCodeType($value)
 */
class Code extends Model
{
    protected $table       = 'code';

    protected $fillable = [
        'store_id',
        'code_type',
        'code',
        'status'
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
