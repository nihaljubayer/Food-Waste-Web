<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodPost extends Model
{
    use HasFactory;

    protected $table = 'food_posts'; // table নাম যদি food_posts হয়

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

    /**
     * গুরুত্বপূর্ণ: date/time ফিল্ডগুলোকে Carbon বানিয়ে দেয়
     */
    protected $casts = [
        'cooked_at'        => 'datetime',
        'expiry_time'      => 'datetime',
        'pickup_time_from' => 'datetime',
        'pickup_time_to'   => 'datetime',
        'created_at'       => 'datetime',
        'updated_at'       => 'datetime',
    ];

    /**
     * চাইলে relation: একেকটা post এক জন user এর
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

