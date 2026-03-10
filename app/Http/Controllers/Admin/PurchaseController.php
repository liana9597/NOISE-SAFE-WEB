<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Purchase;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchases = Purchase::all();
        return view('admin.purchases.index', compact('purchases'));
    }

    public function create()
    {
        return view('admin.purchases.create');
    }

    public function store(Request $request)
    {
        Purchase::create($request->all());
        return redirect()->route('purchases.index');
    }

    public function show($id)
    {
        $purchase = Purchase::findOrFail($id);
        return view('admin.purchases.show', compact('purchase'));
    }

    public function edit($id)
    {
        $purchase = Purchase::findOrFail($id);
        return view('admin.purchases.edit', compact('purchase'));
    }

    public function update(Request $request, $id)
    {
        $purchase = Purchase::findOrFail($id);
        $purchase->update($request->all());
        return redirect()->route('purchases.index');
    }

    public function destroy($id)
    {
        Purchase::destroy($id);
        return redirect()->route('purchases.index');
    }
}
