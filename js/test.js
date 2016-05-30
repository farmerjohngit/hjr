var myAppController = angular.module("test",[]);
myAppController.controller('testController', function($scope,$http) {
	$scope.singleSelectTestNum = 10;
	$scope.multipleSelectTestNum = 0;
	$scope.trueOrFalseNum = 5;
	$scope.setTest = function(testCategory, singleSelectTestNum, multipleSelectTestNum, trueOrFalseNum) {
		var category = testCategory ? testCategory : "";
		var testpath = "interface/test/getTestList.php?testCategory=" + category + "&single=" + singleSelectTestNum + "&multiple=" + multipleSelectTestNum + "&tf=" + trueOrFalseNum;
		console.log(testpath);
		$http.get(testpath).success(function(data) {
			console.log(data);
		});
	};
});
function adddate() {
	var thedate = new Date();
	var year = thedate.getYear();
		year = year + 1990;
	var month = thedate.getMonth()+1;
	if (month <= 9) {
		month = month.toString();
		month = 0 + month;
	};
	var day = thedate.getDate();
	if (day <= 9) {
		day = day.toString();
		day = 0 + day;
	};
	var hour = thedate.getHours();
	if (hour <= 9) {
		hour = hour.toString();
		hour = 0 + hour;
	};
	var minute = thedate.getMinutes();
	if (minute <= 9) {
		minute = minute.toString();
		minute = 0 + minute;
	};
	var second = thedate.getSeconds();
	if (second <= 9) {
		second = second.toString();
		second = 0 + second;
	};
	var datenow = year + month + day + hour + minute + second;
	$(".submitTestTime").val(datenow);
};