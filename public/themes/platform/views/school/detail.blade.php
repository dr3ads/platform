<h1>{!! $school->name !!}</h1>

<div class="form-wrap">
    {!! Form::open() !!}}
        {!! Form::hidden('id', $school->id) !!}
        @foreach($fields as $field)
            @if($field->type == 'text')
                <div class="form-wrap form-text">
                    {!! Form::label($field->slug, $field->name) !!}
                    {!! Form::text($field->slug) !!}
                </div>
            @elseif($field->type == 'textarea')
                <div class="form-wrap form-textarea">
                    {!! Form::label($field->slug, $field->name) !!}
                    {!! Form::text($field->slug) !!}
                </div>
            @elseif($field->type == 'select')
                <div class="form-wrap form-select">
                    {!! Form::label($field->slug, $field->name) !!}
                    {!! Form::select($field->slug,json_decode($field->options)) !!}
                </div>
            @endif
        @endforeach
    {!! Form::close() !!}
</div>