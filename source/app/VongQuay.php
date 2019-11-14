<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\VongQuay
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string $name
 * @property string $phone
 * @property string|null $email
 * @property string $shop_id
 * @property string $shop_name
 * @property string|null $reward_id
 * @property string|null $reward_name
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VongQuay newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VongQuay newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\VongQuay onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VongQuay query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VongQuay whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VongQuay whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VongQuay whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VongQuay whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VongQuay whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VongQuay wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VongQuay whereRewardId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VongQuay whereRewardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VongQuay whereShopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VongQuay whereShopName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VongQuay whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\VongQuay withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\VongQuay withoutTrashed()
 * @mixin \Eloquent
 */
class VongQuay extends Model
{
    use SoftDeletes;
    protected $table = 'vong_quay';
    protected $fillable = array(
        'name',
        'phone',
        'email',
        'shop_id',
        'shop_name',
        'reward_id',
        'reward_name'
    );
}
