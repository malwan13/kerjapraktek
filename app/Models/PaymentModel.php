<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\core\LogModel;
use Illuminate\Support\Facades\View;


class PaymentModel extends Model
{

    protected $table = 'pembayaran';
    protected $primaryKey = 'payment_id';
    protected $guarded = [];
    public $timestamps = false;
    protected $fillable = [
        'payment','nominal', 'generation_id','status',
    ];
}
?>
