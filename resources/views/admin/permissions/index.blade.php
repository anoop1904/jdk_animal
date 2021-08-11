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
                        <a class="btn btn-primary text-white" href="{{ route('permissions.create') }}">Create New Permission</a>
                    </p>
                    <div class="clearfix"></div>
                    <div class="data-tables">                  
                        <table id="permissions_index" class="table table-striped">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th width="5%">Sl</th>
                                    <th width="10%">Name</th>
                                    <th width="10%">Guard</th>
                                    <th width="40%">Group Name</th>
                                    <th width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($permissions as $permission)
                               <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td>{{ $permission->guard_name }}</td>                         
                                    <td>{{ $permission->group_name }}</td>                         
                                    <td>
                                        <a class="btn btn-success text-white" href="{{ route('permissions.edit', $permission->id) }}">Edit</a>

                                        <a class="btn btn-danger text-white" href="{{ route('permissions.destroy', $permission->id) }}"
                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $permission->id }}').submit();">
                                            Delete
                                        </a>

                                        <form id="delete-form-{{ $permission->id }}" action="{{ url('admin/permissions', $permission->id) }}" method="POST" style="display: none;">
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
     $(function () { 
      $('#permissions_index').DataTable({
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
