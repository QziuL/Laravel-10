<?php 

namespace App\Repositories;
use Illuminate\Pagination\LengthAwarePaginator;
use stdClass;

class PaginationPresenter implements PaginationInterface
{
    private array $items;

    public function __construct( protected LengthAwarePaginator $paginator )
    { 
        $this->items = $this->paginator->items(); 
    }

    public function items(): array
    {
        return $this->items;
    }
    public function total(): int
    {
        return $this->paginator->total() ?? 0;
    }
    public function onFirstPage(): bool
    {
        return $this->paginator->onFirstPage();
    }
    public function onLastPage(): bool
    {
        return $this->paginator->onLastPage();
    }
    public function currentPage(): int
    {
        return $this->paginator->currentPage() ?? 1;
    }
    public function getNumberNextPage(): int
    {
        return $this->paginator->currentPage() + 1;
    }
    public function getNumberPreviousPage(): int
    {
        return $this->paginator->currentPage() - 1;
    }

    private function transformItemsArrayForObjects(array $items): array
    {
        $response = [];

        foreach($items as $item)
        {
            $stdClassObject = new stdClass;
            foreach($item->toArray() as $key => $value)
            {
                $stdClassObject->{$key} = $value;
            }
            
            $response = $stdClassObject;
        }

        return $response;
    }
}