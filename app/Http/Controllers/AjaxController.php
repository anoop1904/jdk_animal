<?php

namespace App\Http\Controllers;

use App\Models\Inventory\InventoryManagement;
use Illuminate\Http\Request;
use App\Models\Product\Category;

class AjaxController extends Controller
{
    public function change_category_status(Request $request){
          $id = $request->id;  
          $status = $request->status;
          $category = Category::find($id);      
          if($status == 0){
            $category->IsActive = 1;
          }   
          if($status == 1){
            $category->IsActive = 0;
          }   

          $category->update();
          session()->flash('success', 'Status has been updated !!');
    }

    public function change_inventory_status(Request $request){

      $id = $request->id;  
      $status = $request->status;
      $inventory = InventoryManagement::find($id);         
      if($status == 0){
        $inventory->IsActive = 1;
      }   
      if($status == 1){
        $inventory->IsActive = 0;
      }   

      $inventory->update();
      session()->flash('success', 'Status has been updated !!');
}





}
