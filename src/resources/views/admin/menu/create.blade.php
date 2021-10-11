@inject('menuLinks', 'Ddkits\Adminpanel\Controller\MenusController')
@inject('isAdmin', 'Ddkits\Adminpanel\Controller\AdminPanelController')
@inject('getInfo', 'Ddkits\Adminpanel\Controller\AdminPanelController')
@inject('msgsBar', 'Ddkits\Adminpanel\Controller\MsgsController')
@inject('profile', 'Ddkits\Adminpanel\Controller\ProfilesController')
@if( $isAdmin->adminInfo( Auth::user()->id )->level == 0)


@extends('adminpanel::layouts.dash')

@section('title', 'Creat New Menu link')

@section('styles')

@stop

@section('content')
<div class="panel-header panel-header-sm">
    </div>
    <div class="content">
          <div class="well message">
              @include('partials._messages')
          </div>
          <!-- edit form column -->
      <div class="well bg-white col-lg-12 has-shadow align-items-center text-center">
        <h1>Site Configurations</h1>
	<div class="container-fluid col-lg-12 ">
		{!! Form::open(array('route' => 'menus.store')) !!}
		    {{ Form::number('uid', Auth::user()->id, ['hidden'=>'']) }}
			<div class="project">
    <div class="row bg-white has-shadow">
      <div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
        <div class="project-title d-flex align-items-center">
          <div class="text">
            {{ Form::label('name', 'Name:', array('class' => 'col-md-12')) }}{{ Form::text('name', null, array('class' => 'form-control col-md-12', 'required' => '')) }}
            {{ Form::label('menu', 'Menu Type:', array('class' => 'col-md-12')) }}{{ Form::select('menu', array('mainmenu' => 'Main Menu', 'adminmenu' => 'Admin Menu'), array('class' => 'col-md-12', 'required' => '')) }}

            {{ Form::label('menuparent', 'Menu Parent:', array('class' => 'col-md-12')) }}
            {{ Form::select('menuparent', ['None'=>'None', $menuLinks->indexAll()], array('class' => 'form-control col-md-12')) }}

            <!-- {{ Form::label('adminlevel', 'Admin Level:') }}{{ Form::number('adminlevel', 1, array('class' => 'form-control col-md-12')) }} -->

            {{ Form::label('weight', 'Weight:', array('class' => 'col-md-12')) }}{{ Form::number('weight', 0, array('class' => 'form-control col-md-12')) }}

            {{ Form::label('link', 'Link:', array('class' => 'col-md-12')) }}{{ Form::text('link', '/', array('class' => 'form-control col-md-12')) }}

            {{ Form::label('class', 'Class:', array('class' => 'col-md-12')) }}{{ Form::text('class', null, array('class' => 'form-control col-md-12')) }}
            {{ Form::label('iconclass', 'Icon Class:') }}{{ Form::text('iconclass', null, array('class' => 'form-control col-md-12')) }}

            {{ Form::label('description', 'Menu Description:', array('class' => 'col-md-12')) }} {{ Form::textarea('description', null, array('class' => 'form-control col-md-12', 'required' => '')) }}
          </div>
        </div>
      </div>
      <div class="right-col col-lg-8 col-suffix-4 d-flex align-items-center">
        <div > {{ Form::submit('Create Menu', array('class' => 'btn btn-success')) }}</div>
        <div ><a href="{{ route('menus.index') }}" class="edit btn btn-danger">Cancel</a></div>
    </div>
  </div>
		{!! Form::close() !!}
</div>
</div>
</div>
@stop
@else
 <div> Accsess Denied!</div>
@endif
