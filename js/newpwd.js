function checkStepOne() {
	
	if ($("#origin").val() == "") {
		$("#warn1").css("display","block");
		return false;
	}else {
		$("#warn1").css("display","none");
		return true;
	};
};
function checkStepTwo() {
	if ($("#again").val() == "") {
		$("#warn2").css("display","block");
		return false;
	}else {
		$("#warn2").css("display","none");
		return true;
	};
};
function checkEq(){
	if($("#again").val() == $("#origin").val() ){
		$("#warn3").css("display","none");
		return true;
		}else{
				$("#warn3").css("display","block");
			return false;
		}
	}
function check(){
	var c1=checkStepOne();
	var c2=checkStepTwo();
	var c3=checkEq();
	return c1&&c2&&c3;
}