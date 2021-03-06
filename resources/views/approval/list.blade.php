@extends('orchestra/foundation::layouts.page')


@section('navbar')
    @include('blupl/venue::widgets.header')
@endsection

@section('content')
    {!! Form::open(['url'=>handles('blupl/venue::approval/zone/batch')]) !!}

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Date / Time</th>
            <th class="text-center">Batch Approval<br/><input type="checkbox" id="select_all"></th>
            <th>Name</th>
            <th>Organization</th>
            <th>Role</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($members as $member)
        <tr>
            <td>{{ $member->id }}</td>
            <td>{{ $member->created_at }}</td>
            <td><input type="checkbox" class="checkbox" style="margin: 0 auto;" name="member[]" value="{{ $member->id }}"></td>
            <td>{{ $member->name }}</td>
            <td>{{ $member->organization }}</td>
            <td>{{ $member->role }}</td>
            <td>{{ ($member->status == true ? 'Approved' : 'Pending') }}</td>
            <td>
                @if ($member->status == false )
                    <a href="{{ handles('blupl/venue::approval/member/'.$member->id) }}">Approve</a> |
                    <a href="{{ handles('blupl/venue::approval/archive/'.$member->id) }}" style="color: red;">Archive</a>
                @endif
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>

    {!! Form::close() !!}
    {!! $members->render() !!}
@stop


