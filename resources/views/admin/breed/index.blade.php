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
                    <h4 class="header-title float-left">Breed List</h4>
                    <p class="float-right mb-2">
                        <a class="btn btn-primary text-white" href="{{ route('breeds.create') }}">Create New Breed</a>
                    </p>
                    <div class="clearfix"></div>
                    <div class="data-tables">                  
                        <table id="dataTable" class="text-center table">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th width="">Sl</th>
                                    <th width="">Name</th>                                   
                                    <th width="">Date/Time</th>
                                    <th width="">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($breeds as $breed)
                               <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $breed->en_name }}</td>                                  
                                    <td>{{ $breed->created_at }}</td>                                  
                     
                                    <td>
                                        <a class="btn btn-success text-white" href="{{ route('breeds.edit', $breed->id) }}">Edit</a>

                                        <a class="btn btn-danger text-white" href="{{ route('breeds.destroy', $breed->id) }}"
                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $breed->id }}').submit();">
                                            Delete
                                        </a>

                                        <form id="delete-form-{{ $breed->id }}" action="{{ url('admin/breeds', $breed->id) }}" method="POST" style="display: none;">
                                            @method('DELETE')
                                            @csrf
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
        <!-- data table end -->
        
    </div>
</div>
@stop


@section('js_section')
<script>
</script>
@stop
