<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory; 
    // public function bank()
    // {
    //     return $this->hasOne(BankInfo::class, 'bank_info_id', 'id');
    // }
    public function bank()
    {
        return $this->belongsTo(BankInfo::class,'bank_info_id');
    }
}
