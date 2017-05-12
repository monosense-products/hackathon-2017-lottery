<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Lottery
 *
 * @property int $id
 * @property string $name
 * @property string $openTime
 * @property string $closeTime
 * @property string $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Lottery whereCloseTime($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Lottery whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Lottery whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Lottery whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Lottery whereOpenTime($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Lottery whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Lottery whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Lottery extends Model
{
    //
}
