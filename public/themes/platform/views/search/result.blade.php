<div class="container">

@if(isset($schools) && count($schools) > 0)
    <table class="table table-striped">
        <thead>
            <tr>
                <td>School Name</td>
                <td>Zipcode</td>
                <td>Distance</td>
                <td>&nbsp;</td>
            </tr>
        </thead>
        <tbody>
@foreach($schools as $school)

            <tr>
                <td>{{ $school['name'] }}</td>
                <td>{{ $school['zipcode'] }}</td>
                <td>{{ number_format($school['distance'], 2) }}</td>
                <td><a href="{!! url("school/".$school['id']) !!}">View School</a></td>
            </tr>



@endforeach
        </tbody>
    </table>

    @else
    <h3>No Result Found. Click <a href="{{ url('search') }}">here</a> to try again.</h3>
@endif

</div>