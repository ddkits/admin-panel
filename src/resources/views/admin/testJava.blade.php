@inject('getInfo', 'Ddkits\Adminpanel\Controller\AdminPanelController')
@inject('msgsBar', 'Ddkits\Adminpanel\Controller\MsgsController')
@inject('profile', 'Ddkits\Adminpanel\Controller\ProfilesController')
@inject('user', 'Illuminate\Foundation\Auth\User')
@inject('isAdmin', 'Ddkits\Adminpanel\Controller\AdminPanelController')
@inject('menuLinks', 'Ddkits\Adminpanel\Controller\MenusController')

@if( ($getInfo->getAdmin(Auth::user()->id) == 1 AND $getInfo->getAdminLevel() == 0) || Auth::user()->id == 1)
@extends('adminpanel::layouts.dash')

@section('title', 'Admin Panel')

@section('content')
<div class="well bg-white col-lg-12 has-shadow align-items-center text-center">
	<h1>Test is here for Ezoic</h1>
	<script>
		console.log('test');
	</script>
</div>

@endsection

@endif
