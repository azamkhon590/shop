<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "description",
        "address",
        "phone",
        "work_time",
        "email",
    ];

    protected $casts = [
        "work_time" => "datetime",
    ];


}
