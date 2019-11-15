<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Item
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string $name
 * @property string $seo
 * @property int $angle
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Item onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item whereAngle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item whereSeo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Item withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Item withoutTrashed()
 * @mixin \Eloquent
 */
class Item extends Model
{
    use SoftDeletes;
    protected $table       = 'item';

    protected $fillable = [
        'name',
        'seo',
        'angle'
    ];
}
