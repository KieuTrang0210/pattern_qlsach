<?php
namespace App\Factories;

use App\Models\Book;
use App\Models\Reader;
use App\Models\Category;

class ConcreteLibraryFactory implements LibraryFactory {
    public function create($type, array $data) {
        switch ($type) {
            case 'book':
                return Book::create($data);
            case 'reader':
                return Reader::create($data);
            case 'category':
                return Category::create($data);
            default:
                throw new \InvalidArgumentException('Invalid object type');
        }
    }
}