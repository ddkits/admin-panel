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

<ul class="breadcrumb breadcrumb-top">
    <li><a href="{{ route('contacts.index') }}">Contacts</a></li>
    <li><span href="javascript:void(0)">View Contact</span></li>
</ul>
<div class="row">
    <div class="col-lg-12">
        <div class="block">
            <div class="block-title">
                <h2><i class="fa fa-phone"></i> <strong>Contact</strong> Info</h2>
            </div>
            <table class="table table-borderless table-striped table-vcenter">
                <tbody>
                <tr>
                    <td style="width: 30%" class="text-right"><strong>Date</strong></td>
                    <td style="width: 70%">{{ $contact->created_at->format('F d, Y h:i:s A') }}</td>
                </tr>
                <tr>
                    <td style="width: 30%" class="text-right"><strong>Name</strong></td>
                    <td style="width: 70%">{{ $contact->name }}</td>
                </tr>

                <tr>
                    <td style="width: 30%" class="text-right"><strong>Email</strong></td>
                    <td style="width: 70%">{{ $contact->email }}</td>
                </tr>

                <tr>
                    <td style="width: 30%" class="text-right"><strong>Phone</strong></td>
                    <td style="width: 70%">{{ $contact->phone }}</td>
                </tr>

                <tr>
                    <td style="width: 30%" class="text-right"><strong>Address</strong></td>
                    <td style="width: 70%">{{ $contact->address }}</td>
                </tr>

                <tr>
                    <td style="width: 30%" class="text-right"><strong>How Did you find us?</strong></td>
                    <td style="width: 70%">{{ $contact->howdidyoufindus }}</td>
                </tr>

                <tr>
                    <td style="width: 30%" class="text-right"><strong>Message</strong></td>
                    <td style="width: 70%">{{ $contact->message }}</td>
                </tr>

                {{--<tr>--}}
                    {{--<td style="width: 30%" class="text-right"><strong>Company</strong></td>--}}
                    {{--<td style="width: 70%">{{ $contact->company }}</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                    {{--<td style="width: 30%" class="text-right"><strong>Phone</strong></td>--}}
                    {{--<td style="width: 70%">{{ $contact->phone }}</td>--}}
                {{--</tr>--}}
                {{-- <tr>
                    <td style="width: 30%" class="text-right"><strong>Message</strong></td>
                    <td style="width: 70%">{!! $contact->message !!}</td>
                </tr> --}}
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
@endsection
