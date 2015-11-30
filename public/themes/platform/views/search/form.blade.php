@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{!! Form::open(array('url' => 'search', 'target' => '_new')) !!}
    {!! Form::label('zipcode','Zipcode') !!}
    {!! Form::text('zipcode') !!}
    {!! Form::submit('Submit') !!}
{!! Form::close() !!}