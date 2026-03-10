<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Device;

class DeviceController extends Controller
{
    public function index()
    {
        $devices = Device::all();
        return view('admin.devices.index', compact('devices'));
    }

    public function create()
    {
        return view('admin.devices.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'serial_number' => 'required|unique:devices,serial_number',
        'owner_name'    => 'required',
        'user_id'       => 'required|integer',
        'status'        => 'required|in:active,inactive',
    ]);

    Device::create($request->all());

    return redirect()->route('devices.index')
        ->with('success', 'Perangkat berhasil ditambahkan!');
}

    public function show($id)
    {
        $device = Device::findOrFail($id);
        return view('admin.devices.show', compact('device'));
    }

    public function edit($id)
    {
        $device = Device::findOrFail($id);
        return view('admin.devices.edit', compact('device'));
    }

    public function update(Request $request, $id)
    {
        $device = Device::findOrFail($id);
        $device->update($request->all());
        return redirect()->route('devices.index');
    }

    public function destroy($id)
    {
        Device::destroy($id);
        return redirect()->route('devices.index');
    }
}
