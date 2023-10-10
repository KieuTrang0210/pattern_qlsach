<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Loan;

class Reader extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name',
        'email',
        'phone'
    ];

    public function __construct(array $attributes = []){
        parent::__construct($attributes);
    }
    
    public function loans()
    {
        return $this->hasMany(Loan::class);
    }

}
