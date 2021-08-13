@extends('master.master')
@section('title', 'JDK Animal | Dashboard Page')
@section('breadcrum')
<div class="col-sm-6">
    <h1>Dashboard</h1>
  </div>
    <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
      @if (request()->segments())
          @foreach (request()->segments() as $breadcrum_link)
          <li class="breadcrumb-item active"><a href="{{url($breadcrum_link)}}">{{ $breadcrum_link }}</a></li>
          @endforeach
      @endif
      
    </ol>
</div>
@stop
@section('content')

<!-- page title area end -->

<div class="main-content-inner">
    <div class="row">
        <!-- data table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Create New Role</h4>                  
           
                    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="en_name">Product Name in English <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="en_name" name="en_name" value="{{$product->en_name}}" placeholder="Enter Name">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="tg_name">తెలుగులో ఉత్పత్తి పేరు <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="tg_name" name="tg_name" value="{{$product->tg_name}}" placeholder="పేరు నమోదు చేయండి">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="en_product_category">Product category <span class="text-danger">*</span></label>
                                <select name="en_product_category" id="en_product_category" class="form-control select2">                              
                                        <option value="fist">fist</option>
                                        <option value="second">second</option>
                                        <option value="third">third</option>
                                        <option value="fourth">fourth</option>                           
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="tg_product_category">ఉత్పత్తి వర్గం <span class="text-danger">*</span></label>
                                <select name="tg_product_category" id="tg_product_category" class="form-control select2">                              
                                        <option value="మొదటి వర్గం">మొదటి వర్గం</option>
                                        <option value="రెండవ వర్గం">రెండవ వర్గం</option>
                                        <option value="మూడవ వర్గం">మూడవ వర్గం</option>
                                        <option value="నాల్గవ వర్గం">నాల్గవ వర్గం</option>                           
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="en_product_sub_category">Product sub category</label>
                                <select name="en_product_sub_category" id="en_product_sub_category" class="form-control select2">                              
                                        <option value="fist">fist</option>
                                        <option value="second">second</option>
                                        <option value="third">third</option>
                                        <option value="fourth">fourth</option>                             
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="tg_product_sub_category">ఉత్పత్తి ఉప వర్గం</label>
                                <select name="tg_product_sub_category" id="tg_product_sub_category" class="form-control select2">                              
                                    <option value="మొదటి వర్గం">మొదటి వర్గం</option>
                                    <option value="రెండవ వర్గం">రెండవ వర్గం</option>
                                    <option value="మూడవ వర్గం">మూడవ వర్గం</option>
                                    <option value="నాల్గవ వర్గం">నాల్గవ వర్గం</option>                            
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="en_product_feed">Food</label>
                                <select name="en_product_feed" id="en_product_feed" class="form-control select2">                              
                                        <option value="fist">fist</option>
                                        <option value="second">second</option>
                                        <option value="third">third</option>
                                        <option value="fourth">fourth</option>                             
                                </select>
                            </div>  
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="tg_product_feed">ఆహారం</label>
                                <select name="tg_product_feed" id="tg_product_feed" class="form-control select2">                              
                                    <option value="మొదటి వర్గం">మొదటి వర్గం</option>
                                    <option value="రెండవ వర్గం">రెండవ వర్గం</option>
                                    <option value="మూడవ వర్గం">మూడవ వర్గం</option>
                                    <option value="నాల్గవ వర్గం">నాల్గవ వర్గం</option>                                  
                                </select>
                            </div>                           
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="en_product_breed">Breed</label>
                                <select name="en_product_breed" id="en_product_breed" class="form-control select2">                              
                                    <option value="fist">fist</option>
                                    <option value="second">second</option>
                                    <option value="third">third</option>
                                    <option value="fourth">fourth</option>                            
                                </select>
                            </div>  
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="tg_product_breed">ఆహారం</label>
                                <select name="tg_product_breed" id="tg_product_breed" class="form-control select2">                              
                                    <option value="మొదటి వర్గం">మొదటి వర్గం</option>
                                    <option value="రెండవ వర్గం">రెండవ వర్గం</option>
                                    <option value="మూడవ వర్గం">మూడవ వర్గం</option>
                                    <option value="నాల్గవ వర్గం">నాల్గవ వర్గం</option>                                 
                                </select>
                            </div>                           
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="en_product_about">About</label>
                                    <textarea class="form-control" name="en_product_about" id="en_product_about" rows="3"></textarea>
                                  </div>
                            </div>  
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="tg_product_about">గురించి</label>
                                    <textarea class="form-control" name="tg_product_about" id="tg_product_about" rows="3"></textarea>
                                  </div>
                            </div>                           
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="product_distance">Distance</label>
                                <div>
                                <input type="number" name="product_distance" id="product_distance" class="form-control" placeholder="Enter amount"> 
                                </div>                    
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="product_amount">Amount <span class="text-danger">*</span></label>
                                <input type="text" name="product_amount" id="product_amount" class="form-control" placeholder="Enter amount">
                            </div> 
                        </div>

                            <div class="form-row">            
                            <div class="form-group col-md-4 col-sm-12">
                                <label for="product_images">Images</label>
                                <div>
                                    <input type="file" name="product_images[]" id="product_images" multiple>
                                @foreach ($product_imgs as $key=>$product_img)
                                <input type="hidden" name="old_product_images[]" id="old_product_images" value="{{$product_img->image_name}}">
                                 @endforeach                                    
                                </div>                                
                            </div>                      
                            <div class="form-group col-md-2 col-sm-12">
                                <label for="product_color">Color</label>
                                <div>
                                <input type="color" name="product_color" id="product_color" placeholder="Enter amount"> 
                            </div>                    
                            </div>

                            <div class="form-group col-md-3 col-sm-12">
                                <label for="product_age">Age</label>
                                <input type="text" name="product_age" id="product_age" class="form-control" placeholder="Enter amount">
                            </div>       
                            
                            <div class="form-group col-md-3 col-sm-12">
                                <label for="pregnancy">Pregnancy</label>
                                <div id="pregnancy">
                                <span>
                                <input type="radio" name="pregnancy" id="pregnancy_yes" value="yes"> <label for="pregnancy_yes" class="mr-4 mt-2"> Yes </label>
                                </span>
                                <input type="radio" name="pregnancy" id="pregnancy_no" value="no" checked> <label for="pregnancy_no"> No </label>
                                </div>
                            </div> 
                
                        </div>         
                        
                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save User</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- data table end -->
        
    </div>
</div>

@stop


@section('js_section')
<script>
</script>
@stop
