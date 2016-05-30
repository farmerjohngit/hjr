var myAppController = angular.module("myApp",[]);
myAppController.controller('userCenter', function($scope,$http) {
	$scope.clicknum = function(num) {
		var thenum = "num"+ num;
		if ($("."+ thenum).css("display") == "none") {
			$("."+ thenum).css("display","block");
		}else {
			$("."+ thenum).css("display","none");
		}
	};
	$scope.getDetail = function(time,state) {
		if (state) {
			var homeDetailPath = "interface/usercenter/getHomeworkDetail.php?addtime=" + time + "&studentnum=" + $(".usernum").val();
			$http.get(homeDetailPath).success(function(data) {
				console.log(data);
				$scope.teacherName = data[0].teachername;
				$scope.submitTime = data[0].submittime.substr(0,4) +"年"+ data[0].submittime.substr(4,2) +"月"+ data[0].submittime.substr(6,2) +"日";
				$scope.state = data[0].score ? "已批改" : "已提交";
				$scope.score = data[0].score ? data[0].score : "--";
				$scope.notes = data[0].notes ? data[0].notes : "无";
			});
		}else {
			$scope.teacherName = "--";
			$scope.submitTime = "--";
			$scope.state = "未提交";
			$scope.score = "--";
			$scope.notes = "--";
		}
		$scope.homeworkTime = time.toString().substr(0,4) +"年"+ time.toString().substr(4,2) +"月"+ time.toString().substr(6,2) +"日";
		$(".homeworkDetailBg").css("display","block");
	};
	$scope.submitHomework = function(time,state) {//显示提交作业弹窗
		if (!state) {
			$(".homeworkTime").val(time);
			$(".addHomeworkBg").css("display","block");
		}
	}
});
$(document).ready(function() {
	var a = $(".jump").val();
	switch (a)
	{
	case ("1"):
		$(".menuNum").removeClass("leftMenuFocus");
		$("#menuNo1").addClass("leftMenuFocus");
		$(".usercenterIndex").css("display","block");
		$(".collection").css("display","none");
		$(".homeworkAndTeacher").css("display","none");
		$(".testRecord").css("display","none");
		$(".accountSetting").css("display","none");
		break;
	case ("2"):
		$(".menuNum").removeClass("leftMenuFocus");
		$("#menuNo2").addClass("leftMenuFocus");
		$(".usercenterIndex").css("display","none");
		$(".collection").css("display","block");
		$(".homeworkAndTeacher").css("display","none");
		$(".testRecord").css("display","none");
		$(".accountSetting").css("display","none");
		break;
	case ("3"):
		$(".menuNum").removeClass("leftMenuFocus");
		$("#menuNo3").addClass("leftMenuFocus");
		$(".usercenterIndex").css("display","none");
		$(".collection").css("display","none");
		$(".homeworkAndTeacher").css("display","block");
		$(".testRecord").css("display","none");
		$(".accountSetting").css("display","none");
		break;
	case ("4"):
		$(".menuNum").removeClass("leftMenuFocus");
		$("#menuNo4").addClass("leftMenuFocus");
		$(".usercenterIndex").css("display","none");
		$(".collection").css("display","none");
		$(".homeworkAndTeacher").css("display","none");
		$(".testRecord").css("display","block");
		$(".accountSetting").css("display","none");
		break;
	case ("5"):
		$(".menuNum").removeClass("leftMenuFocus");
		$("#menuNo5").addClass("leftMenuFocus");
		$(".usercenterIndex").css("display","none");
		$(".collection").css("display","none");
		$(".homeworkAndTeacher").css("display","none");
		$(".testRecord").css("display","none");
		$(".accountSetting").css("display","block");
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
			$(".collection").css("display","none");
			$(".homeworkAndTeacher").css("display","none");
			$(".testRecord").css("display","none");
			$(".accountSetting").css("display","none");
			break;
		case ("2"):
			$(".usercenterIndex").css("display","none");
			$(".collection").css("display","block");
			$(".homeworkAndTeacher").css("display","none");
			$(".testRecord").css("display","none");
			$(".accountSetting").css("display","none");
			break;
		case ("3"):
			$(".usercenterIndex").css("display","none");
			$(".collection").css("display","none");
			$(".homeworkAndTeacher").css("display","block");
			$(".testRecord").css("display","none");
			$(".accountSetting").css("display","none");
			break;
		case ("4"):
			$(".usercenterIndex").css("display","none");
			$(".collection").css("display","none");
			$(".homeworkAndTeacher").css("display","none");
			$(".testRecord").css("display","block");
			$(".accountSetting").css("display","none");
			break;
		case ("5"):
			$(".usercenterIndex").css("display","none");
			$(".collection").css("display","none");
			$(".homeworkAndTeacher").css("display","none");
			$(".testRecord").css("display","none");
			$(".accountSetting").css("display","block");
			break;
		};
		
	});
	$(".category").click(function() {//右边收藏类型点击切换执行
		$(".category").removeClass("categoryOn");
		$(this).addClass("categoryOn");
		var id = $(this).attr("id");
	});
	$(".classCollection").mouseover(function() {
		$(this).css("box-shadow","1px 1px 1px #888888");
	});
	$(".classCollection").mouseout(function() {
		$(this).css("box-shadow","none");
	});
	$(".close").click(function() {
		$(".addHomeworkBg").css("display","none");
		$(".homeworkDetailBg").css("display","none");
	})
});