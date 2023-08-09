<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'branch_id',
        'department_id',
        'name',
        'position',
        'address',
        'phone',
        'images',
    ];

    public function branch(){
        return $this->belongsTo(Branch::class);
    }
    public function department(){
        return $this->belongsTo(Department::class);
    }

    
}
