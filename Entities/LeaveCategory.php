<?php

namespace Luanardev\Modules\LeaveManagement\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LeaveCategory extends Model
{
    use HasFactory;

    protected $fillable = [];

    protected $table = 'hrm_leave_category';
    
    protected static function newFactory()
    {
        return \Luanardev\Modules\LeaveManagement\Database\factories\LeaveCategoryFactory::new();
    }
}
