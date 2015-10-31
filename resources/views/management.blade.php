@extends('orchestra/foundation::layouts.page')

@section('navbar')
    @include('blupl/venue::widgets.header')
@endsection

@section('content')

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Designation/Role/Activity</th>
                <th>Number of Entries</th>
            </tr>
        </thead>
        <tbody>
        <tr>
            <td>Chief Executive Officer</td>
            <td>{{ $venue->where('role', '=', 'ceo')->count() }}</td>
        </tr>
        <tr>
            <td>Executive</td>
            <td>{{ $venue->where('role', '=', 'executive')->count() }}</td>
        </tr>
        <tr>
            <td>Head of Anti-Corruption</td>
            <td>{{ $venue->where('role', '=', 'head-corruption')->count() }}</td>
        </tr>
        <tr>
            <td>Head of Security</td>
            <td>{{ $venue->where('role', '=', 'head-security')->count() }}</td>
        </tr>
        <tr>
            <td>Manager</td>
            <td>{{ $venue->where('role', '=', 'manager')->count() }}</td>
        </tr>
        </tbody>
    </table>
@stop