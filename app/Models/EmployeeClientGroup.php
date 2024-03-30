<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeClientGroup extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function employee()
    {
        return $this->belongsTo(User::class, 'customerId' , 'id');
    }
    public function customer()
    {
        return $this->hasMany(User::class, 'id' , 'customerId');
    }
}
