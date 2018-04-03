<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Danh sách thể loại</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{!! asset('css/font-awesome.min.css') !!}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.7/angular.min.js"></script>
    <script src="{!! asset('js/app.js') !!}"></script>
    <style type="text/css">
        .btn:focus{
            box-shadow: none;
        }
    </style>
</head>

<body ng-app="dataApp" ng-controller="dataExcuteController">
<div class="container">
    <h2 class="text-center mt-3 mb-5">Danh sách thể loại</h2>
    <div class="navbar navbar-expand-md navbar-dark mb-4">
        <div class="col-4 text-center">
            <button class="btn btn-sm btn-success text-white" data-toggle="modal" data-target="#addForm"><i class="fa fa-plus-circle"></i> Thêm thể loại</button>
        </div>
        <div class="col-8 text-center">
            <form class="form-inline">
                <input class="form-control form-control-sm mr-2 w-50" type="text" placeholder="Thể loại bạn muốn tìm.."
                       aria-label="Search">
                <button class="btn btn-sm" style="width: 10%!important;"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
    <table class="table table-striped table-bordered">
        <thead class="text-center">
        <th>STT</th>
        <th>Tên thể loại</th>
        <th>Trạng thái</th>
        <th>
            <span><i class="fa fa-cog text-muted"></i></span>
        </th>
        </thead>
        <tbody>
        <tr ng-repeat="item in theloai">
            <td class="text-center">@{{ item.tl_ma }}</td>
            <td>@{{ item.tl_ten }}</td>
            <td class="text-center" ng-if="item.tl_trangThai==1">
                <span><i class="fa fa-check-circle text-success"></i></span>
            </td>

            <td class="text-center" ng-if="item.tl_trangThai==0">
                <span><i class="fa fa-times-circle text-danger"></i></span>
            </td>
            <td class="text-center">
                <button type="button" class="btn btn-sm btn-success text-white mr-3 pt-0 pl-2 pr-2" data-toggle="modal" data-target="#editForm" ng-click="edittheloai($index)"><i class="fa fa-edit"></i></button>
                <button type="button" class="btn btn-sm btn-danger text-white pt-0 pl-2 pr-2" ng-click="removetheloai($index)"><i class="fa fa-trash"></i></button>
            </td>
        </tr>
        </tbody>
    </table>
</div>

{{--Add new record Modal--}}
<div class="modal fade mt-5" id="addForm" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #314fc6;">
                <div class="col-md-11 text-center text-white">
                    <h5 class="mb-0"><i class="fa fa-plus-circle"></i> Add new record</h5>
                </div>
                <div class="col-md-1 text-right mt-0">
                    <button type="button" id="closebtn" class="close text-white" data-dismiss="modal"><i
                                class="fa fa-close"></i></button>
                </div>
            </div>
            <div class="modal-body bg-light">
                <div class="container">
                    <form>
                        <div class="form-group">
                            <label for="nametl">Tên thể loại:</label>
                            <input type="text" id="addname" ng-model="addName" class="form-control" name="nametl" placeholder="Nhập tên thể loại">
                        </div>
                        <div class="form-group">
                            <label>Trạng thái:</label>
                            <label class="radio-inline ml-1 mr-3"><input type="radio" ng-model="addstt" value="0" id="addstt0" name="stt"><i class="fa fa-times-circle text-danger pl-1"></i></label>
                            <label class="radio-inline"><input type="radio" ng-model="addstt" id="addstt1" value="1" name="stt"><i class="fa fa-check-circle text-success pl-1"></i></label>
                        </div>
                        <hr>
                        <div class="form-group text-center">
                            <button type="button" id="addbtn" ng-click="addtheloai()" class="btn btn-sm btn-success text-white mr-2"><i class="fa fa-check-circle"></i> Thêm</button>
                            <button type="reset" class="btn btn-sm btn-warning text-white mr-2"><i class="fa fa-refresh"></i> Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{--End of add modal--}}

{{--Edit modal--}}
<div class="modal fade mt-5" id="editForm" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #314fc6;">
                <div class="col-md-11 text-center text-white">
                    <h5 class="mb-0"><i class="fa fa-plus-circle"></i> Edit record</h5>
                </div>
                <div class="col-md-1 text-right mt-0">
                    <button type="button" id="closebtn" class="close text-white" data-dismiss="modal"><i
                                class="fa fa-close"></i></button>
                </div>
            </div>
            <div class="modal-body bg-light">
                <div class="container">
                    <form>
                        <div class="form-group">
                            <label for="nametl">STT:</label>
                            <input type="text" ng-model="editid" class="form-control w-25 text-center" name="idtl" disabled>
                        </div>
                        <div class="form-group">
                            <label for="nametl">Tên thể loại:</label>
                            <input type="text" ng-model="editName" class="form-control" name="nametl" placeholder="Nhập tên thể loại">
                        </div>
                        <div class="form-group">
                            <label for="tt">Trạng thái:</label>
                            <label class="radio-inline ml-1 mr-3"><input type="radio" ng-model="edittt" ng-value="0" name="stt" ng-checked="edittt==0"><i class="fa fa-times-circle text-danger pl-1"></i></label>
                            <label class="radio-inline"><input type="radio" ng-model="edittt" ng-value="1" ng-checked="edittt==1"><i class="fa fa-check-circle text-success pl-1"></i></label>
                        </div>
                        <hr>
                        <div class="form-group text-center">
                            <button type="button" ng-click="updatetheloai()" class="btn btn-sm btn-success text-white mr-2"><i class="fa fa-pencil-square-o"></i> Sửa</button>
                            <button type="button" data-dismiss="modal" class="btn btn-sm btn-danger text-white mr-2"><i class="fa fa-times"></i> Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{--End of edit modal--}}

<script src="{!!asset('js/showlist.js')!!}"></script>
{{--<script type="application/javascript">--}}
    {{--$(document).ready(function () {--}}
        {{--$('#addbtn').prop('disabled', true);--}}
        {{--$('#addname').keyup(function() {--}}
            {{--if($(this).val() != '')--}}
            {{--{--}}
                {{--$('#addbtn').prop('disable', false);--}}
            {{--}--}}
            {{--else--}}
            {{--{--}}
                {{--$('#addbtn').prop('disabled', true);--}}
            {{--}--}}
        {{--});--}}
    {{--});--}}
{{--</script>--}}
</body>
</html>
