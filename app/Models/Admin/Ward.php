<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;

    protected $fillable = [
        'branch_id',
        'ward_type',
        'ward_number',
        'name',
        
    ];

    public function branch(){
        return $this->belongsTo(Branch::class);
    }

    public function beds(){
        return $this->hasMany(Bed::class);
    }

}
