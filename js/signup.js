function checkStepOne() {
	
	if ($(".usernumInput").val() == "") {
		$("#warn1").css("display","block");
		return false;
	}else {
		$("#warn1").css("display","none");
		return true;
	};
};
function checkStepTwo() {
	if ($(".useranswerInput").val() == "") {
		$("#warn2").css("display","block");
		return false;
	}else {
		$("#warn2").css("display","none");
		return true;
	};
};
function check(){
	var c1=checkStepOne();
	var c2=checkStepTwo();
return c1&&c2;
}