<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Book;

class Category extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'name',
    ];
    public function __construct(array $attributes = []){
        parent::__construct($attributes);
    }

    public function books()
    {
        return $this->hasMany(Book::class);
    }

}
