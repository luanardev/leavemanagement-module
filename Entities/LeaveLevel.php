<?php

namespace Luanardev\Modules\LeaveManagement\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LeaveLevel extends Model
{
    use HasFactory;

    protected $table = 'hrm_leave_level';

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Luanardev\Modules\LeaveManagement\Database\factories\LeaveLevelFactory::new();
    }
}
