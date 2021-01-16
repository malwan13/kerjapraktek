<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\core\LogModel;
use Illuminate\Support\Facades\View;


class UserModel extends Model
{

    protected $table = 'user';
    protected $primaryKey = 'nim';
    protected $guarded = [];
    public $timestamps = false;
    protected $fillable = [
        'nim','name', 'email','no_handphone', 'address','program','generation','password', 
    ];
}
?>
