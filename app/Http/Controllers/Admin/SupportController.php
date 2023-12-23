<?php

namespace App\Http\Controllers\Admin;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use App\Http\Requests\StoreUpdateSupport;
use App\Http\Controllers\Controller;
use App\Models\Support;
use App\Services\SupportService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SupportController extends Controller
{

    public function __construct
    (
        protected Support $support, 
        protected SupportService $service
    ) 
    {}

    public function index(Request $request): View
    {
        $supports = $this->service->getAll($request->filter);

        dd($supports);

        return view('admin.supports.index', compact('supports'));
    }

    public function show(string $id): View
    {
        if(!$support = $this->service->findOne($id))
        {
            return redirect()->route('supports.index');
        }
        
        return view('admin.supports.show', compact('support'));
    }

    public function create(): View
    {
        return view('admin.supports.create');
    }

    public function store(StoreUpdateSupport $request): RedirectResponse
    {
        // chama metodo do service layer, passando o metodo do DTO como parametro
        $this->service->new(
            CreateSupportDTO::makeFromRequest($request)
        );
        
        return redirect()->route('supports.index');
    }

    public function edit(string $id): View
    {
        if(!$support = $this->service->findOne($id))
        {
            return redirect()->back();
        }

        return view('admin.supports.edit', compact('support'));
    }

    public function update(string $id, StoreUpdateSupport $request): RedirectResponse
    {   
        //$support = $support->update($this->request->only(['subject', 'body']));

        $support = $this->service->update(
            UpdateSupportDTO::makeFromRequest($request)
        );

        if(!$support)
        {
            return redirect()->back();
        }

        return redirect()->route('supports.index');
    }

    public function destroy(string $id): RedirectResponse
    {
        $this->service->delete($id);

        return redirect()->route('supports.index');
    }
}
