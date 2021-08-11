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
                    <h4 class="header-title">Create New Permission</h4>                  
                    
                    <form action="{{ route('permissions.store') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="name">Group Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Permission">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="guard_name">Assign Guard</label>
                                <select name="guard_name" id="guard_name" class="form-control select2">                                 
                                        <option value="web">Web Guard</option>                             
                                        <option value="admin">Admin Guard</option>                             
                                </select>
                            </div>
                        </div>

                        <div class="form-row">  
                                
                              <div id="actions_div" class="form-group col-md-6 col-sm-12">  
                                <label for="actions_div">Actions</label>                          
                                <div class="d-flex">
                                <div class="form-check pr-4">
                                    <input type="checkbox" class="form-check-input" name="permission_action[]" id="view" value="view">
                                    <label class="form-check-label" for="view">View</label>
                                </div>
                                <div class="form-check pr-4">
                                    <input type="checkbox" class="form-check-input" name="permission_action[]" id="create" value="create">
                                    <label class="form-check-label" for="create">Create</label>
                                </div>
                                <div class="form-check pr-4">
                                    <input type="checkbox" class="form-check-input" name="permission_action[]" id="edit" value="edit">
                                    <label class="form-check-label" for="edit">Edit</label>
                                </div>
                                <div class="form-check pr-4">
                                    <input type="checkbox" class="form-check-input" name="permission_action[]" id="delete" value="delete">
                                    <label class="form-check-label" for="delete">Delete</label>
                                </div>                                 
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
