<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $_fillable = ['title', 'body'];

    public function author() {
        return $this->belongsTO(Author::class);
    }

}
