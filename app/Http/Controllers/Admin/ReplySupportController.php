<?php

namespace App\Http\Controllers\Admin;

use App\DTO\Replies\CreateReplyDTO;
use App\Http\Controllers\Controller;
use App\Services\ReplySupportService;
use App\Services\SupportService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ReplySupportController extends Controller
{
    public function __construct ( 
        protected SupportService $supportService,
        protected ReplySupportService $replyService 
    ) {}

    public function index(string $id): View
    {
        if(!$support = $this->supportService->findOne($id))
        {
            return redirect()->route('supports.index');
        }
        
        $replies = $this->replyService->getAllBySupportID($id);
        
        return view('admin.supports.replies.replies', compact('support', 'replies'));
    }

    public function store(Request $request)
    {
        $this->replyService->createNew(CreateReplyDTO::makeFromRequest($request));

        return redirect()->route('replies.index', $request->support_id)->with('message', 'Resposta enviada!');
    }
}
