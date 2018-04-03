var app = angular.module("dataApp", []);
app.controller("dataExcuteController", function ($scope, $window,$http) {
    $http.get('http://localhost:8080/sachonline/public/administrator/theloai/dstheloai').then(function (response) {
        $scope.theloai = response.data.message.ds_theloai;
        $scope.isLoading = false;
    });
    
    // Add theloai function
    $scope.addtheloai = function () {
        //Add a new item to the array
        var newtheloai = {
            stt: $scope.theloai.length+1,
            name: $scope.addName,
            trangThai: $scope.addstt
        };

        //Push new theloai into the json object.
        $scope.theloai.push(newtheloai);
        $scope.addName = '';
        $scope.addstt = '';
    };

    // Edit theloai function
    $scope.edittheloai = function (index) {
        var stt = $scope.theloai[index].stt;
        var name = $scope.theloai[index].name;
        var tt = $scope.theloai[index].trangThai;
        $scope.editid = stt;
        $scope.editName = name;
        $scope.edittt = tt;
    };

    // Update theloai function
    $scope.updatetheloai = function () {
        angular.forEach($scope.theloai, function(value, key){
            if (value.stt == $scope.editid){
                if ($window.confirm("Do you want to modify '" + value.name + "'?")){
                    value.name = $scope.editName;
                    value.trangThai = $scope.edittt;
                    this.save();
                }
            }
        });
    };

    // Delete theloai function
    $scope.removetheloai = function (index) {
        //Find the record using index from array
        var name = $scope.theloai[index].name;
        if ($window.confirm("Do you want to remove " + name + "?")){
            //Remove theloai
            $scope.theloai.splice(index, 1);
        }
    };

});