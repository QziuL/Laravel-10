<?php 

namespace App\Services;
use App\DTO\Replies\CreateReplyDTO;
use App\Events\SupportRepliedEvent;
use App\Models\ReplySupport;
use App\Repositories\Contracts\ReplyRepositoryInterface;
use Illuminate\Support\Facades\Gate;
use stdClass;

class ReplySupportService 
{
    public function __construct(
        protected ReplyRepositoryInterface $repository
    ) {}

    public function getAllBySupportID(string $id): array
    {
        return $this->repository->getAllBySupportID($id);
    }

    public function createNew(CreateReplyDTO $dto): stdClass
    {
        $reply = $this->repository->createNew($dto); 

        SupportRepliedEvent::dispatch($reply);

        return $reply;
    }   

    public function delete(string $id): bool
    {
        return $this->repository->delete($id);
    }   
}