<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\core\LogModel;
use Illuminate\Support\Facades\View;


class GenerationModel extends Model
{

    protected $table = 'generation';
    protected $primaryKey = 'generation_id';
    protected $guarded = [];
    public $timestamps = false;
    protected $fillable = [
        'generation','status', 
    ];
}
?>
