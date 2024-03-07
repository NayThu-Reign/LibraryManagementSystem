<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IssueBook extends Model
{
    use HasFactory;

    public function category() {
        return $this->belongsTo('App\Models\Category');
    }

    public function author() {
        return $this->belongsTo('App\Models\Author');
    }

    public function user() {
        return $this->belongsTo('App\Model\User');
    }
}
