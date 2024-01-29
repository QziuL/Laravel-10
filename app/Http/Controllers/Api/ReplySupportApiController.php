<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReplySupportResource;
use App\Services\ReplySupportService;
use App\Services\SupportService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReplySupportApiController extends Controller
{
    public function __construct ( 
        protected SupportService $supportService,
        protected ReplySupportService $replyService 
    ) {}

    public function getRepliesFromSupport(string $supportID)
    {
        if(!$this->supportService->findOne($supportID))
        {
            return response()->json(['message', 'not_found', Response::HTTP_NOT_FOUND]);
        }
        
        $replies = $this->replyService->getAllBySupportID($supportID);
        
        return ReplySupportResource::collection($replies);
    }
}
