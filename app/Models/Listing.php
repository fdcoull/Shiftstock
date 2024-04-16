<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'packaging', 'weight', 'weight_unit', 'quantity_inhand', 'price', 'currency', 'age', 'expiry', 'user_id'];

    public static function find($id) {
        $listings = self::all();

        foreach($listings as $listing) {
            if($listing['id'] == $id) {
                return $listing;
            }
        }
    }

    public function images()
    {
        return $this->hasMany(ListingImage::class);
    }
}
