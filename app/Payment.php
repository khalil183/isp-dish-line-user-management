<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable=[
        'invoice',
        'client_id',
        'year_id',
        'month_id',
        'payable_amount',
        'due_amount',
        'date'
    ];

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function year()
    {
        return $this->belongsTo(Year::class);
    }
    public function month()
    {
        return $this->belongsTo(Month::class);
    }

}
