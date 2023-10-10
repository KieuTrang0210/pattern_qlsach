<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Book;
use App\Models\Reader;

class Loan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'reader_id',
        'book_id',
        'borrowed_at',
        'due_at',
        'returned_at'
    ];

    public function __construct(array $attributes = []){
        parent::__construct($attributes);
    }
    
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function reader()
    {
        return $this->belongsTo(Reader::class);
    }


}
