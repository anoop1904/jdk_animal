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
<div class="main-content-inner">
    <div class="row">
        <!-- data table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title float-left">Permissions List</h4>
                    <p class="float-right mb-2">
                        <a class="btn btn-primary text-white" href="{{ route('products.create') }}">Create Products</a>
                    </p>
                    <div class="clearfix"></div>
                    <div class="data-tables">                  
                        <table id="products_index" class="table table-striped">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th width="5%">Sl</th>
                                    <th width="10%">Name</th>
                                    <th width="10%">Price</th>
                                    <th width="40%">Group Name</th>
                                    <th width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>                          
                                
                               @foreach ($products as $product)
                               @foreach ($product->product_images as $image)                            
                               @endforeach
                                @if (session('locale') == 'en') 
                               <tr>                                   
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $product->en_name }}</td>
                                    <td>{{ $product->price }}</td>                         
                                    <td>
                                        {{@$image->image_name}}
                                    </td>                         
                                    <td>
                                        <a class="btn btn-success text-white" href="{{ route('products.edit', $product->id) }}">Edit</a>

                                        <a class="btn btn-danger text-white" href="{{ route('products.destroy', $product->id) }}"
                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $product->id }}').submit();">
                                            Delete
                                        </a>

                                        <form id="delete-form-{{ $product->id }}" action="{{ url('admin/products', $product->id) }}" method="POST" style="display: none;">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                                @else
                                <tr>                                   
                                  
                                </tr>
                                @endif
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- data table end -->
        
    </div>
</div>
@stop


@section('js_section')
<script>
     $(function () { 
      $('#products_index').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
      });
    });
</script>
@stop
