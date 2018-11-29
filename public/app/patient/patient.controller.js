patient.controller('PatientController', PatientController);

function PatientController($scope, $http) {
    console.log('yes');
    $http
        .get(window.location.origin + "/api/test-category", {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){

            test_category = response.data.tests;
            test_name = response.data.test_name;
            body_part = response.data.body_part;
            $scope.dis = [];
            $scope.dis[0] = 0;


            $('#test_category_id').kendoDropDownList({
                optionLabel   : "Select Item",
                dataTextField: "text",
                dataValueField: "value",
                dataSource: test_category,
                dataType: "jsonp",
                filter: "contains",
                index: 0
            });

            /*$('#test_name_0').kendoDropDownList({
                dataTextField: "text",
                dataValueField: "value",
                dataSource: test_name,
                dataType: "jsonp",
                filter: "contains",
                index: 0
            });

            $('#body_part_0').kendoDropDownList({
                dataTextField: "text",
                dataValueField: "value",
                dataSource: body_part,
                dataType: "jsonp",
                filter: "contains",
                index: 0
            });*/

            var dropdownlist = $("#body_part_0").data("kendoDropDownList");
            dropdownlist.value(16);

        });

    $scope.patients = [];

    $scope.Append   =   function () {
        $scope.patients.push($scope.patients.length);
        var i = $scope.patients.length;

        $http
            .get(window.location.origin + "/api/test-category", {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined, 'Process-Data': false}
            })
            .then(function(response){

                test_category = response.data.test_category;
                test_name = response.data.test_name;
                body_part = response.data.body_part;
                $scope.dis = [];
                $scope.dis[0] = 0;


                $('#test_category_id_' +i).kendoDropDownList({
                    optionLabel   : "Select Item",
                    dataTextField: "text",
                    dataValueField: "value",
                    dataSource: test_category,
                    dataType: "jsonp",
                    filter: "contains",
                    index: 0
                });

                /*$('#test_name_' +i).kendoDropDownList({
                    dataTextField: "text",
                    dataValueField: "value",
                    dataSource: test_name,
                    dataType: "jsonp",
                    filter: "contains",
                    index: 0
                });

                $('#body_part_' +i).kendoDropDownList({
                    dataTextField: "text",
                    dataValueField: "value",
                    dataSource: body_part,
                    dataType: "jsonp",
                    filter: "contains",
                    index: 0
                });*/

                var dropdownlist = $("#body_part_" +i).data("kendoDropDownList");
                dropdownlist.value(16);

            });
    }

/*
    $scope.getTestCategory = function (index) {

        var test_category_id_ = $("#test_category_id_" + index).data("kendoDropDownList").value();
        $http
            .get(window.location.origin + "/api/test-category/" + test_category_id_, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined, 'Process-Data': false}
            })
            .then(function(response){

                $scope.discount[index]  = 0;
                $scope.dis[index]       = 0;
                item_rate           = response.data.item_rate;
                item_type           = response.data.item_type;

                if(response.data.item_type == 2)
                {
                    $scope.truefalse[index] = true;
                    $scope.quantity[index] = 1;
                }
                else
                {
                    $scope.truefalse[index] = false;
                }
                if(response.data.discount){
                    $scope.discount[index]=response.data.discount.amount;
                    $scope.dis[index]     =response.data.discount.type;
                }

                $scope.rate[index] = item_rate;

            })
            .finally(function () {
                $scope.calculateInvoice();
            });
    }
*/






}