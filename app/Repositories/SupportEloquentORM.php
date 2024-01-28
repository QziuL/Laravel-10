<?php 

namespace App\Repositories;

use App\DTO\Supports\{ CreateSupportDTO, UpdateSupportDTO };
use App\Enums\SupportStatus;
use App\Repositories\Contracts\{PaginationInterface, SupportRepositoryInterface};
use App\Models\Support;
use Illuminate\Support\Facades\Gate;
use stdClass;

class SupportEloquentORM implements SupportRepositoryInterface
{
    public function __construct(
        protected Support $model
    ) {}

    public function paginate(int $page = 1, int $totalPerPage = 15, string $filter = null): PaginationInterface
    {
        $result = $this->model
                    ->with(['replies' => function ($query) {
                        $query->limit(4);
                        $query->latest();
                    }])
                    ->where(function ($query) use ($filter){
                        if($filter)
                        {
                            $query->where('subject', $filter);
                            $query->orWhere('body', 'like', "%{$filter}%");
                        }
                    })
                    ->paginate($totalPerPage, ['*'], 'page', $page);
        
        return new PaginationPresenter($result);
    }

    public function getAll(string $filter = null): array
    {
        return $this->model
                    ->where(function ($query) use ($filter){
                        if($filter)
                        {
                            $query->where('subject', $filter);
                            $query->orWhere('body', 'like', "%{$filter}%");
                        }
                    })
                    ->get()
                    ->toArray();
    }

    public function findOne(string $id): stdClass|null
    {
        // se achar, converte em array e transforma num objeto generico
        if($support = $this->model->with('user')->find($id))
        {
            return (object) $support->toArray();
        }
        
        return null;
    }

    public function delete(string $id): void
    {
        $support = $this->model->findOrFail($id);

        if(Gate::denies('owner', $support->user->id))
        {
            abort(403, 'Not Authorized');
        }

        $this->model->findOrFail($id)->delete();
    }

    public function new(CreateSupportDTO $dto): stdClass
    {
        $support = $this->model->create( (array) $dto);

        return (object) $support->toArray();
    }
    public function update(UpdateSupportDTO $dto): stdClass|null
    {
        if(!$support = $this->model->findOrFail($dto->id))
        {
            return null;
        }

        if(Gate::denies('owner', $support->user->id))
        {
            abort(403, 'Not Authorized');
        }

        $support->update( (array) $dto);

        return (object) $support->toArray();
    }

    public function updateStatus(string $id, SupportStatus $status): void
    {
        $this->model->where('id', $id)->update(['status' => $status->name]);       
    }
}