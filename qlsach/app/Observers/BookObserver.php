<?php

namespace App\Observers;

use App\Models\Book;
use Illuminate\Support\Facades\Log;

class BookObserver
{
    /**
     * Handle the Book "created" event.
     */
    public function created(Book $book): void
    {
        Log::info('Cuốn sách mới được tạo:', $book->toArray());
    }

    /**
     * Handle the Book "updated" event.
     */
    public function updated(Book $book): void
    {
        Log::info('Cuốn sách đã được cập nhật:', $book->toArray());
    }

    /**
     * Handle the Book "deleted" event.
     */
    public function deleted(Book $book): void
    {
        Log::info('Cuốn sách đã bị xóa:', $book->toArray());
    }

    /**
     * Handle the Book "restored" event.
     */
    public function restored(Book $book): void
    {
        //
    }

    /**
     * Handle the Book "force deleted" event.
     */
    public function forceDeleted(Book $book): void
    {
        //
    }
}
