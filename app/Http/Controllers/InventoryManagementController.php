<?php

namespace App\Http\Controllers;

use App\Models\Inventory\InventoryManagement;
use Illuminate\Http\Request;

class InventoryManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventories = InventoryManagement::all();
        return view('admin.inventory.index', compact('inventories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inventory\InventoryManagement  $inventoryManagement
     * @return \Illuminate\Http\Response
     */
    public function show(InventoryManagement $inventoryManagement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventory\InventoryManagement  $inventoryManagement
     * @return \Illuminate\Http\Response
     */
    public function edit(InventoryManagement $inventoryManagement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inventory\InventoryManagement  $inventoryManagement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InventoryManagement $inventoryManagement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventory\InventoryManagement  $inventoryManagement
     * @return \Illuminate\Http\Response
     */
    public function destroy(InventoryManagement $inventoryManagement)
    {
        //
    }
}
