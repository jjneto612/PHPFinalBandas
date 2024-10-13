<?php

namespace App\Models;

use App\Models\Band;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Album extends Model
{

    public function band()
    {
        return $this->belongsTo(Band::class, 'band_id'); // foreign key in albums table
    }
    use HasFactory;

    protected $fillable = [
        'name',          // Add this line
        'cover',         // Add this line
        'date_of_release', // Add this line
        'band_id'       // Ensure this is included
    ];



}
