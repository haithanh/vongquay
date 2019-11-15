<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ItemToStore
 *
 * @property int $id
 * @property int $store_id
 * @property int $item_id
 * @property int $number
 * @property int $percent
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Item $item
 * @property-read \App\Store $store
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ItemToStore newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ItemToStore newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\ItemToStore onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ItemToStore query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ItemToStore whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ItemToStore whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ItemToStore whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ItemToStore whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ItemToStore wherePercent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ItemToStore whereStoreId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ItemToStore whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ItemToStore withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\ItemToStore withoutTrashed()
 * @mixin \Eloquent
 */
class ItemToStore extends Model
{
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
