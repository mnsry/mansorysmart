<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resource;
use Illuminate\Support\Facades\Auth;

class ResourceController extends Controller
{
    // منابع عمومی
    public function public()
    {
        $resources = Resource::where('is_public', true)->latest()->get();
        return view('public.resources', compact('resources'));
    }

    // منابع مخصوص مشتری
    public function customer()
    {
        $resources = Resource::latest()->get();
        return view('customer.resources', compact('resources'));
    }

    // ====== ADMIN METHODS ======

    public function index()
    {
        $resources = Resource::latest()->get();
        return view('admin.resources.index', compact('resources'));
    }

    public function create()
    {
        return view('admin.resources.create');
    }

    public function store(Request $request)
    {
        Resource::create($request->all());
        return redirect()->route('admin.resources.index')->with('success', 'منبع اضافه شد');
    }

    public function edit(Resource $resource)
    {
        return view('admin.resources.edit', compact('resource'));
    }

    public function update(Request $request, Resource $resource)
    {
        $resource->update($request->all());
        return redirect()->route('admin.resources.index')->with('success', 'منبع ویرایش شد');
    }

    public function destroy(Resource $resource)
    {
        $resource->delete();
        return redirect()->route('admin.resources.index')->with('success', 'منبع حذف شد');
    }
}
