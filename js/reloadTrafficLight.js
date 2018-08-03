//******************** Reload the Traffic light section*/
$(document).ready(function(){
	ReloadTrafficLight();
});
$(document).ready(function(){
	//ReloadTrafficLight();
	setInterval(ReloadTrafficLight,5000);
});
function ReloadTrafficLight(){
	var values = {
		"_idUser" : $("#_idUser").val(),
		"_areaUser" : $("#_areaUser").val(),
		"_rolUser" : $("#_rolUser").val()
	};
	//console.log(values);
	$.ajax({
		type: "POST",
		url: "../ajax/ajaxTrafficLight.php",
		data: values,
		success:  function (response) {
			$("#trafficLight").html(response);
		}
	});
}