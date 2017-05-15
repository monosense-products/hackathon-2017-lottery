<?php

namespace App\Events;

use App\{
    Lottery, Grade, Sku
};

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class LotteryUpdated implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;

    protected $channel_name = "lotteries";

    public $lottery;

    /**
     * Create a new event instance.
     *
     * @param int $lottery_id
     */
    public function __construct(int $lottery_id)
    {
        $this->lottery = $this->serializeLottery($lottery_id);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new Channel($this->channel_name);
    }

    /**
     * Serialize lottery with nested grades with nested SKUs
     *
     * @param int $lottery_id
     *
     * @return array serialized lottery
     */
    private function serializeLottery(int $lottery_id)
    {
        $lottery = Lottery::find($lottery_id)->toArray();
        $grades  = Grade::all()->toArray();
        $skuss   = Sku::all()
                      ->where('lottery_id', 1)
                      ->groupBy('grade_id');

        foreach ($skuss as $id => $skus) {
            $i = $id - 1;
            $grades[$i]['skus'] = $skus;
        }
        $lottery['grades'] = $grades;

        return $lottery;
    }
}
