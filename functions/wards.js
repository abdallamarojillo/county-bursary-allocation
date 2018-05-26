function populate(s1,s2){
	var s1 = document.getElementById(s1);
	var s2 = document.getElementById(s2);
	s2.innerHTML = "";
	if(s1.value == "Bura Constituency"){
	var optionArray = ["| Bura Wards",
                       "Bangale|Bangale",
                       "Chewele / Bura|Chewele / Bura",
                       "Hirimani|Hirimani",
                       "Kamaguru|Kamaguru",
                       "Madogo South|Madogo South",
                       "Mbalambala|Mbalambala",
                       "Nanighi|Nanighi",
                       "Saka|Saka",
                       "Sala|Sala"
                    ];
	}else if (s1.value == "Galole Constituency") {
    var optionArray = ["| Galole Wards",
					   "Chewani / Kiarukungu|Chewani / Kiarukungu",
                       "Chifiri|Chifiri",
                       "Gwano|Gwano",
                       "Kinakomba|Kinakomba",
                       "Milalulu|Milalulu",
                       "Ndura|Ndura",
                       "Wayu|Wayu",
                       "Zubaki / Mikinduni|Zubaki / Mikinduni"
                       
                       ];
    }else if (s1.value == "Garsen Constituency") {
    var optionArray = ["| Garsen Wards",
                            "Assa|Assa",
                            "Bilisa|Bilisa",
                            "Garsen Central|Garsen Central",
                            "Garsen South|Garsen South",
                            "Kipini East|Kipini East",
                            "Kipini West|Kipini West",
                            "Ndera|Ndera",
                            "Salama / Mwina|Salama / Mwina",
                            "Shirikisho|Shirikisho"
					   ];
    }
	
  
	for(var option in optionArray){
	    var pair = optionArray[option].split("|");
        var newOption = document.createElement("option");
        newOption.value = pair[0];
        newOption.innerHTML = pair[1];
        s2.options.add(newOption);
	}
    $('select').material_select();
}
	