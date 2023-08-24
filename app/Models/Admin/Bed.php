<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bed extends Model
{
    use HasFactory;

    protected $fillable = [
        "branch_id",
        "ward_id",
        "bed_number",
        "bed_status",
    ];

    public function branch(){
        return $this->belongsTo(Branch::class);
    }
    public function ward(){
        return $this->belongsTo(Ward::class);
    }
}
