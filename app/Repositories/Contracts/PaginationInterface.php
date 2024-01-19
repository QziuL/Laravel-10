<?php 

namespace App\Repositories\Contracts;

interface PaginationInterface 
{
    public function items(): array;
    public function total(): int;
    public function onFirstPage(): bool;
    public function onLastPage(): bool;
    public function currentPage(): int;
    public function getNumberNextPage(): int;
    public function getNumberPreviousPage(): int;
}