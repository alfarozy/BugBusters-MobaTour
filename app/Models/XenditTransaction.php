<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XenditTransaction extends Model
{
    use HasFactory;
    protected $fillable = ['xendit_transaction_id', 'external_id', 'member_id', 'payment_method', 'payment_channel', 'payment_destination', 'status', 'type', 'invoice_url', 'qr_string', 'expiry_date', 'amount', 'paid_amount', 'bank', 'ewallet_type', 'paid_at', 'payer_email', 'phone', 'description', 'event', 'adjusted_received_amount', 'fees_paid_amount', 'failure_code'];
}
