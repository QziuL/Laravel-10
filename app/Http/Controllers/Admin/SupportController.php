<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreUpdateSupport;
use App\Http\Controllers\Controller;
use App\Models\Support;

class SupportController extends Controller
{
    private $support;

    public function __construct()
    {
        $this->support = new Support();
    }

    public function index()
    {
        $supports = $this->support->all();

        return view('admin.supports.index', compact('supports'));
    }

    public function show(string $id)
    {
        if(!$support = $this->support->find($id))
        {
            return redirect()->route('supports.index');
        }
        
        return view('admin.supports.show', compact('support'));
    }

    public function create()
    {
        return view('admin.supports.create');
    }

    public function store(StoreUpdateSupport $request)
    {
        $data = $request->validated();
        $data['status'] = 'a';

        $this->support = $this->support->create($data);
        
        return redirect()->route('supports.index');
    }

    public function edit(string $id)
    {
        if(!$support = $this->support->find($id))
        {
            return redirect()->back();
        }

        return view('admin.supports.edit', compact('support'));
    }

    public function update(string $id, StoreUpdateSupport $request)
    {   
        if(!$this->support = $this->support->find($id))
        {
            return redirect()->back();
        }

        $this->support = $this->support->update($request->validated());
        //$support = $support->update($this->request->only(['subject', 'body']));

        return redirect()->route('supports.index');
    }

    public function destroy(string $id)
    {
        if(!$this->support = $this->support->find($id))
        {
            return redirect()->back();
        }
        $this->support->delete();

        return redirect()->route('supports.index');
    }
}
