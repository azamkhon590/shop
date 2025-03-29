<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \MoonShine\Fields\RelationShips\BelongsTo;
use MoonShine\Models\MoonshineUser;

class MoonshineUserWork extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        "date_in",
        "date_out",
        "moonshine_user_id",
    ];

    protected $casts = [
        "date_in" => "datetime",
        "date_out" => "datetime",
    ];

    public function moonshineUser() {
        return $this->belongsTo(MoonshineUser::class);
    }
}
