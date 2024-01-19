<?php 

namespace App\Repositories\Contracts;
use App\DTO\Replies\CreateReplyDTO;
use stdClass;

interface ReplyRepositoryInterface
{
    public function getAllBySupportID(string $supportID): array;
    public function createNew(CreateReplyDTO $dto): stdClass;
}