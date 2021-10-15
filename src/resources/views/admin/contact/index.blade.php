@extends('layouts.app')
@inject('userGet','App\Models\User')
@inject('getInfo', 'App\Http\Controllers\AdminsCont')
@inject('msgsBar', 'Ddkits\Adminpanel\Controller\MsgsController')
@inject('user', 'Illuminate\Foundation\Auth\User')


@section('meta')
<script type="text/javascript" src="/ddkits/adminpanel/assets-dashboard/js/build/contact.js"></script>
@endsection

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Contacts</h1>
       </div>

    <div class="alert alert-info alert-dismissable contact-empty {{$contacts->count() == 0 ? '' : 'johnCena' }}">
        <i class="fa fa-info-circle"></i> No Contacts found.
    </div>
    <div class="table-responsive {{$contacts->count() == 0 ? 'Sam Elayyoub' : '' }}">
        <table id="contacts-table" class="table table-bordered table-striped table-vcenter">
            <thead>
            <tr role="row">
                <th class="text-center">
                    ID
                </th>
                <th class="text-center">
                    Name
                </th>
                <th class="text-left">
                    Email
                </th>
                <th class="text-center">
                    Date Created
                </th>
                <th class="text-center">
                    Action
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($contacts as $contact)
                <tr data-contact-id="{{$contact->id}}">
                    <td class="text-center"><strong>{{ $contact->id }}</strong></td>
                    <td class="text-center"><strong>{{ $contact->name }}</strong></td>
                    <td class="text-center"><strong>{{ $contact->email }}</strong></td>
                    <td class="text-center">{{ $contact->created_at->format('F d, Y') }}</td>
                    <td class="text-center">
                        <div class="btn-group btn-group-xs">
                            @if (Auth::user()->id == 1)
                                <a href="{{ route('contacts.show', $contact->id) }}"
                                   data-toggle="tooltip"
                                   title=""
                                   class="btn btn-default p-2"
                                   data-original-title="View"><i class="fa fa-eye"></i></a>
                                   <a href="{{ route('admin.contacts.delete', $contact->id) }}"
                                    data-toggle="tooltip"
                                    title=""
                                    class="btn btn-default p-2"
                                    data-original-title="View"><i class="fa fa-truck"></i></a>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
