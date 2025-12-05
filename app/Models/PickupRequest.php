<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PickupRequest extends Model
{
    protected $fillable = [
        'ngo_id',
        'donor_id',
        'food_post_id',
        'food_title',
        'pickup_time',
        'status',
        'note',
    ];

    protected $casts = [
        'pickup_time' => 'datetime',
    ];

    public function ngo()
    {
        return $this->belongsTo(Ngo::class);
    }

    public function donor()
    {
        return $this->belongsTo(User::class, 'donor_id');
    }
}
