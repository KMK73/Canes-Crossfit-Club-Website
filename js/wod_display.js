$( document ).ready(function() {

	$( "#wod_selected").change(function() {

        var wodurl = $("http://canespeak360crossfit.com/api/workouts.php?id=" + $(this).val());

        var selectValue = document.getElementById('wod_selected').text(); 
//        var selectOption = $("#daily option[value=" + selectValue + "]").text(); 		
        console.log("selectValue");
        
        $("#wod_display").hide();
		
		if (wodSelected == selectValue) {
				$("#wod_display").show();
		}

		if ( $(this).val() == 16) {
				$("#wod_display").show();
		}
		});

	});
