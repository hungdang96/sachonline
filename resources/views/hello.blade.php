<html>
    <head>
        <title>Hello!</title>
        <meta charset="utf-8">
        <!-- Fonts -->
        {{--<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">--}}
        {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">--}}
        {{--<link rel="stylesheet" href="{!! asset('css/app.css') !!}">--}}
        {{--<link rel="stylesheet" href="{!! asset('css/font-awesome.min.css') !!}">--}}
        {{--<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>--}}
        {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
        {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>--}}
        {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>--}}
        {{--<script src="{!! asset('js/app.js') !!}"></script>--}}
    </head>
    <body>
        {{--<p>Hello {{$hoten}}!<br>--}}
            {{--Your email: {{$email}} - Your phone: {{$phone}} !</p>--}}
        <table border=1 cellpadding="5" style="text-align: center;">
            <tr>
                <td>STT</td>
                <td>Họ tên</td>
                <td>Email</td>
                <td>Số điện thoại</td>
            </tr>
            <tr>
                <td> </td>
                <td>{{$hoten}}</td>
                <td> {{$email}}</td>
                <td> {{$phone}}</td>
            </tr>
        </table>
    </body>
</html>