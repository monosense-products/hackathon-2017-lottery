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
    /**
     * @return boolean
     */
    public function is_last_one()
    {
        return $this->last_one_flag;
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLastOnes($query)
    {
        return $query->where('last_one_flag', true);
    }
}
