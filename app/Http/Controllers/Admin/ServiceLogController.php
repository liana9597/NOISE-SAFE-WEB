<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceLog;

class ServiceLogController extends Controller
{
    public function index()
    {
        $logs = ServiceLog::all();
        return view('admin.service_logs.index', compact('logs'));
    }

    public function create()
    {
        return view('admin.service_logs.create');
    }

    public function store(Request $request)
    {
        ServiceLog::create($request->all());
        return redirect()->route('service_logs.index');
    }

    public function show($id)
    {
        $log = ServiceLog::findOrFail($id);
        return view('admin.service_logs.show', compact('log'));
    }

    public function edit($id)
    {
        $log = ServiceLog::findOrFail($id);
        return view('admin.service_logs.edit', compact('log'));
    }

    public function update(Request $request, $id)
    {
        $log = ServiceLog::findOrFail($id);
        $log->update($request->all());
        return redirect()->route('service_logs.index');
    }

    public function destroy($id)
    {
        ServiceLog::destroy($id);
        return redirect()->route('service_logs.index');
    }
}
