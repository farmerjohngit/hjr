$(document).ready(function () {
	$(".loginOrsignup").click(function () {//登陆/注册按下触发
		$(".loginBg").css("display", "block");
		$(".classVideo").css("display", "none");

	});
	$(".loginBg").click(function () {
		$(this).css("display", "none");
		$(".classVideo").css("display", "block");
	});
	$(".closeTheDiv > img").click(function () {
		$(".loginBg").css("display", "none");
		$(".classVideo").css("display", "block");
	});
	$(".loginAndSignup").click(function (event) {//防止事件冒泡
		event.stopPropagation();
	});
});
function check() {
	if ($(".userName > input").val() == "") {
		$(".accountWarn").css("display", "block");
		$(".userName > input").focus();
		return false;
	}
	else if ($(".userPwd > input").val() == "") {
		$(".passwordWarn").css("display", "block");
		$(".userPwd > input").focus();
		return false;
	}
	else {
		$(".accountWarn").css("display", "none");
		$(".passwordWarn").css("display", "none");
		return true;
	}
};
