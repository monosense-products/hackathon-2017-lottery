<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\LotterySpec
 *
 * @property int $id
 * @property int $lotteryId
 * @property int $lotPrice
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\LotterySpec whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\LotterySpec whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\LotterySpec whereLotPrice($value)
 * @method static \Illuminate\Database\Query\Builder|\App\LotterySpec whereLotteryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\LotterySpec whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class LotterySpec extends Model
{
    //
}
