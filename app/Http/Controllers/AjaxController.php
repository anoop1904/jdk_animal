<?php

namespace App\Http\Controllers;

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

          session()->flash('success', 'Status has been updated !!');
          $category->update();
    }
}
