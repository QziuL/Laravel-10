<?php 

namespace App\Repositories;
use App\DTO\{ CreateSupportDTO, UpdateSupportDTO };
use App\Models\Support;
use stdClass;

class SupportEloquentORM implements SupportRepositoryInterface
{
    public function __construct(
        protected Support $model
    ) {}

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
                    ->all()
                    ->toArray();
    }

    public function findOne(string $id): stdClass|null
    {
        // se achar, converte em array e transforma num objeto generico
        if($support = $this->model->find($id)->toArray())
        {
            return (object) $support;
        }
        
        return null;
    }

    public function delete(string $id): void
    {
        $this->model->findOrFail($id)->delete();
    }

    public function new(CreateSupportDTO $dto): stdClass
    {
        $support = $this->model->create( (array) $dto);

        return (object) $support->toArray();
    }
    public function update(UpdateSupportDTO $dto): stdClass|null
    {
        if(!$support = $this->model->find($dto->id))
        {
            return null;
        }

        $support->update( (array) $dto);

        return (object) $support->toArray();
    }
}