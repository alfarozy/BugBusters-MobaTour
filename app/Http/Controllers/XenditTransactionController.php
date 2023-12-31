<?php

namespace App\Http\Controllers;

use App\Mail\MailNotificationSuccessPaymentEmail;
use App\Models\Order;
use App\Models\XenditTransaction;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class XenditTransactionController extends Controller
{
    public function callbacks(Request $request)
    {

        Log::info($request->all());
        $order = Order::where(['invoice' => $request->external_id, 'status' => 'UNPAID'])->first();

        if (!$order) {
            return false;
        }

        try {
            DB::beginTransaction();

            if ($request->status == 'PAID') {

                if ($order) {

                    $order->status = 'PAYMENT_ACCEPTED';
                    $order->payment_date = date('Y-m-d H:i:s', strtotime($request->paid_at));
                    $order->save();

                    $order->userTournament->update(['status' => 'active']);


                    $details['email'] = $order->user->email;
                    $details['name'] = $order->user->name;
                    $details['invoice'] = $order->invoice;

                    Mail::to($order->user->email)->send(new MailNotificationSuccessPaymentEmail($details));
                }
            }

            if ($request->status == "EXPIRED") {
                // update status member transaction
                $order->status = 'EXPIRED';
                $order->userTournament->update(['status' => 'cancel']);

                $order->save();
                return response()->json(['success' => true, 'message' => "Expired",], 200);
            }

            DB::commit();
            return response()->json(['success' => true, 'message' => "Data berhasil di update",], 200);
        } catch (Exception $e) {
            DB::rollback();
            Log::info('===CALLBACK BANK TRANSFERa===');
            Log::error($e);

            return response()->json(['success' => false, 'message' => "Something error",], 500);
        }
    }
}
