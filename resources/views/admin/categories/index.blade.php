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
<div class=" container ">
   <!--begin::Card-->
   <div class="card">
      <!--begin::Header-->
      <div class="card-header">
         <div class="card-title">
         </div>
         <div class="card-toolbar text-right">
            <a href="{{ route('categories.create') }}" class="btn btn-primary font-weight-bolder">
            New Record
            </a>
            {{-- <a href="http://localhost/amigo/admin/changeorder" style="margin-left: 10px;" class="btn btn-primary font-weight-bolder">Change Category Order</a> --}}
         </div>
      </div>
      <!--end::Header-->
      <!--begin::Body-->
      <div class="card-body">          
         <div class="row">
           <div class="col-md-12">         
               <table class="table w-100" id="category_index">
                  <thead>
                     <tr>
                        <th width="">Sr. No.</th>
                        <th width="">Image</th>
                        <th width="">Name</th>
                        <th width="">Parent</th>
                        <th width="">Date/Time Added</th>
                        <th width="">Status</th>
                        <th width="">Operations</th>
                     </tr>
                  </thead>
                  <tbody> 
                    @foreach ($categories as $key=>$category)             
                     <tr>
                        <td>1</td>
                        <td>                     
                           <img src="{{asset('storage/category_image/'. $category->banner_image)}}" style="height: 80px;width: 80px;">
                        </td>
                        <td>{{$category->name}}</td>
                        <td>
                         {{$category->paren_id ? $category->paren_id : 'No parent'}}
                        </td>
                        <td>August 13, 2021</td>
                        <td>
                        <button id="{{$category->id}}" value="{{$category->IsActive}}" onclick="is_active(id)" class="btn btn-sm {{$category->IsActive ? 'btn-primary' : 'btn-danger'}}">{{$category->IsActive ? 'Active' : 'Deactive'}}</button>     
                        </td>     
                        <td class="d-flex">
          <a href="{{route('categories.edit', $category->id)}}" class="btn btn-info pull-left fa fa-pencil-square-o" style="margin-right: 3px;" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
         <form method="POST" action="{{route('categories.destroy', $category->id)}}" accept-charset="UTF-8">
             @method('DELETE') 
             @csrf
         <button type="submit" class="btn btn-danger la la-trash" title="Delete" onclick="return confirm('Do You want to Delete?')"><i class="fa fa-trash" aria-hidden="true"></i></button>
         </form>
         </td>
         </tr>      
                      
         @endforeach    
         </tbody>
         </table>
        </div>
      </div>

         </div>
      </div>
      <!--end::Card-->
   </div>
   <!--end::Container-->
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

function is_active(id){ 
   myid = document.getElementById(id);
   newid = myid.id;
   newvalue = myid.value;
    
   $.ajax({
					type: 'POST',
					url: "{{ url('/admin/change_category_status') }}",
					data: {
						"_token": $('meta[name="csrf-token"]').attr('content'),	
						"id": id,
						"status" : newvalue,			
					},
					success: function(data) {	
								console.log(data);
						window.location.reload();
					}
				})
 
   
}

</script>
@stop