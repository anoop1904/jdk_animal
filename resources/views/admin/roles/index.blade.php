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
                  <h4 class="header-title float-left">Roles List</h4>
                  <p class="float-right mb-2">
                      {{-- @if (Auth::guard('vas')->user()->can('role.create')) --}}
                          <a class="btn btn-primary text-white" href="{{ url('admin/roles/create') }}">Create New Role</a>
                      {{-- @endif --}}
                  </p>
                  <div class="clearfix"></div>
                  <div class="data-tables">              
                      <table id="dataTable" class="text-center">
                          <thead class="bg-light text-capitalize">
                              <tr>
                                  <th width="5%">Sl</th>
                                  <th width="10%">Name</th>
                                  <th width="60%">Permissions</th>
                                  <th width="15%">Action</th>
                              </tr>
                          </thead>
                          <tbody>
                             @foreach ($roles as $role)
                             <tr>
                                  <td>{{ $loop->index+1 }}</td>
                                  <td>{{ $role->name }}</td>
                                  <td>
                                      @foreach ($role->permissions as $perm)
                                          <span class="badge badge-info mr-1">
                                              {{ $perm->name }}
                                          </span>
                                      @endforeach
                                  </td>
                                  <td>
                                      {{-- @if (Auth::guard('vas')->user()->can('vas.edit')) --}}
                                          <a class="btn btn-success text-white" href="{{ route('roles.edit', $role->id) }}">Edit</a>
                                      {{-- @endif --}}

                                      {{-- @if (Auth::guard('vas')->user()->can('vas.edit')) --}}
                                          <a class="btn btn-danger text-white" href="{{ route('roles.destroy', $role->id) }}"
                                          onclick="event.preventDefault(); document.getElementById('delete-form-{{ $role->id }}').submit();">
                                              Delete
                                          </a>

                                          <form id="delete-form-{{ $role->id }}" action="{{ url('admin/roles', $role->id) }}" method="POST" style="display: none;">
                                              @method('DELETE')
                                              @csrf
                                          </form>
                                      {{-- @endif --}}
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
{{-- @include('roles.partials.scripts') --}}
<script>
    $(function () { 
      $('#roles_index').DataTable({
        "paging": false,
        "lengthChange": false,
        "searching": false,
        "ordering": false,
        "info": false,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
@stop
