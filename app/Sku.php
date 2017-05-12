<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Sku
 *
 * @property int $id
 * @property int $lotteryId
 * @property int $skuSpecId
 * @property int $gradeId
 * @property string $imageCode
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Sku whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Sku whereGradeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Sku whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Sku whereImageCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Sku whereLotteryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Sku whereSkuSpecId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Sku whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Sku extends Model
{
    //
}
