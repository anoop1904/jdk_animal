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
<div class="container">
  <div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-3 mt-5 mb-3">
                <div class="card">
                    <div class="seo-fact sbg1">
                        <a href="{{ url('admin/roles') }}">
                            <div class="p-4 d-flex justify-content-between align-items-center">
                                <div class="seofct-icon"><i class="fa fa-users"></i> Total buyer </div>
                                <h2>{{ $total_roles }}</h2>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-md-5 mb-3">
                <div class="card">
                    <div class="seo-fact sbg2">
                        <a href="{{ url('admin/users') }}">
                            <div class="p-4 d-flex justify-content-between align-items-center">
                                <div class="seofct-icon"><i class="fa fa-user"></i> Total sellers</div>
                                <h2>{{ $total_users }}</h2>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-md-5 mb-3">
                <div class="card">
                    <div class="seo-fact sbg2">
                        <a href="{{ url('admin/permissions') }}">
                            <div class="p-4 d-flex justify-content-between align-items-center">
                                <div class="seofct-icon"><i class="fa fa-user"></i> Total VAS</div>
                                <h2>{{ $total_permissions }}</h2>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-md-5 mb-3">
              <div class="card">
                  <div class="seo-fact sbg2">
                      <a href="{{ url('admin/permissions') }}">
                          <div class="p-4 d-flex justify-content-between align-items-center">
                              <div class="seofct-icon"><i class="fa fa-user"></i> New user this week</div>
                              <h2>{{ $total_permissions }}</h2>
                          </div>
                      </a>
                  </div>
              </div>
          </div> 
        </div>
    </div>
  </div>
</div>

<div class="container">

  <div class="row">
    <div class="col-md-12">
        <h4>Payments received so far</h4>
      </div> 
    <div class="col-md-3 mt-md-2 mb-3">
        <div class="card">
            <div class="seo-fact sbg2">
                <a href="{{ url('admin/permissions') }}">
                    <div class="p-4 d-flex justify-content-between align-items-center">
                        <div class="seofct-icon"><i class="fa fa-user"></i> Subscribed users </div>
                        <h2>{{ $total_permissions }}</h2>
                    </div>
                </a>
            </div>
        </div>
    </div> 
    <div class="col-md-3 mt-md-2 mb-3">
        <div class="card">
            <div class="seo-fact sbg2">
                <a href="{{ url('admin/permissions') }}">
                    <div class="p-4 d-flex justify-content-between align-items-center">
                        <div class="seofct-icon"><i class="fa fa-user"></i> Total sales gross </div>
                        <h2>{{ $total_permissions }}</h2>
                    </div>
                </a>
            </div>
        </div>
    </div> 
  </div>
</div>


</div>
@stop


@section('js_section')
<script>
</script>
@stop
