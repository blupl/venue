@extends('orchestra/foundation::layouts.page')

@section('navbar')
    @include('blupl/management::widgets.header')
@endsection

@section('content')
    <table class="table table-bordered">
        <thead>
        <tr>
            <th></th>
            <th>Number of Entries</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Venue Operations Staff</td>
            <td></td>
        </tr>
        <tr>
            <td>Ground Staff</td>
            <td></td>
        </tr>
        <tr>
            <td>Scorer</td>
            <td></td>
        </tr>
        <tr>
            <td>PA Anouncer</td>
            <td></td>
        </tr>
        <tr>
            <td>DJ</td>
            <td></td>
        </tr>
        <tr>
        </tbody>
    </table>
@stop