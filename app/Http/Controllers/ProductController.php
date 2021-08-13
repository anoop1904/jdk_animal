<?php

namespace App\Http\Controllers;

use App\Models\Product\Product;
use App\Models\Product\ProductImage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();                 
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation Data
        $request->validate([
            'en_name' => 'required',
            'tg_name' => 'required',
            'en_product_category' => 'required',
            'tg_product_category' => 'required',
            'en_product_feed' => 'required',
            'tg_product_feed' => 'required',
            'product_amount' => 'required',
        ]);    
            // Create New User
            $product = new Product();
            $product->en_name = $request->en_name;
            $product->tg_name = $request->tg_name;
            $product->en_product_category = $request->en_product_category;
            $product->tg_product_category = $request->tg_product_category;
            $product->en_product_sub_category = $request->en_product_sub_category;
            $product->tg_product_sub_category = $request->tg_product_sub_category;
            $product->en_product_feed = $request->en_product_feed;
            $product->tg_product_feed = $request->tg_product_feed;
            $product->en_product_breed = $request->en_product_breed;
            $product->tg_product_breed = $request->tg_product_breed;
            $product->en_product_about = $request->en_product_about;
            $product->tg_product_about = $request->tg_product_about;
            $product->product_distance = $request->product_distance;
            $product->product_amount = $request->product_amount;            
            $product->pregnancy = $request->pregnancy;
            $product->product_color = $request->product_color;
            $product->product_age = $request->product_age;
            $pro_id = $product->save();
            $image_name = '';
            if($request->file('product_images')){
                foreach($request->file('product_images') as $key=>$image)
                {         
                    $productImage = new ProductImage();                           
                    $originalName = $image->getClientOriginalName();             
                    $myfile =  $productImage->image_name = time().$originalName; 
                    if($key == 0){
                        $image_name = $myfile;
                    }                   
                    $productImage->image_name = $myfile;
                    if($product->product_images()->save($productImage))
                    {
                        $image->storeAs('/product_images', $myfile);  
                    }   
                }
            }
            Product::where('id', $pro_id)->update(['image_name'=>$image_name]);
            session()->flash('success', 'Product has been inserted !!');
            return redirect('admin/products'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);      
        $product_imgs = $product->product_images()->get(); 
        return view('admin.products.edit', compact('product', 'product_imgs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         // Validation Data
         $request->validate([
            'en_name' => 'required',
            'tg_name' => 'required',
            'en_product_category' => 'required',
            'tg_product_category' => 'required',
            'en_product_feed' => 'required',
            'tg_product_feed' => 'required',
            'product_amount' => 'required',
        ]);    
            // Create New User
            $product = Product::find($id);
            $product->en_name = $request->en_name;
            $product->tg_name = $request->tg_name;
            $product->en_product_category = $request->en_product_category;
            $product->tg_product_category = $request->tg_product_category;
            $product->en_product_sub_category = $request->en_product_sub_category;
            $product->tg_product_sub_category = $request->tg_product_sub_category;
            $product->en_product_feed = $request->en_product_feed;
            $product->tg_product_feed = $request->tg_product_feed;
            $product->en_product_breed = $request->en_product_breed;
            $product->tg_product_breed = $request->tg_product_breed;
            $product->en_product_about = $request->en_product_about;
            $product->tg_product_about = $request->tg_product_about;
            $product->product_distance = $request->product_distance;
            $product->product_amount = $request->product_amount;            
            $product->pregnancy = $request->pregnancy;
            $product->product_color = $request->product_color;
            $product->product_age = $request->product_age;
            $pro_id = $product->save();
            $image_name = '';
            if($request->file('product_images')){
                $productImage = new ProductImage(); 
                $product_img = $product->product_images()->get();            
                if($product->product_images()->delete($productImage)){
                    foreach($product_img as $pro_img)
                    {         
                        if(is_file(storage_path('app/product_images/'.$pro_img->image_name)))
                        {         
                            unlink(storage_path('app/product_images/'.$pro_img->image_name));
                        }         
                    } 
                } 

                foreach($request->file('product_images') as $key=>$image)
                {         
                    $productImage = new ProductImage();  
                    $originalName = $image->getClientOriginalName();             
                    $myfile =  $productImage->image_name = time().$originalName; 
                    if($key == 0){
                        $image_name = $myfile;
                    }             
                    $productImage->image_name = $myfile;
                    if($product->product_images()->save($productImage))
                    {
                        $image->storeAs('/product_images', $myfile);  
                    }   
                }
            }
            Product::where('id', $pro_id)->update(['image_name'=>$image_name]);
            session()->flash('success', 'Product has been Updated !!');
            return redirect('admin/products'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {        
        $product = Product::find($id);
        if (!is_null($product)) {  
            $product->delete();
            $productImage = new ProductImage();
            $product_img = $product->product_images()->get();            
            if($product->product_images()->delete($productImage)){
                foreach($product_img as $pro_img)
                {         
                    if(is_file(storage_path('app/product_images/'.$pro_img->image_name)))
                    {         
                        unlink(storage_path('app/product_images/'.$pro_img->image_name));
                    }         
                } 
            }       
        }  
       
        session()->flash('success', 'Product has been deleted !!');
        return back();
    }
}
