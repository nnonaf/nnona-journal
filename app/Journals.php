<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Journals extends Model
{
    //

    protected $table = 'transactions';
    protected $fillable = [

       'user_id',
       'customer_id',
       'particular_id',
       'journalType_id',
       'amount'
       ];


}
