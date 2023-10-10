<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category;
use App\Models\Loan;

class Book extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'title',
        'author',
        'published_date',
        'quantity',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'id', 'category_id');
    }

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }


}
