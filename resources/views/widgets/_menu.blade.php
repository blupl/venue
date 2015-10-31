
<ul class="nav navbar-nav">
    @if(Request::is('venue/member'))
        <li role="presentation">
            <a id="" href="{{ handles('blupl/venue::member/registration') }}" >
                New Form
            </a>
        </li>
    @endif
    @if(Request::is('venue/approval/*') || Request::is('venue/printing'))
        <li role="presentation"><a href="#" id="batch">Batch</a></li>
    @endif
</ul>

@if(Request::is('venue/approval/*') || Request::is('venue/printing'))
    {{--Search Form--}}
    {!! Form::open(['class'=>'navbar-form navbar-right', 'method'=>'get']) !!}
    <div class="form-group">
        {!! Form::select('column', ['name'=>'Name', 'mobile'=>'Mobile'], null, ['class'=>'form-control']) !!}
        <input type="text" name="value" class="form-control" id="navbar-search-input" placeholder="Search">
        {!! Form::submit('Search', ['class'=>'form-control btn-success']) !!}
    </div>
    {!! Form::close() !!}
    {{--End Search Form--}}
@endif