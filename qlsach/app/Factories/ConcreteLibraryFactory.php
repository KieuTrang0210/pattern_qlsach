<?php
namespace App\Factories;

use App\Models\Book;
use App\Models\Reader;
use App\Models\Category;

class ConcreteLibraryFactory implements LibraryFactory {
    public function create($type, array $data) {
        switch ($type) {
            case 'book':
                return new Book($data);
            case 'reader':
                return new Book($data);
            case 'category':
                return new Book($data);
            default:
                throw new \InvalidArgumentException('Invalid object type');
        }
    }
}