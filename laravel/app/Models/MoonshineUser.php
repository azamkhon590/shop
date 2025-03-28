<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoonshineUser extends Model
{
    use HasFactory;

    protected $fillable = [
        "full_name",
        "job_title",
        "work_start",
        "status",
        "work_days",
        "shop_id",
    ];

    protected $casts = [
        "work_days" => "string",
        "work_start" => "datetime",
    ];

    public function shop(){
        return $this->belongsTo(Shop::class);
    }
}
