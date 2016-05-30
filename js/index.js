$(window).resize(function () {
	if (document.body.clientWidth <= 1060) {
		$(".asideMenu0").css("right", "0px");
	};
	if (document.body.clientWidth > 1060) {
		var i = (document.body.clientWidth - 1060) / 2 + 'px';
		$(".asideMenu0").css("right", i);
	};
});//侧边菜单自适应

var flagTopArr = new Array();
//获取控件上绝对位置
function getAbsoluteTop(objectId) {


	return oTop
}

$(document).ready(function () {

	var i = 0;
	while (true) {
		var ele = $("#sideBarFlag" + i);
		if (ele.length == 0) {
			break;
		}
		var flagObj = ele[0];
		var oTop = flagObj.offsetTop;
		while (flagObj.offsetParent != null) {
			var oParent = flagObj.offsetParent
			oTop += oParent.offsetTop
			flagObj = oParent
		}

		$('.asideMenu' + (i + 1)).val(oTop);
		flagTopArr.push(oTop);
		i++;
	}


	$(".submitSearch").mouseover(function () {
		$(this).attr('src', 'image/index/searchForOn.png');
	});
	$(".submitSearch").mouseout(function () {//鼠标悬停切换搜索图片
		$(this).attr('src', 'image/index/searchFor.png');
	});
	if (document.body.clientWidth <= 1060) {//侧边菜单自适应
		$(".asideMenu0").css("right", "0px");
	};
	if (document.body.clientWidth > 1060) {//侧边菜单自适应
		var i = (document.body.clientWidth - 1060) / 2 + 'px';
		$(".asideMenu0").css("right", i);
	};
	$(".asideMenu").mouseover(function () {//侧边菜单鼠标悬停颜色改变
		$(this).removeClass("backToTop");
		$(this).addClass("asideMenuMouseOn");
	});
	$(".asideMenu").mouseout(function () {
		$(".asideMenu11").addClass("backToTop");
		$(this).removeClass("asideMenuMouseOn");
	});
	$(".asideMenu").click(function () {//侧边菜单点击滑动
		var i = $(this).val();
		$("html, body").animate({ scrollTop: i + "px" }, 0);
	});
	$(".titleHeaderMenu > input").click(function () {//标题菜单点击执行
		var i = $(this).attr("id").replace(/[^0-9]/ig, "");
		var p = $(this).attr("id").replace(/[^a-z]/ig, "");
		if (p == 'theNewestClass') {
			$("#" + 'top10Click' + i).css("display", "none");
			$("#" + 'top10Newest' + i).css("display", "block");
		} else if (p == 'theMostPopular') {
			$("#" + 'top10Click' + i).css("display", "block");
			$("#" + 'top10Newest' + i).css("display", "none");
		};
		$("#" + 'theNewestClass' + i).removeClass("menuOn");
		$("#" + 'theNewestClass' + i).removeClass("menuFocus");
		$("#" + 'theMostPopular' + i).removeClass("menuOn");
		$("#" + 'theMostPopular' + i).removeClass("menuFocus");
		$(this).addClass("menuFocus");
	});
	$(".titleHeaderMenu > input").mouseover(function () {
		$(this).removeClass("buttonBg");
		$(".titleHeaderMenu > input : not(.menuFocus)").addClass("menuOn");
	});
	$(".titleHeaderMenu > input").mouseout(function () {
		$(this).removeClass("menuOn");
		$(this).addClass("buttonBg");
	});
	$(".getMoreClass > input").mouseover(function () {
		$(this).css("color", "#00A1D6");
	});
	$(".getMoreClass > input").mouseout(function () {
		$(this).css("color", "#000000");
	});
});
$(window).scroll(function () {//侧边菜单高亮

	var m = window.pageYOffset + 130;

	var endpos = flagTopArr.length - 1;

	if (m <= flagTopArr[0]) {

		$(".asideMenu1").removeClass("asideMenuOn");
	} else if (m >= flagTopArr[endpos]) {

		$(".asideMenu" + (endpos + 1)).removeClass("asideMenuMouseOn");
		$(".asideMenu" + (endpos + 1)).siblings(".asideMenu").removeClass("asideMenuOn");
		$(".asideMenu" + (endpos + 1)).addClass("asideMenuOn");
	} else {

		for (var i = 0; i < flagTopArr.length - 1; i++) {
			if (m >= flagTopArr[i] && m < flagTopArr[i + 1]) {

				$(".asideMenu" + (i + 1)).removeClass("asideMenuMouseOn");
				$(".asideMenu" + (i + 1)).siblings(".asideMenu").removeClass("asideMenuOn");
				$(".asideMenu" + (i + 1)).addClass("asideMenuOn");

			}
		}
	}


	// if (m <= 481) {
	// 	$(".asideMenu1").removeClass("asideMenuOn");
	// }
	// if (m >= 481 && m < 921) {
	// 	$(".asideMenu1").removeClass("asideMenuMouseOn");
	// 	$(".asideMenu1").siblings(".asideMenu").removeClass("asideMenuOn");
	// 	$(".asideMenu1").addClass("asideMenuOn");
	// }
	// if (m >= 921 && m < 1361) {
	// 	$(".asideMenu2").removeClass("asideMenuMouseOn");
	// 	$(".asideMenu2").siblings(".asideMenu").removeClass("asideMenuOn");
	// 	$(".asideMenu2").addClass("asideMenuOn");
	// }
	// if (m >= 1361 && m < 1801) {
	// 	$(".asideMenu3").removeClass("asideMenuMouseOn");
	// 	$(".asideMenu3").siblings(".asideMenu").removeClass("asideMenuOn");
	// 	$(".asideMenu3").addClass("asideMenuOn");
	// }
	// if (m >= 1801 && m < 2241) {
	// 	$(".asideMenu4").removeClass("asideMenuMouseOn");
	// 	$(".asideMenu4").siblings(".asideMenu").removeClass("asideMenuOn");
	// 	$(".asideMenu4").addClass("asideMenuOn");
	// }
	// if (m >= 2241 && m < 2681) {
	// 	$(".asideMenu5").removeClass("asideMenuMouseOn");
	// 	$(".asideMenu5").siblings(".asideMenu").removeClass("asideMenuOn");
	// 	$(".asideMenu5").addClass("asideMenuOn");
	// }
	// if (m >= 2681 && m < 3121) {
	// 	$(".asideMenu6").removeClass("asideMenuMouseOn");
	// 	$(".asideMenu6").siblings(".asideMenu").removeClass("asideMenuOn");
	// 	$(".asideMenu6").addClass("asideMenuOn");
	// }
	// if (m >= 3121 && m < 3561) {
	// 	$(".asideMenu7").removeClass("asideMenuMouseOn");
	// 	$(".asideMenu7").siblings(".asideMenu").removeClass("asideMenuOn");
	// 	$(".asideMenu7").addClass("asideMenuOn");
	// }
	// if (m >= 3561 && m < 4001) {
	// 	$(".asideMenu8").removeClass("asideMenuMouseOn");
	// 	$(".asideMenu8").siblings(".asideMenu").removeClass("asideMenuOn");
	// 	$(".asideMenu8").addClass("asideMenuOn");
	// }
	// if (m >= 4001 && m < 4441) {
	// 	$(".asideMenu9").removeClass("asideMenuMouseOn");
	// 	$(".asideMenu9").siblings(".asideMenu").removeClass("asideMenuOn");
	// 	$(".asideMenu9").addClass("asideMenuOn");
	// }
	// if (m >= 4441) {
	// 	$(".asideMenu10").removeClass("asideMenuMouseOn");
	// 	$(".asideMenu10").siblings(".asideMenu").removeClass("asideMenuOn");
	// 	$(".asideMenu10").addClass("asideMenuOn");
	// }
});
