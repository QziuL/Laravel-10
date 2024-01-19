<?php 

namespace App\Services;
use App\DTO\Replies\CreateReplyDTO;
use stdClass;

class ReplySupportService 
{
    public function getAllBySupportID(string $supportID): array
    {
        return [];
    }

    public function createNew(CreateReplyDTO $dto): stdClass
    {
        return throw new \Exception('nao implementado');
    }   
}