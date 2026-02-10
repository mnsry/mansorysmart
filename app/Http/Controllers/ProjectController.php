<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Customer;
use App\Models\Partner;
use App\Models\Commission;

class ProjectController extends Controller
{
    // نمایش عمومی نمونه پروژه‌ها
    public function publicIndex()
    {
        $projects = Project::where('status', 'completed')->latest()->get();
        return view('public.projects', compact('projects'));
    }

    // ====== ADMIN METHODS ======

    public function index()
    {
        $projects = Project::latest()->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $customers = Customer::all();
        $partners = Partner::all();
        return view('admin.projects.create', compact('customers', 'partners'));
    }

    public function store(Request $request)
    {
        $project = Project::create($request->all());

        // اگر پروژه توسط شریک معرفی شده باشد → پورسانت ثبت شود
        if ($request->partner_id) {
            Commission::create([
                'partner_id' => $request->partner_id,
                'project_id' => $project->id,
                'amount' => $this->calculateCommission($project->price),
                'status' => 'pending',
            ]);
        }

        return redirect()->route('admin.projects.index')->with('success', 'پروژه ثبت شد');
    }

    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $customers = Customer::all();
        $partners = Partner::all();
        return view('admin.projects.edit', compact('project', 'customers', 'partners'));
    }

    public function update(Request $request, Project $project)
    {
        $project->update($request->all());
        return redirect()->route('admin.projects.index')->with('success', 'پروژه ویرایش شد');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'پروژه حذف شد');
    }

    protected function calculateCommission($price)
    {
        // فعلاً ثابت، بعداً می‌تونیم پلکانی کنیم
        return 10000000; // 10 میلیون تومان
    }
}
