<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class TransactionDetail extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'transactions_id','username','region','is_weapon','date_time'
    ];

    protected $hidden = [

    ];
  

    public function transaction(){
        return $this->belongsTo(Transaction::class, 'transactions_id','id');
    } 
    
   
    
}