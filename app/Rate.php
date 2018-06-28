<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User ;
class Rate extends Model
{

    protected $fillable = [
        'gbp_rate', 'dzd_rate', 'date' ,  'user_id'
    ];
    //

    public function user(){
        return User::where('id',$this->user_id)->first() ;
    }
}
