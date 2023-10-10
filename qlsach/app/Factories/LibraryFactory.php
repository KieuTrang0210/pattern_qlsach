<?php
namespace App\Factories;

interface LibraryFactory {
    public function create($type, array $data);
}