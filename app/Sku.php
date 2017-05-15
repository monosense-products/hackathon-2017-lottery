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
    // FIXME: Sku -> SKU

    protected $appends = ['quantity'];

    public function getQuantityAttribute()
    {
        return $this->prizes()->count();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lottery()
    {
        return $this->belongsTo(Lottery::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function prizes()
    {
        return $this->hasMany(Prize::class);
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLastOnes($query)
    {
        $relation = 'grade';
        return $query->with($relation)->whereHas($relation, function ($query) {
            return $query->lastOnes();
        });
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeExceptLastOnes($query)
    {
        $relation = 'grade';
        return $query->with($relation)->whereDoesntHave($relation, function ($query) {
            return $query->lastOnes();
        });
    }
}
