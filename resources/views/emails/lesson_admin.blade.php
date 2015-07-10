<p>Dear admin,</p>
<p>The following person has submitted an email through yogaground.com</p>
<p>Name : {{$name}}<br>
    Email: {{$email}}<br>
    Lesson signup details:<br><br>
    </p>

    <table >
    @foreach($request as $name=>$field)
        <tr>
            <td>{{$name}}</td>
            <td>{{$field}}</td>
        </tr>
    @endforeach

</table>

<p>Yogaground Admin </p>
