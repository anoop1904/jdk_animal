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
                    <h4 class="header-title">Create New Feed</h4>                  
                    
                    <form action="{{ route('feeds.store') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="en_name">Feed Name in English</label>
                                <input type="text" class="form-control" id="en_name" name="en_name" placeholder="Enter feed name">
                            </div>     
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="tg_name">Feed Name in telugu</label>
                                <input type="text" class="form-control" id="tg_name" name="tg_name" placeholder="Enter feed name">
                            </div>             
                        </div>          
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save User</button>
                            </div>                
                        </div>  
                       
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
