@extends('orchestra/foundation::layouts.page')

@section('navbar')
    @include('blupl/venue::widgets.header')
@endsection

@section('content')
    <table class="table table-bordered">
        <thead>
        <tr>
            <th></th>
            <th>Number Of Entries</th>
            <th>Pending</th>
            <th>Approval</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Management Member</td>
            <td><a href="{{ handles('blupl/venue::approval/list') }}"> {{ $venue->all()->count() }}</a></td>
            <td>{{ $venue->where('status','=', 0)->count() }}</td>
            <td>{{ $venue->where('status','=', 1)->count() }}</td>
        </tr>

        </tbody>
    </table>
@stop
