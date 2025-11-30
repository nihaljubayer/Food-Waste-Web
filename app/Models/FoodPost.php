<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FoodPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'category',
        'quantity',
        'unit',
        'cooked_at',
        'expiry_time',
        'pickup_time_from',
        'pickup_time_to',
        'pickup_address',
        'description',
        'image_path',
        'ai_summary',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
