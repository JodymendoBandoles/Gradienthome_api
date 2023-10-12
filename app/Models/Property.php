<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_url',
        'property_name',
        'users_id',
        'country',
        'province',
        'city',
        'barangay',
        'street_name',
        'block_number',
        'lot_number',
        'price_per_month',
        'total_contract_price',
        'lot_area',
        'listing_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);

    }

}
