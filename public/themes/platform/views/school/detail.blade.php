<h1>{!! $school->name !!}</h1>

<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))

            <p class="alert alert-{{ $msg }}">{!!  Session::get('alert-' . $msg) !!} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
        @endif
    @endforeach
</div> <!-- end .flash-message -->


<div class="form-wrap">
    {!! Form::open(array('id' => 'school-form')) !!}}
        {!! Form::hidden('id', $school->id) !!}
        {!! Form::hidden('vendorID', $school->vendor_id) !!} <!--fixed -->
        {!! Form::hidden('DomainID', $school->domain_id) !!}
        {!! Form::hidden('AffiliateLocationID', $school->affiliate_location_id) !!}
        {!! Form::hidden('FormID',$school->form_id) !!}
        {!! Form::hidden('CampaignID',$school->campaign_id) !!}
        {!! Form::hidden('IsTest', 'true') !!}
        @foreach($fields as $field)
            @if($field->type == 'text')
                <div class="form-wrap form-text">
                    {!! Form::label($field->slug, $field->name) !!}
                    {!! Form::text($field->slug) !!}
                </div>
            @elseif($field->type == 'textarea')
                <div class="form-wrap form-textarea">
                    {!! Form::label($field->slug, $field->name) !!}
                    {!! Form::textarea($field->slug) !!}
                </div>
            @elseif($field->type == 'select')
                <div class="form-wrap form-select">
                    {!! Form::label($field->slug, $field->name) !!}
                    {!! Form::select($field->slug,json_decode($field->options)) !!}
                </div>
            @elseif($field->type == 'check')
                <div class="form-wrap form-check">
                    {!! Form::label($field->slug, $field->name) !!}
                    {!! Form::checkbox($field->slug,$field->optionx) !!}
                </div>
            @endif
        @endforeach
    {!! Form::submit('Submit') !!}
    {!! Form::close() !!}
</div>

<script type="text/javascript">

        $('#school-form').validate({
            rules:
                <?php echo str_replace('"','',$validation); ?>
        });


</script>

