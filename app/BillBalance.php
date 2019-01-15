<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillBalance extends Model
{
    //
    protected $table='topup_bill';
    protected $fillable = [
        'mptsm', 'mptmi', 'mptbi','mptxb','telsm','telmi','telbi','telxb','oosm','oomi','oobi','ooxb','by_office','date','total'
    ];
    public $timestamps ='true';

}
