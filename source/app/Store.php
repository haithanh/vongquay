<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Store
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string $name
 * @property string $seo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Store newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Store newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Store onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Store query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Store whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Store whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Store whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Store whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Store whereSeo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Store whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Store withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Store withoutTrashed()
 * @mixin \Eloquent
 */
class Store extends Model
{
    use SoftDeletes;
    protected $table       = 'store';

    protected $fillable = [
        'name',
        'seo'
    ];
}
