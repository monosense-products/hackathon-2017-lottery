<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Grade
 *
 * @property int $id
 * @property string $name
 * @property int $rank
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Grade whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Grade whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Grade whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Grade whereRank($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Grade whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Grade extends Model
{
    //
}
