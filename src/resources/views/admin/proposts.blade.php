@inject('getInfo', 'Ddkits\Adminpanel\Controller\AdminPanelController')
@inject('msgsBar', 'Ddkits\Adminpanel\Controller\MsgsController')
@inject('profile', 'Ddkits\Adminpanel\Controller\ProfilesController')
@inject('user', 'Illuminate\Foundation\Auth\User')

@if( ($getInfo->getAdmin(Auth::user()->id) == 1  AND $getInfo->getAdminLevel() == 0)  || Auth::user()->id == 1)
@extends('layouts.admin')

@section('title', 'Admin Panel')

@section('content')
	    <!-- edit form column -->
	    <div class="well bg-white col-lg-12 has-shadow align-items-center text-center">
	    	<h1>Site Configurations</h1>
	    	 <hr>
	    	 <table  class="table table-bordered col-lg-12">
	    	 	<thead><tr><td class="info"> Name </td><td class="info"> Value </td><td class="info"> Type </td><td class="info">Added by UID</td></tr></thead>
	    	 	{{ Form::open(['route' => 'ddk.admin.settings.save', 'method'=>'POST', 'id'=>'newMsgForm']) }}

	      @foreach($settings as $settings)
	     	<tr><td>{{ str_replace('_', ' ', ucfirst($settings->field_name)) }} </td><td> {{ (($settings->field_name != 'powered_by') ? Form::text($settings->field_name, $settings->value, ['class'=>'form-control']) : $settings->value ) }} </td><td> {{ $settings->type }}</td><td>{{ ($user->find($settings->uid)) ? $user->find($settings->uid)->firstname : '' }}</td></tr>
			@endforeach
			</table>
			{{ Form::submit('Save', ['class'=>'btn btn-success']) }}
		{{ Form::close()  }}
			<hr>
	        </div>
@endsection

@endif

