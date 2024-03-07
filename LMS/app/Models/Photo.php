<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    public function author() {
        return $this->belongsTo("App\Models\Author");
    }

    public function book() {
        return $this->belongsTo("App\Models\Book");
    }
}
