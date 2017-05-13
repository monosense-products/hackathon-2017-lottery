<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Prize
 *
 * @property int            $id
 * @property string         $name
 * @property int            $lotteryId
 * @property int            $gradeId
 * @property string         $status
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
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sku()
    {
        return $this->belongsTo('App\Sku');
    }

    /**
     * @return bool
     */
    public function is_last_one()
    {
        return $this->grade()->is_last_one();
    }

    /**
     * 人気のあるユーザだけに限定するクエリスコープ
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeExceptLastOnes($query)
    {
        $relation = 'sku';
        return $query->with($relation)
                     ->whereDoesntHave($relation, function ($query) {
                         return $query->lastOnes();
                     });
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLastOnes($query)
    {
        $relation = 'sku';
        return $query->with($relation)
                     ->whereHas($relation, function ($query) {
                         return $query->lastOnes();
                     });
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOnSale($query)
    {
        return $query->where("status", "on_sale");
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSold($query)
    {
        return $query->where("status", "sold");
    }

    public function sold()
    {
        $this->status = "sold";
        $this->save();
    }

    public function on_sale()
    {
        $this->status = "on_sale";
        $this->save();
    }
}
