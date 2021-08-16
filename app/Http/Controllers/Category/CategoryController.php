<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\Category;
use App\Models\Product\CategoryImage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $start='';
        $category = Category::with(['category_name'])->orderBy('id','DESC');
        if(isset($_GET['name']))
        {
          if($_GET['name']!='')
          {
           $category->where('name','LIKE','%'.$_GET['name'].'%');
          }
        }
        if(isset($_GET['status'])) 
        {
          if($_GET['status']!='all')
          {
             $category->where('IsActive',$_GET['status']);
          }
        } 
        $categories = Category::all();
       return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $pagetitle='Create Category'; 
        $categories = Category::all();
        // dd($categories);
        $categories_array = [];
        foreach ($categories as $key => $value) {
          $category = $value;
          $parent_category = $value;
          $tempid = [];
          $temp = [];
          do
          {
            $flag = false;
            if($category->parent_id){
              $parent_category = Category::where(['id'=>$category->parent_id])->first();
              $flag = true;
            }
            $tempid[] = $category->id;
            $temp[] = $category->name;
            $category = $parent_category;
            // execute the statements;
          }while ($flag);
          // echo implode('/', array_reverse($temp));
          $categories_array[$key]['id'] = $category->id;
          $categories_array[$key]['data'] = $temp;     
          $categories_array[$key]['pid'] =  $tempid;     
        }

        // dd($categories); 
        return view('admin.categories.create', compact('categories_array','categories','pagetitle')); 
          
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
                'name' => 'required',
                'category_id' => 'required',
                'category_image' => 'required',
            ],[
                'name.required' => 'Category name is required',
                'category_image.required' => 'Category Image is required'
            ]);      

            $categories = new Category();
            $categories->name = $request->name;
            $categories->parent_id = $request->category_id;  
            $categories->save();
           
            $image_name = '';
            if($request->file('category_image')){
                foreach($request->file('category_image') as $key=>$image)
                {         
                    $categoryImage = new CategoryImage();                           
                    $originalName = $image->getClientOriginalName();             
                    $myfile =  $categoryImage->image_name = time().$originalName;  
                    if($key == 0){
                        $image_name = $myfile;
                    }                  
                    $categoryImage->image_name = $myfile;
                    if($categories->category_images()->save($categoryImage))
                    {
                        $image->storeAs('/category_image', $myfile);  
                    }   
                }
            }          
            
        Category::where('id', $categories->id)->update(['banner_image'=>$image_name]);
        session()->flash('success', 'Category has been created !!');
        return redirect('admin/categories');       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {  
        $categories = Category::all();
        $edit_category = Category::find($id);
        return view('admin.categories.edit', compact('categories', 'edit_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',  
        ],[
            'name.required' => 'Category name is required',
            'category_image.required' => 'Category Image is required'
        ]);      

        $categories = Category::find($id);
        $categories->name = $request->name;
        $categories->parent_id = $request->category_id;  
        $categories->save();
       
        $image_name = '';
        if($request->file('category_image')){
            $categoryImage = new CategoryImage();
            $categpry_img = $categories->category_images()->get();            
            if($categories->category_images()->delete($categoryImage)){
                foreach($categpry_img as $pro_img)
                {         
                    if(is_file(storage_path('app/category_image/'.$pro_img->image_name)))
                    {         
                        unlink(storage_path('app/category_image/'.$pro_img->image_name));
                    }         
                } 
            } 
           
                foreach($request->file('category_image') as $key=>$image)
                {         
                    $categoryImage = new CategoryImage();                           
                    $originalName = $image->getClientOriginalName();             
                    $myfile =  $categoryImage->image_name = time().$originalName;  
                    if($key == 0){
                        $image_name = $myfile;
                    }                  
                    $categoryImage->image_name = $myfile;
                    if($categories->category_images()->save($categoryImage))
                    {
                        $image->storeAs('/category_image', $myfile);  
                    }   
                }           

        }
  
        
    // Category::where('id', $categories->id)->update(['banner_image'=>$image_name]);
  
    session()->flash('success', 'Category has been updated !!');
    return redirect('admin/categories');    
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  
        $category = Category::find($id);
        if (!is_null($category)) {
            $category->delete();
        }

        session()->flash('success', 'Category has been deleted !!');
        return back();
    }
}
