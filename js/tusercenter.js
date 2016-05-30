var myAppController = angular.module("tUserCenter",[]);
myAppController.controller('tUserCenterController', function($scope,$http) {
	$scope.pagename = "homeworkList";
	(function() {
		var homeworkListPath = "interface/tusercenter/getHomeworkList.php?teachernum=" + $(".teachernum").val();
		$http.get(homeworkListPath).success(function(data) {
			$scope.yourHomeworkList = data;
			for (var i = 0;i < data.length;i++) {
				data[i].time = data[i].addtime.substr(0,4) + "年" + data[i].addtime.substr(4,2) + "月" + data[i].addtime.substr(6,2) + "日";
			}
		});
	})();
	function reload(select) {
		var homeworkDetailsPath = "interface/tusercenter/getHomeworkDetails.php?addtime=" + $scope.yourHomeworkList[select].addtime + "&teachernum=" + $(".teachernum").val();
		$http.get(homeworkDetailsPath).success(function(data) {
			$scope.homeworkDetails = data;
			for (var i = 0;i < data.length;i++) {
				data[i].state = data[i].score ? "已批阅" : "未批阅";
				data[i].grade = data[i].score ? data[i].score : "--";
			}
		});
	}
	$scope.homeworkDetails = function(select) {
		$scope.pagename = "homeworkDetails";
		reload(select);
		$scope.selectedHomework = select;
	};
	$scope.giveScore = function(state,message) {
		if (state == "未批阅") {
			$(".giveScoreBg").css("display","block");
			$scope.homeworkMessage = message;
		}
	};
	$scope.changeScore = function(score) {
		if (score) {
			var changeScorePath = "interface/tusercenter/giveScore.php?homeworktime=" + $scope.homeworkMessage.homeworktime + "&teachernum=" + $scope.homeworkMessage.teachernum + "&studentnum=" + $scope.homeworkMessage.studentnum + "&score=" + score;
			$http.get(changeScorePath).success(function() {
				$(".giveScoreBg").css("display","none");
			});
		}else {
			alert("评分不能为空!");
		}
	};
});
$(document).ready(function() {
	var a = $(".jump").val();
	switch (a)
	{
	case ("1"):
		$(".menuNum").removeClass("leftMenuFocus");
		$("#menuNo1").addClass("leftMenuFocus");
		$(".usercenterIndex").css("display","block");
		$(".studentState").css("display","none");
		$(".homework").css("display","none");
		$(".testRecord").css("display","none");
		break;
	case ("2"):
		$(".menuNum").removeClass("leftMenuFocus");
		$("#menuNo2").addClass("leftMenuFocus");
		$(".usercenterIndex").css("display","none");
		$(".studentState").css("display","block");
		$(".homework").css("display","none");
		$(".testRecord").css("display","none");
		break;
	case ("3"):
		$(".menuNum").removeClass("leftMenuFocus");
		$("#menuNo3").addClass("leftMenuFocus");
		$(".usercenterIndex").css("display","none");
		$(".studentState").css("display","none");
		$(".homework").css("display","block");
		$(".testRecord").css("display","none");
		break;
	case ("4"):
		$(".menuNum").removeClass("leftMenuFocus");
		$("#menuNo4").addClass("leftMenuFocus");
		$(".usercenterIndex").css("display","none");
		$(".studentState").css("display","none");
		$(".homework").css("display","none");
		$(".testRecord").css("display","block");
		break;
	};
	$(".menuNum").click(function() {//左边菜单点击切换执行
		var id = $(this).attr("id").replace(/[^0-9]/ig,"");
		$(".menuNum").removeClass("leftMenuFocus");
		$(this).addClass("leftMenuFocus");
		switch (id)
		{
		case ("1"):
			$(".usercenterIndex").css("display","block");
			$(".studentState").css("display","none");
			$(".homework").css("display","none");
			$(".testRecord").css("display","none");
			break;
		case ("2"):
			$(".usercenterIndex").css("display","none");
			$(".studentState").css("display","block");
			$(".homework").css("display","none");
			$(".testRecord").css("display","none");
			break;
		case ("3"):
			$(".usercenterIndex").css("display","none");
			$(".studentState").css("display","none");
			$(".homework").css("display","block");
			$(".testRecord").css("display","none");
			break;
		case ("4"):
			$(".usercenterIndex").css("display","none");
			$(".studentState").css("display","none");
			$(".homework").css("display","none");
			$(".testRecord").css("display","block");
			break;
		case ("5"):
			$(".usercenterIndex").css("display","none");
			$(".studentState").css("display","none");
			$(".homework").css("display","none");
			$(".testRecord").css("display","none");
			break;
		};
	});
	$(".myClass > span").click(function() {
		var id = $(this).attr("id").replace(/[^0-9]/ig,"");
		if ($("#" + id).css("display") == 'none') {
			$("#" + id).css("display","block");
		}else{
			$("#" + id).css("display","none");
		};
	});
	$(".addClass").click(function() {
		if ($(".addForm").css("display") == 'none') {
			$(".addForm").css("display","block");
			$(".addClass").val("取消添加");
		}else{
			$(".addForm").css("display","none");
			$(".addClass").val("添加班级");
		};
	});
	$(".addHomework").click(function() {
		if ($(".addMes").css("display") == 'none') {
			$(".addMes").css("display","block");
			$(".addHomework").val("取消添加");
		}else{
			$(".addMes").css("display","none");
			$(".addHomework").val("添加作业");
		};
	});
});
function checkAddClass() {
	if ($(".classname").val() == "") {
		alert("请输入班级名称");
		return false;
	}else if ($(".classcategory").val() == "") {
		alert("请输入课程名称,这是您以后寻找该班级的依据");
		return false;
	};
}

