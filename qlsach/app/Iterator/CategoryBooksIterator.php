<?php
namespace App\Iterator;
use FilterIterator;
use Iterator;

class CategoryBooksIterator extends FilterIterator {
    private $category;
    public function __construct(Iterator $iterator, $category){
        parent::__construct($iterator);
        $this->category = $category;
    }

    public function accept(){
        $book = $this->getInnerIterator()->current();
        return $book->category_id === $this->category;
    }
}