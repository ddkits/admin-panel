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
              @include('adminpanel::partials._messages')
          </div>
    </div>

@endsection

@endif
