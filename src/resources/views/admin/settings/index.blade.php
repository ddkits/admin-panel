@inject('menuLinks', 'Ddkits\Adminpanel\Controller\MenusController')
@inject('isAdmin', 'Ddkits\Adminpanel\Controller\AdminPanelController')
@inject('getInfo', 'Ddkits\Adminpanel\Controller\AdminPanelController')
@inject('msgsBar', 'Ddkits\Adminpanel\Controller\MsgsController')
@inject('profile', 'Ddkits\Adminpanel\Controller\ProfilesController')
@inject('user', 'Illuminate\Foundation\Auth\User')

@if( ($getInfo->getAdmin(Auth::user()->id) == 1  AND $getInfo->getAdminLevel() == 0)  || Auth::user()->id == 1)

@extends('adminpanel::layouts.dash')

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
	    	<table class="table table-bordered col-lg-12">
	    		<tbody>
	    			{!! Form::open(array('route' => 'admin.settings.store', 'method'=>'POST')) !!}
	    			<tr>
	    				<td>
	    				{{ Form::text('field_name','', ['class'=>'form-control', 'placeholder'=>'Name']) }}
	    				</td>
	    				<td>
	    				{{ Form::text('value', '', ['class'=>'form-control', 'placeholder'=>'Value']) }}
	    				</td>
	    				<td>
	    				{{ Form::select('type', ['settings'=>'Settings', 'config'=>'Config', 'private'=>'Private'], ['settings'], ['class'=>'form-control']) }}
	    				</td>
	    				<td>
	    				{{ Form::submit('Create', ['class'=>'btn btn-success']) }}
	    				</td>

	    			</tr>
	    		</tbody>
			    <dir hidden>
			    	{{ Form::number('uid', Auth::user()->id, ['class'=>'form-control']) }}
			    </dir>
			    {!! Form::close() !!}

	    	</table>
	    	 <hr>
	    	 <table  class="table table-bordered col-lg-12">
	    	 	<thead><tr><td class="info"> Name </td><td class="info"> Value </td><td class="info"> Type </td><td class="info">Added by UID</td></tr></thead>
	    	 	{{ Form::open(['route' => 'admin.settings.save', 'method'=>'POST', 'id'=>'newMsgForm']) }}

	      @foreach($settings as $setting)
	     	<tr>
	     		<td>{{ str_replace('_', ' ', ucfirst($setting->field_name)) }} {{ Form::hidden('field_name', $setting->field_name) }}{{ Form::hidden('id', $setting->id) }}</td>
	     		<td> {{ (($setting->field_name != 'powered_by') ? Form::text($setting->field_name, $setting->value, ['class'=>'form-control']) : $setting->value ) }} </td>
	     		<td> {{ $setting->type }}</td>
	     		<td>{{ ($user->find($setting->uid)) ? $user->find($setting->uid)->firstname : 'Not by User' }}</td>
	     	</tr>
			@endforeach
			</table>
				{{ Form::submit('Save', ['class'=>'btn btn-success']) }}
			{{ Form::close()  }}
			<hr>
    </div>
</div>
@endsection

@endif
