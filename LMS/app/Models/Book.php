<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'image', 'body', 'category', 'author'];


    public function category() {
        return $this->belongsTo('App\Models\Category');
    }

    public function author() {
        return $this->belongsTo('App\Models\Author');
    }

    public function issuedBooks() {
        return $this->hasMany('App\Models\IssueBook');
    }

}
