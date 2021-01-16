<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\core\LogModel;
use Illuminate\Support\Facades\View;


class BuktiTunggakModel extends Model
{

    protected $table = 'bukti_pembayaran_tunggak';
    protected $primaryKey = 'id_bukti_pembayaran';
    protected $guarded = [];
    public $timestamps = false;
    protected $fillable = [
        'id_bukti_pembayaran','user_id', 'semester','bukti_bayar', 'total_bayar','tanggal','keterangan'
    ];
    

    
}
?>
