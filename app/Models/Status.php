<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{
    use HasFactory , SoftDeletes;
    protected $guarded = [];
    public function employee()
    {
        return $this->belongsTo(User::class, 'employeeId', 'id');
    }
    public function customer()
    {
        return $this->belongsTo(User::class, 'customerId');
    }
}
