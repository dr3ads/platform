@foreach($schools as $school)
    <div class="school-name">{!! $school['name'] !!}</div>
    <div class="distance"></div>
    <a href="{!! url("school/".$school['id']) !!}">View School</a>
@endforeach
