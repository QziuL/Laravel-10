<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\SupportService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ReplySupportController extends Controller
{
    public function __construct ( protected SupportService $service ) {}

    public function index(string $id): View
    {
        if(!$support = $this->service->findOne($id))
        {
            return redirect()->route('supports.index');
        }
        
        return view('admin.supports.replies.replies', compact('support'));
    }
}
