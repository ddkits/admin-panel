@inject('menuLinks', 'Ddkits\Adminpanel\Controller\MenusController')
@inject('isAdmin', 'Ddkits\Adminpanel\Controller\AdminPanelController')
@inject('getInfo', 'Ddkits\Adminpanel\Controller\AdminPanelController')
@inject('msgsBar', 'Ddkits\Adminpanel\Controller\MsgsController')
@inject('profile', 'Ddkits\Adminpanel\Controller\ProfilesController')

@if( $getInfo->adminInfo( Auth::user()->id )->level == 0)

@extends('adminpanel::layouts.dash')

@section('title', 'Menu links')

@section('styles')

@stop

@section('content')
<div class="panel-header panel-header-sm">
    </div>
    <div class="content">
          <div class="well message">
              @include('adminpanel::partials._messages')
          </div>
          <!-- edit form column -->
      <div class="well bg-white col-md-12 has-shadow">
        <h1>Site Configurations</h1>
   <hr>
   @if( empty($menus) )
   <div class="card col-md-12">
     <h3 class="h4 row">No Menus yet</h3></div>
   @else
    <div class="card col-md-12">
      <div class="row well bg-white has-shadow">
      <h3 class="  justify-content-between">Admin Menus</h3>
        @foreach($menus as $menu)
           @if ($menu->menu == 'adminmenu')
                       <div class="col-md-12">
                          <div class="p-1 m-1 edit">
                          {!! Form::open(['route' => ['menu.update', $menu->id], 'method' => 'put', 'class'=> 'form-group col-md-12']) !!}
                            <div class="col-md-12">
                              <a href="#index-{{$menu->id}}" aria-expanded="false" data-toggle="collapse"><i class="{{$menu->iconclass}}"></i>#{{$menu->id}}: {{$menu->name}}</a>
                          <div id="index-{{$menu->id}}" class="collapse p-1 col-md-12 row">
                            {{ Form::label('name', 'Name:', array('class' => 'col-md-3')) }}
                            {{ Form::text('name', $menu->name, array('class' => 'Form-control col-md-8')) }}
                            {{ Form::label('menu', 'Menu Type:', array('class' => 'col-md-3')) }}
                            {{ Form::text('menu', $menu->menu, array('class' => 'Form-control col-md-8')) }}
                            {{ Form::label('menuparent', 'Parent menu:', array('class' => 'col-md-3')) }}
                            {{ Form::number('menuparent', $menu->menuparent, array('class' => 'Form-control col-md-8')) }}
                            {{ Form::label('link', 'Link:', array('class' => 'col-md-3')) }}
                            {{ Form::text('link', $menu->link, array('class' => 'Form-control col-md-8')) }}
                            {{ Form::label('class', 'Class:', array('class' => 'col-md-3')) }}
                            {{ Form::text('class', $menu->class, array('class' => 'Form-control col-md-8')) }}
                            {{ Form::label('iconclass', 'Icon Class:', array('class' => 'col-md-3')) }}
                            {{ Form::text('iconclass', $menu->iconclass, array('class' => 'Form-control col-md-8')) }}
                            {{ Form::label('description', 'Menu Description:', array('class' => 'col-md-3')) }}
                            {{ Form::textarea('description', $menu->description, array('class' => 'Form-control col-md-8', 'rows'=>'1')) }}
                            {{ Form::label('adminlevel', 'Admin Level:', array('class' => 'col-md-3')) }}
                            {{ Form::number('adminlevel', $menu->adminLevel, array('class' => 'Form-control col-md-8')) }}
                            {{ Form::label('weight', 'Weight:', array('class' => 'col-md-3')) }}
                            {{ Form::number('weight', $menu->weight, array('class' => 'Form-control col-md-8')) }}
                       <div class="row col-md-12">
                            <div class="pull-left col-md-6">
                          {{ Form::submit('Save', ["class"=>"btn btn-success"]) }}
                            {!! Form::close() !!}
                        </div>
                            <div class="pull-right col-md-6">
                            {!! Form::open(['route'=>['menu.destroy', $menu->id], 'method'=> 'DELETE'])!!}
                              {!! Form::submit('Delete', ["class"=> 'btn-danger btn']) !!}
                            {!! Form::close() !!}</div>
                        </div></div>
                            </div>
                          </div>
                        </div>

             @endif
        @endforeach
        </div>
      </div>
    <div class="card col-md-12">
      <div class="row well bg-white has-shadow">
      <h3 class="text portfolio-item" >Main Menus</h3>
        @foreach($menus as $menu)
           @if ($menu->menu == 'mainmenu')
                    <div class="col-md-12">
                        <div class="p-1 m-1 edit">
                          {!! Form::open(['route' => ['menu.update', $menu->id], 'method' => 'put', 'class'=> 'form-group col-md-12']) !!}
                          <div class="col-md-12">
                            <a href="#index-{{$menu->id}}" aria-expanded="false" data-toggle="collapse"><i class="{{$menu->iconclass}}"></i>#{{$menu->id}}: {{$menu->name}}</a>
                        <div id="index-{{$menu->id}}" class="collapse p-1 col-md-12 row">
                              {{ Form::label('name', 'Name:', array('class' => 'col-md-3')) }}
                              {{ Form::text('name', $menu->name, array('class' => 'Form-control col-md-8')) }}
                              {{ Form::label('menu', 'Menu Type:', array('class' => 'col-md-3')) }}
                              {{ Form::text('menu', $menu->menu, array('class' => 'Form-control col-md-8')) }}
                              {{ Form::label('menuparent', 'Parent menu:', array('class' => 'col-md-3')) }}
                              {{ Form::number('menuparent', $menu->menuparent, array('class' => 'Form-control col-md-8')) }}
                              {{ Form::label('link', 'Link:', array('class' => 'col-md-3')) }}
                              {{ Form::text('link', $menu->link, array('class' => 'Form-control col-md-8')) }}
                              {{ Form::label('class', 'Class:', array('class' => 'col-md-3')) }}
                              {{ Form::text('class', $menu->class, array('class' => 'Form-control col-md-8')) }}
                              {{ Form::label('iconclass', 'Icon Class:', array('class' => 'col-md-3')) }}
                              {{ Form::text('iconclass', $menu->iconclass, array('class' => 'Form-control col-md-8')) }}
                              {{ Form::label('description', 'Menu Description:', array('class' => 'col-md-3')) }}
                              {{ Form::textarea('description', $menu->description, array('class' => 'Form-control col-md-8', 'rows'=>'1')) }}
                              {{ Form::label('weight', 'Weight:', array('class' => 'col-md-3')) }}
                              {{ Form::number('weight', $menu->weight, array('class' => 'Form-control col-md-8')) }}
                              <div class="row col-md-12">
                                <div class="pull-left col-md-6">
                              {{ Form::submit('Save', ["class"=>"btn btn-success"]) }}
                                {!! Form::close() !!}
                            </div>
                                <div class="pull-right col-md-6">
                                {!! Form::open(['route'=>['menu.destroy', $menu->id], 'method'=> 'DELETE'])!!}
                                  {!! Form::submit('Delete', ["class"=> 'btn-danger btn']) !!}
                                {!! Form::close() !!}</div>
                            </div></div>
                            </div>
                          </div>
                        </div>

                 @endif
        @endforeach
         </div>
      </div>
    <hr>

  @endif
</div>
</div>
@stop

@else
 <div> Accsess Denied!</div>
@endif
