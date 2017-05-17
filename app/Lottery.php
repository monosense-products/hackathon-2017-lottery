<?php

namespace App;

use App\Events\LotteryUpdated;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Lottery
 *
 * @property int            $id
 * @property string         $name
 * @property string         $openTime
 * @property string         $closeTime
 * @property string         $status
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
    protected $appends = ['lot_count'];

    /**
     * 残りくじ枚数。シリアライズ・フィールド用 getter
     *
     * @return int
     */
    public function getLotCountAttribute()
    {
        return $this->prizes()
                    ->onSale()
                    ->count();
    }

    /**
     * @return bool
     */
    public function isOpen()
    {
        return $this->status === 'open';
    }

    /**
     * @return bool
     */
    public function isClosed()
    {
        return $this->status === 'close';
    }

    /**
     * @return void
     */
    public function open()
    {
        $this->status = 'open';
        $this->save();
    }

    /**
     * @return void
     */
    public function close()
    {
        $this->status = 'close';
        $this->save();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function lotterySpec()
    {
        return $this->hasOne(LotterySpec::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function skus()
    {
        return $this->hasMany(Sku::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function prizes()
    {
        return $this->hasMany(Prize::class);
    }

    /**
     * @param int $n number of drawing lots
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function draw($n)
    {
        if ($n < 1) {
            throw new \InvalidArgumentException("Invalid count of lots");
        }
        if ($this->isClosed()) {
            throw new \RuntimeException("Lottery already closed");
        }

        \DB::beginTransaction();
        /** @var \Illuminate\Database\Eloquent\Builder $on_sale */
        $on_sale = Prize::onSale();
        if ($n < $on_sale->count()) {
            $prizes = $on_sale
                ->exceptLastOnes()
                ->inRandomOrder()
                ->take($n)
                ->get();
        } else {
            // including lastOne
            $prizes = $on_sale->get();
            $this->close();
        }
        foreach ($prizes as $prize) {
            $prize->sold();
        }
        \DB::commit();

        // 更新イベント発生
        $event = new LotteryUpdated($this->id);
        event($event);

        return $prizes;
    }
}
