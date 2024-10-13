<?php

namespace App\Models;

use App\Models\Album;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Band extends Model
{

    public function albums()
    {
        return $this->hasMany(Album::class, 'band_id'); // foreign key in albums table
    }
    use HasFactory;

    protected $table = 'table_bands';
}
