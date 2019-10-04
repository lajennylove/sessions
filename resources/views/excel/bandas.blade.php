<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title>Sessions</title>

</head>
<body>

<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Username</th>
            <th>Email</th>
            <th>BIO</th>
            <th>Clicks</th>
            <th>Votes</th>
            <th>Facebook</th>
            <th>Youtube</th>
            <th>Bandcamp</th>
            <th>Video</th> 
            <th>Cover</th>
        </tr>
    </thead>
    <tbody>
    @foreach($bands as $band)
        <tr>
            @if($band->name)
            <td>{{ $band->name }}</td>
            @else
            <td>NULL</td>
            @endif
            @if($band->username )
            <td>{{ $band->username }}</td>
            @else
            <td>NULL</td>
            @endif
            @if($band->email)
            <td>{{ $band->email }}</td>
            @else
            <td>NULL</td>
            @endif
            @if($band->description)
            <td>{{ $band->description }}</td>
            @else
            <td>NULL</td>
            @endif
             
            @if($band->clicks)
            <td>{{ $band->clicks }}</td>
            @else
            <td>0</td>
            @endif
            @if($band->votes)
            <td>{{ $band->votes }}</td>
            @else
            <td>0</td>
            @endif
            @if($band->facebook)
            <td>
                <a href="https://www.facebook.com/{{$band->facebook}}" target="_blank">facebook.com/{{$band->facebook}}</a>
            </td>
            @else
            <td>NULL</td>
            @endif
            @if($band->youtube)
            <td>
                <a href="{{$band->youtube}}" target="_blank">{{$band->youtube}}</a>
            </td>
            @else
            <td>NULL</td>
            @endif
            @if($band->bandcamp)
            <td><a href="https://bandcamp.com/EmbeddedPlayer/album={{$band->bandcamp}}/size=large/bgcol=333333/linkcol=e32c14/tracklist=false/artwork=none/transparent=true/">Album</a></td>
            @else
            <td>NULL</td>
            @endif
            @if($band->youtube_url)
            <td>
               <a href="{{ url($band->youtube_url) }}"> {{ url($band->youtube_url) }}</a>
            </td>
            @else
            <td>NULL</td>
            @endif
            @if($band->cover_url)
            <td><a href="https://s3.amazonaws.com/videosvansrsschilaquil/{{$band->cover_url }}">{{ $band->cover_url }}</a></td>
            @else
            <td>NULL</td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>