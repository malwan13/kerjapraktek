<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\core\LogModel;
use Illuminate\Support\Facades\View;


class AdminModel extends Model
{

    protected $table = 'admin';
    protected $primaryKey = 'id';
    protected $guarded = [];
    public $timestamps = false;
    protected $fillable = [
        'id','name', 'email','password' 
    ];
    

    
}
?>
