@extends('layout.app')
@section('style')
    
@endsection
@section('contenu')
  <!-- Page Header -->
  <div class="content-header">
    <div class="header-section">
        {{-- <h1>
            <i class="gi gi-brush"></i>Page Title<br><small>Subtitle</small>
        </h1> --}}
    </div>
</div>
<ul class="breadcrumb breadcrumb-top">
    <li>Category</li>
    <li><a href="">Page</a></li>
</ul>
<!-- END Page Header -->

<!-- Example Block -->
<div class="block">
    <!-- Example Title -->
    <div class="block-title">
        <div class="block-options pull-right">
            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a>
            <div class="btn-group btn-group-sm">
                <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default dropdown-toggle enable-tooltip" data-toggle="dropdown" title="Options"><span class="caret"></span></a>
                <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                    <li>
                        <a href="javascript:void(0)"><i class="gi gi-cloud pull-right"></i>Simple Action</a>
                        <a href="javascript:void(0)"><i class="gi gi-airplane pull-right"></i>Another Action</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="javascript:void(0)"><i class="fa fa-wrench fa-fw pull-right"></i>Separated Action</a>
                    </li>
                </ul>
            </div>
        </div>
        <h2>Block</h2>
    </div>
</div>
<!-- END Example Block -->
@endsection
@section('scripts')
    
@endsection