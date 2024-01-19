<?php 

namespace App\Adapters;
use App\Http\Resources\DefaultResource;
use App\Repositories\Contracts\PaginationInterface;

class ApiAdapter
{
    public static function toJson(
        PaginationInterface $data,
    )
    {
        return DefaultResource::collection($data->items())
                                ->additional([
                                    'meta' => [
                                        'total' => $data->total(),
                                        'on_first_page' => $data->onFirstPage(),
                                        'on_last_page' => $data->onLastPage(),
                                        'current_page' => $data->currentPage(),
                                        'next_page' => $data->getNumberNextPage(),
                                        'previous_page' => $data->getNumberPreviousPage(),
                                    ]
                                ]);
    }
}