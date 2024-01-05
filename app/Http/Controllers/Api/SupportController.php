<?php

namespace App\Http\Controllers\Api;

use App\Adapters\ApiAdapter;
use App\DTO\Supports\CreateSupportDTO;
use App\DTO\Supports\UpdateSupportDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
use App\Http\Resources\SupportResource;
use App\Models\Support;
use App\Services\SupportService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SupportController extends Controller
{
    public function __construct(
        protected SupportService $service,
    ){}

    public function index(Request $request)
    {
        $supports = $this->service->paginate(
            page: $request->get('page', 1),
            totalPerPage: $request->get('per_page', 2),
            filter: $request->filter,
        );

        return ApiAdapter::toJson($supports);
    }

    public function store(StoreUpdateSupport $request)
    {
        $support = $this->service->new(CreateSupportDTO::makeFromRequest($request));

        // PADRONIZAR RESPONSE
        return new SupportResource($support);
    }

    public function show(string $id)
    {
        if(!$support = $this->service->findOne($id)) 
        { 
            return response()->json(['error' => 'Support Not Found'], 404);    
            // NO LUGAR DO 404 PODE-SE USAR => 'Response::HTTP_NOT_FOUND'
        }

        return new SupportResource($support);
    }

    public function update(StoreUpdateSupport $request, string $id)
    {
        $support = $this->service->update(UpdateSupportDTO::makeFromRequest($request, $id));

        if(!$support)
        {
            return response()->json(['error' => 'Support Not Found'], 404);
        }

        return new SupportResource($support);
    }

    public function destroy(string $id)
    {
        if(!$this->service->findOne($id)) 
        { 
            return response()->json(['error' => 'Support Not Found'], 404);
        }

        $this->service->delete($id);

        return response()->json([], 204); // NO_CONTENT
    }
}
