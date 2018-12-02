<?php

namespace App\Controller;

use App\Entity\Book;
use App\Service\BookGenerator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

class DefaultController
{
    public function index()
    {
        dump($_SERVER);
        dump($_ENV);

        return new Response(
            '<html><body>VarDump Component test</body></html>'
        );
    }

    public function books(EntityManagerInterface $entityManager)
    {
        $books = $entityManager->getRepository(Book::class)->findAll();


        return new Response(
            '<html><body>'.print_r($books,true).'</body></html>'
        );
    }

    public function booksGenerator(EntityManagerInterface $entityManager)
    {
        /** @var Book[] $books */
        $books = (new BookGenerator())->generate();

        $this->doSmth($books);


        foreach ($books as $book) {
            $entityManager->persist($book);
        }


        $entityManager->flush();

        return new Response(
            '<html><body>'.print_r($books,true).'</body></html>'
        );
    }

    private function doSmth(iterable &$books): void
    {
//        $books[] = new Book();
    }
}
