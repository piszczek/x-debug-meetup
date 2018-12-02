<?php

namespace App\Service;


use App\Entity\Book;

class BookGenerator
{
    public function generate(): iterable
    {
        $books = [];
        for ($i = 0; $i < rand(1, 50); $i++) {
            $books[] = (new Book())->setTitle("Title {$i}");
        }

        return $books;
    }
}
