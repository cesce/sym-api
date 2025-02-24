<?php
// src/Service/MockLibraryService.php

namespace App\Service\Mock;

class MockLibraryService
{
    public function getBooks(): array
    {
        return [
            [
                "id" => 1,
                "title" => "The Great Gatsby",
                "author" => "F. Scott Fitzgerald",
                "year" => 1925,
                "genre" => "Novel",
                "publisher" => "Charles Scribner's Sons",
                "isbn" => "9780743273565",
                "image" => "https://images-na.ssl-images-amazon.com/images/I/51ZJ2q4%2B1NL._SX331_BO1,204,203,200_.jpg",
                "description" => "The Great Gatsby is a 1925 novel by American writer F. Scott Fitzgerald.",
                "created_at" => "2021-10-01T00:00:00.000000Z",
                "updated_at" => "2021-10-01T00:00:00.000000Z"
            ],
            [
                "id" => 2,
                "title" => "To Kill a Mockingbird",
                "author" => "Harper Lee",
                "year" => 1960,
                "genre" => "Novel",
                "publisher" => "J. B. Lippincott & Co.",
                "isbn" => "9780061120084",
                "image" => "https://images-na.ssl-images-amazon.com/images/I/51ZJ2q4%2B1NL._SX331_BO1,204,203,200_.jpg",
                "description" => "To Kill a Mockingbird is a novel by Harper Lee published in 1960.",
                "created_at" => "2021-10-01T00:00:00.000000Z",
                "updated_at" => "2021-10-01T00:00:00.000000Z"
            ]
        ];
    }
}
