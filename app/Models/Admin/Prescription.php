<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "branch_id",
        "doctor_id",
        "medicine",
        "test",
        "issue_date"
    ];
}
