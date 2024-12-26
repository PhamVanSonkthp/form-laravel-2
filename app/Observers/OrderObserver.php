<?php

namespace App\Observers;

use App\Models\Helper;
use App\Models\Order;

class OrderObserver
{

    public function creating(Order $order)
    {
        $order->code = "#" . strtoupper(Helper::randomString(9));
    }

    /**
     * Handle the Order "created" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function created(Order $order)
    {
        //
    }

    /**
     * Handle the Order "updated" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function updated(Order $order)
    {
//        if($order->isDirty('order_status_id')){
//            // email has changed
//            $new_order_status_id = $order->order_status_id;
//            $old_order_status_id = $order->getOriginal('order_status_id');
//
//            if ($old_order_status_id == 1 && $new_order_status_id == 2){
//                // send email
//                $email = optional($order->user)->email;
//                if (Formatter::isEmail($email)){
//
//                    JobEmail::create([
//                        'user_id' => $order->user_id,
//                        'title' => "Thông báo đầu tư đã được chấp nhận. Mã " . $order->code,
//                        'content' => View::make('administrator.orders.email.confirm_order',
//                            [
//                                'order' => $order
//                            ]
//                        )->render(),
//                        'time_send' => Carbon::now()->addMinute()->toDateTimeString(),
//                    ]);
//                }
//
//                $user = $order->user;
//
//                if (!empty($user)){
//                    Helper::sendNotificationToTopic($user->id, "Đầu tư", "Gói đầu tư của bạn đã được xác nhận", true, $user->id, null, "order/" . $order->id);
//                }
//
//            }else if ($new_order_status_id == 4 || $new_order_status_id == 5){
//                if (!empty($user)){
//                    Helper::sendNotificationToTopic($user->id, "Gói đầu tư của bạn đã hoàn thành", "Nhấn để xem lợi nhuận", true, $user->id, null, "order/" . $order->id);
//                }
//            }
//
//
//        }
    }

    /**
     * Handle the Order "deleted" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function deleted(Order $order)
    {
        //
    }

    /**
     * Handle the Order "restored" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function restored(Order $order)
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function forceDeleted(Order $order)
    {
        //
    }
}
