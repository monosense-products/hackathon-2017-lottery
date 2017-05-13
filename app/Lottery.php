<?php

namespace App;

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
    /**
     * @return bool
     */
    public function is_open()
    {
        return $this->status === 'open';
    }

    /**
     * @return bool
     */
    public function is_close()
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
     * @param int $n number of drawing lots
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function draw($n)
    {
        if ($n < 1) {
            throw new \InvalidArgumentException("Invalid count of lots");
        }
        if ($this->is_close()) {
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

        return $prizes;
    }
}
