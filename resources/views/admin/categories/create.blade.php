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
<div class="row">
   <div class="col-lg-12">
      <div class="card m-b-30">
         <div class="card-body">
            <form action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">
               @csrf         
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="Category">Category</label>
                        <span class="text text-danger">*</span>
                        <div>
                           <select class="form-control" name="category_id" required="">
                            <option value="0" selected="">Root</option>
                            @foreach($categories_array as $key=>$category)                      
                            <option value="{{$categories_array[$key]['pid'][0]}}">{{implode('/', array_reverse($category['data'])) }}</option> 
                           @endforeach                  
                           </select>                          
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="name">Category Name</label>
                        <span class="text text-danger">*</span>
                        <div>
                           <input class="form-control" placeholder="Enter category name" id="name" name="name" type="text" value="">
                        </div>
                        <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                     </div>
                  </div>    
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="category_image" id="category_image">Image</label>
                        <div> 
                           <img id="blah" src="http://localhost/amigo/assets/images/user.png" style="height: 110px;width: 110px;">
                           <input id="category_image" type="file" name="category_image[]">
                        </div>
                     </div>
                     <span class="text-danger">@error('category_image'){{ $message }}@enderror</span>
                  </div>       
               </div>
               <div class="form-group m-b-0">
                  <div>
                     <button type="submit" class="btn btn-primary waves-effect waves-light"> Submit </button>
                     <a href="http://localhost/amigo/admin/category" type="reset" class="btn btn-secondary waves-effect m-l-5"> Cancel </a>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
   <!-- end col -->
   <!-- end col -->
</div>
@stop
@section('js_section')
<script>
   $(function () { 
    $('#category_index').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });
   });
</script>
@stop