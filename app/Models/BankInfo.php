<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankInfo extends Model
{
    use HasFactory;
    protected $table = 'bank_info';
    
    public function employee()
    {
        return $this->hasMany(Employee::class);
    }
}
