<?php

namespace Tests\Feature;

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookReservationTest extends TestCase
{

    use RefreshDatabase;
    /** @test */
    public function a_book_can_be_added_to_the_library()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('/books', [
            'title' => 'joe cool book no 1',
            'author' => 'joe'
        ]);
        $response->assertOk();
        $this->assertCount(1, Book::all());
    }

    /** @test */
    public function a_title_is_required()
    {
        $response = $this->post('/books', [
            'title' => '',
            'author' => 'joe'
        ]);
        $response->assertSessionHasErrors('title');
    }

    /** @test */
    public function a_author_is_required()
    {
        $response = $this->post('/books', [
            'title' => 'book title',
            'author' => ''
        ]);
        $response->assertSessionHasErrors('author');
    }


    /** @test */
    public function a_book_can_be_updated()
    {
        $this->withoutExceptionHandling();

        $this->post('/books', [
            'title' => 'book title',
            'author' => 'Joe'
        ]);
        $book = Book::first();
        $response = $this->patch('/books/'.$book->id,[
            'title' => 'New Title',
            'author' => 'Youssef'
        ]);

        $this->assertEquals('New Title',Book::first()->title);
        $this->assertEquals('Youssef',Book::first()->author);
    }
}
