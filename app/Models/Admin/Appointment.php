<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "department_id",
        "branch_id",
        "doctor_id",
        "appointment_date",
        "phone",
        "status"
    ];
    protected $attributes = [
        'status' => 'pending',
    ];
}
