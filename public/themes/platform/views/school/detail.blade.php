<h1>{!! $school->name !!}</h1>

<div class="form-wrap">
    {!! Form::open(array('id' => 'school-form','url' => 'http://webservices.keypathpartners.com/ILM/default.ashx?IsTestLead=true','method' => 'get')) !!}}
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
                    {!! Form::text($field->slug) !!}
                </div>
            @elseif($field->type == 'select')
                <div class="form-wrap form-select">
                    {!! Form::label($field->slug, $field->name) !!}
                    {!! Form::select($field->slug,json_decode($field->options)) !!}
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

