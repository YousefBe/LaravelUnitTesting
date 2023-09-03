<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function store()
    {
        Book::create($this->validateRequest());
    }

    public function update(Book $book)
    {
        $book->update($this->validateRequest());
    }

    private function validateRequest()
    {
        return request()->validate([
            'title' => 'required',
            'author' => 'required',
        ]);
    }
}
