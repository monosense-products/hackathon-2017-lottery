<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Prize
 *
 * @property int $id
 * @property string $name
 * @property int $lotteryId
 * @property int $gradeId
 * @property string $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Prize whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Prize whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Prize whereLotteryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Prize whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Prize whereGradeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Prize whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Prize whereStatus($value)
 * @mixin \Eloquent
 */
class Prize extends Model
{
    //
}
