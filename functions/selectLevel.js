function populateYear(y,z){
	var y = document.getElementById(y);
	var z = document.getElementById(z);
	z.innerHTML = "";
	if(y.value == "primary"){
	var optionArray = ["| Primary Year",
                       "class 1|class 1",
                       "class 2|class 2",
                       "class 3|class 3",
                       "class 4|class 4",
                       "class 5|class 5",
                       "class 6|class 6",
                       "class 7|class 7",
                       "class 8|class 8"
                    ];
	}else if (y.value == "highschool") {
    var optionArray = ["| High School Year",
					   "form 1|form 1",
                       "form 2|form 2",
                       "form 3|form 3",
                       "form 4|form 4"
                       
                       ];
    } else{
    var optionArray = ["| College/University Year",
					   "year 1|year 1",
                       "year 2|year 2",
                       "year 3|year 3",
                       "year 4|year 4",
                       "year 5|year 5",
                       "year 6|year 6"
					   ];
    }
	
  
	for(var option in optionArray){
	    var pair = optionArray[option].split("|");
        var newOption = document.createElement("option");
        newOption.value = pair[0];
        newOption.innerHTML = pair[1];
        z.options.add(newOption);
	}
	$('select').material_select();
}
	