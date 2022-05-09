<?php

namespace Luanardev\Modules\LeaveManagement\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LeaveApprover extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Luanardev\Modules\LeaveManagement\Database\factories\LeaveApproverFactory::new();
    }
}
