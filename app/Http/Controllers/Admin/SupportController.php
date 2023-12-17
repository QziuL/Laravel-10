<?php

namespace App\Http\Controllers\Admin;

use App\Models\Support;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SupportController extends Controller
{
    public function index(Support $support)
    {
        $supports = $support->all();

        return view('admin.supports.index', compact('supports'));
    }

    public function show(string $id, Support $support)
    {
        if(!$support = $support->find($id))
        {
            return redirect()->route('supports.index');
        }
        
        return view('admin.supports.show', compact('support'));
    }

    public function create()
    {
        return view('admin.supports.create');
    }

    public function store(Support $support, Request $request)
    {
        $data = $request->all();
        $data['status'] = 'a';

        $support = $support->create($data);
        
        return redirect()->route('supports.index');
    }

    public function edit(string $id, Support $support)
    {
        if(!$support = $support->find($id))
        {
            return redirect()->back();
        }

        return view('admin.supports.edit', compact('support'));
    }

    public function update(string $id, Request $request, Support $support)
    {   
        if(!$support = $support->find($id))
        {
            return redirect()->back();
        }

        $support = $support->update($request->only(['subject', 'body']));

        return redirect()->route('supports.index');
    }

    public function destroy(string $id, Support $support)
    {
        if(!$support = $support->find($id))
        {
            return redirect()->back();
        }
        $support->delete();

        return redirect()->route('supports.index');
    }
}
