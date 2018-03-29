<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Danh sách thể loại</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{!! asset('css/font-awesome.min.css') !!}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.7/angular.min.js"></script>
</head>

<body>
<div class="container" ng-app="showlist" ng-controller="dstheloaiController">
    <h2 class="text-center mt-3 mb-5">Danh sách thể loại</h2>
    <table class="table table-striped table-bordered">
        <thead class="text-center">
        <th>STT</th>
        <th>Tên thể loại</th>
        <th>Trạng thái</th>
        <th>
            <span><i class="fa fa-cog text-muted" </span>
        </th>
        </thead>
        <tbody>
        <tr ng-repeat="item in theloai">
            <td class="text-center">@{{ item.stt }}</td>
            <td>@{{ item.name }}</td>
            <td class="text-center" ng-if="item.trangThai==1">
                <span><i class="fa fa-check-circle text-success"></i></span>
            </td>

            <td class="text-center" ng-if="item.trangThai==0">
                <span><i class="fa fa-times-circle text-danger"></i></span>
            </td>
            <td class="text-center">
                <button class="btn btn-sm bg-transparent btn-hov"><i class="fa fa-edit text-success"></i></button>|
                <button class="btn btn-sm bg-transparent btn-hov"><i class="fa fa-trash text-danger"></i></button>
            </td>
        </tr>
        </tbody>
    </table>
</div>

<script>
    var app = angular.module("showlist", []);
    app.controller("dstheloaiController", function ($scope) {
        $scope.theloai = [{stt: '1', name: 'Truyện ngắn', trangThai: '1'},
            {stt: '2', name: 'Truyện dài', trangThai: '1'},
            {stt: '3', name: 'Tiểu thuyết', trangThai: '0'},
            {stt: '4', name: 'Sách thông minh', trangThai: '1'},
            {stt: '5', name: 'Tạp chí', trangThai: '0'},
            {stt: '6', name: 'Bài báo khoa học', trangThai: '0'}];
    });
</script>
</body>
</html>
