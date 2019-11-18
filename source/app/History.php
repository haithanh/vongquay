<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\History
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int $store_id
 * @property int|null $item_id
 * @property int|null $code_id
 * @property string $name
 * @property string $phone
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Code|null $code
 * @property-read \App\Item|null $item
 * @property-read \App\Store $store
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\History newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\History newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\History onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\History query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\History whereCodeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\History whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\History whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\History whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\History whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\History whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\History wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\History whereStoreId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\History whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\History withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\History withoutTrashed()
 * @mixin \Eloquent
 * @property string|null $address
 * @method static \Illuminate\Database\Eloquent\Builder|\App\History whereAddress($value)
 */
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
        'address'
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
