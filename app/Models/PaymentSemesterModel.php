<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\core\LogModel;
use Illuminate\Support\Facades\View;


class PaymentSemesterModel extends Model
{

    protected $table = 'pembayaran_semester';
    protected $primaryKey = 'pembayaran_semester_id';
    protected $guarded = [];
    public $timestamps = false;
    protected $fillable = [
        'payment_id','generation_id', 'semester',
    ];
}
?>
