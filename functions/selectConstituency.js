function populate(s1,s2){
	var s1 = document.getElementById(s1);
	var s2 = document.getElementById(s2);
	s2.innerHTML = "";
	if(s1.value == "Mombasa"){
	var optionArray = ["| Mombasa Constituencies",
                       " Changamwe|Changamwe",
                       "Jomvu|Jomvu",
                       "Kisauni|Kisauni",
                       "Nyali|Nyali",
                       "Likoni|Likoni",
                       "Mvita|Mvita"
                    ];
	}else if (s1.value == "Kwale") {
    var optionArray = ["| Kwale Constituencies",
					   "Msambweni|Msambweni",
                       "Lunga Lunga|Lunga Lunga",
                       "Matuga|Matuga",
                       "Kinango|Kinango"
                       
                       ];
    }else if (s1.value == "Kilifi") {
    var optionArray = ["| Kilifi Constituencies",
                            "Kilifi North|Kilifi North",
                            "Kilifi South|Kilifi South",
                            "Kaloleni|Kaloleni",
                            "Rabai|Rabai",
                            "Ganze|Ganze",
                            "Malindi|Malindi",
                            "Magarini|Magarini"
					   ];
    }else if (s1.value == "Tana River") {
        var optionArray = ["| Tana River Constituencies",
                           " Garsen|Garsen",
                           "Galole|Galole",
                           "Bura|Bura"
                           ];
	}
	else if (s1.value == "Lamu") {
        var optionArray = ["| Lamu Constituencies",
                           "Lamu East|Lamu East",
                           "Lamu West|Lamu West"
					   ];
    }else if (s1.value == "Taita-Taveta") {
        var optionArray = ["| Taita-Taveta Constituencies",
                           "Taveta|Taveta",
                           "Wundanyi|Wundanyi",
                           "Mwatate|Mwatate",
                           "Voi|Voi"
						   ];
	}else if (s1.value =="Garissa") {
        var optionArray = ["| Garissa Constituencies",
                          "Garissa Township (formerly Dujis Constituency)|Garissa Township (formerly Dujis Constituency)",
                           "Balambala|Balambala",
                           "Lagdera|Lagdera",
                           "Dadaab|Dadaab",
                           "Fafi|Fafi",
                           "Ijara|Ijara"
						   ];
	}else if (s1.value =="Wajir") {
        var optionArray = ["| Wajir Constituencies",
                           "Wajir North|Wajir North",
                           "Wajir East|Wajir East",
                           "Tarbaj|Tarbaj",
                           "Wajir West|Wajir West",
                           "Eldas|Eldas",
                           "Wajir South|Wajir South"
						   ];
	}else if (s1.value =="Mandera") {
        var optionArray = ["| Mandera Constituencies",
                           "Mandera West|Mandera West",
                           "Banissa|Banissa",
                           "Mandera North|Mandera North",
                            "Mandera South|Mandera South",
                            "Mandera East|Mandera East",
                            "Lafey|Lafey."
						   ];
	}else if (s1.value =="Marsabit") {
        var optionArray = ["| Marsabit Constituencies",
                           "Moyale|Moyale",
                           "North Horr|North Horr",
                           "Saku|Saku",
                           "Laisamis|Laisamis"
						   ];
	}else if (s1.value =="Isiolo") {
        var optionArray = ["| Isiolo Constituencies",
                           "Isiolo North|Isiolo North",
                           "Isiolo South|Isiolo South"
						   ];
	}else if (s1.value =="Meru") {
        var optionArray = ["| Meru Constituencies",
                           " Igembe South|Igembe South",
                           "Igembe Central|Igembe Central",
                           "Igembe North|Igembe North",
                           "Tigania West|Tigania West",
                           "Tigania East|Tigania East",
                           "North Imenti|North Imenti",
                           "Buuri|Buuri",
                           "Central Imenti|Central Imenti",
                           "South Imenti|South Imenti"

						   ];
	}else if (s1.value =="Tharaka-Nithi") {
        var optionArray = ["| Tharaka-Nithi Constituencies",
                           "Maara|Maara",
                           "Chuka/Igambang'ombe|Chuka/Igambang'ombe",
                           "Tharaka|Tharaka"
						   ];
	}else if (s1.value =="Embu") {
        var optionArray = ["| Embu Constituencies",
                           "Manyatta|Manyatta",
                           "Runyenjes|Runyenjes",
                           "Mbeere South|Mbeere South",
                           "Mbeere North|Mbeere North"
						   ];
	}else if (s1.value =="Kitui") {
        var optionArray = ["| Kitui Constituencies",
                           "Mwingi North|Mwingi North",
                          "Mwingi West|Mwingi West",
                           "Mwingi Central|Mwingi Central",
                           "Kitui West|Kitui West",
                           "Kitui Rural|Kitui Rural",
                           "Kitui Central|Kitui Central",
                           "Kitui East|Kitui East",
                           "Kitui South|Kitui South"
						   ];
	}else if (s1.value =="Machakos") {
        var optionArray = ["| Machakos Constituencies",
                           "Masinga|Masinga",
                           "Yatta|Yatta",
                           "Kangundo|Kangundo",
                           "Matungulu|Matungulu",
                           "Kathiani|Mavoko",
                           "Mavoko|",
                           "Machakos Town|Machakos Town",
                           "Mwala|Mwala"
						   ];
	}else if (s1.value =="Makueni") {
        var optionArray = ["| Makueni Constituencies",
                           "Mbooni|Mbooni",
                           "Kilome|Kilome",
                           "Kaiti|Kaiti",
                           "Makueni|Makueni",
                           "Kibwezi West|Kibwezi West",
                           "Kibwezi East|Kibwezi East"
						   ];
	}else if (s1.value =="Nyandarua") {
        var optionArray = ["| Nyandarua Constituencies",
                           "Kinangop|Kinangop",
                           "Kipipiri|Kipipiri",
                           "Ol Kalou|Ol Kalou",
                           "Ol Jorok|Ol Jorok",
                           "Ndaragwa|Ndaragwa"
						   ];
	}else if (s1.value =="Nyeri") {
        var optionArray = ["| Nyeri Constituencies",
                           "Tetu|Tetu",
                           "Kieni|Kieni",
                           "Mathira|Mathira",
                           "Othaya|Othaya",
                           "Mukurweini|Mukurweini",
                           "Nyeri Town|Nyeri Town"
						   ];
	}else if (s1.value =="Kirinyaga") {
        var optionArray = ["| Kirinyaga Constituencies",
                           "Mwea|Mwea",
                           "Gichugu|Gichugu",
                           "Ndia|Ndia",
                           "Kirinyaga Central|Kirinyaga Central"
						   ];
	}else if (s1.value =="Murang'a") {
        var optionArray = ["| Murang'a Constituencies",
                           "Kangema|Kangema",
                           "Mathioya|Mathioya",
                           "Kiharu|Kiharu",
                           "Kigumo|Kigumo",
                           "Maragwa|Maragwa",
                           "Kandara|Kandara",
                           "Gatanga|Gatanga"
						   ];
	}else if (s1.value =="Kiambu") {
        var optionArray = ["| Kiambu Constituencies",
                           "Gatundu South|Gatundu South",
                           "Gatundu North|Gatundu North",
                           "Juja|Juja",
                           "Thika Town|Thika Town",
                           "Ruiru|Ruiru",
                           "Githunguri|Githunguri",
                           "Kiambu|Kiambu",
                           "Kiambaa|Kiambaa",
                           "Kabete|Kabete",
                           "Kikuyu|Kikuyu",
                           "Limuru|Limuru",
                           "Lari|Lari"
						   ];
	}else if (s1.value =="Turkana") {
        var optionArray = ["| Turkana Constituencies",
						   "Turkana North|Turkana North",
                           "Turkana West|Turkana West",
                           "Turkana Central|Turkana Central",
                           "Loima|Loima",
                           "Turkana South|Turkana South",
                           "Turkana East|Turkana East"
						   ];
	}else if (s1.value =="West Pokot") {
        var optionArray = ["| West Pokot Constituencies",
						   "Kapenguria|Kapenguria",
                           "Sigor|Sigor",
                           "Kacheliba|Kacheliba",
                           "Pokot South|Pokot South"
						   ];
	}else if (s1.value =="Samburu") {
        var optionArray = ["| Samburu Constituencies",
						   "Samburu West|Samburu West",
                           "Samburu North|Samburu North",
                           "Samburu East|Samburu East"
						   ];
	}else if (s1.value =="Trans-Nzoia") {
        var optionArray = ["| Trans-Nzoia Constituencies",
						   "Kwanza|Kwanza",
                           "Endebess|Endebess",
                           "Saboti|Saboti",
                           "Kiminini|Kiminini",
                           "Cherangany|Cherangany"
						   ];
	}else if (s1.value =="Uasin Gishu") {
        var optionArray = ["| Uasin Gishu Constituencies",
						   "Soy|Soy",
                           "Turbo|Turbo",
                           "Moiben|Moiben",
                           "Ainabkoi|Ainabkoi",
                           "Kapseret|Kapseret",
                           "Kesses|Kesses"
						   ];
	}else if (s1.value =="Elgeyo-Marakwet") {
        var optionArray = ["| Elgeyo-Marakwet Constituencies",
						   "Marakwet East|Marakwet East",
                           "Marakwet West|Marakwet West",
                           "Keiyo North|Keiyo North",
                           "Keiyo South|Keiyo South"
						   ];
	}else if (s1.value =="Nandi") {
        var optionArray = ["| Nandi Constituencies",
						   "Tinderet|Tinderet",
                           "Aldai|Aldai",
                           "Nandi Hills|Nandi Hills",
                           "Chesumei|Chesumei",
                           "Emgwen|Emgwen",
                           "Mosop|Mosop"
						   ];
	}else if (s1.value =="Baringo") {
        var optionArray = ["| Baringo Constituencies",
						   "Tiaty|Tiaty",
                           "Baringo North|Baringo North",
                           "Baringo Central|Baringo Central",
                           "Baringo South|Baringo South",
                           "Mogotio|Mogotio",
                           "Eldama Ravine|Eldama Ravine"
						   ];
	}else if (s1.value =="Laikipia") {
        var optionArray = ["| Laikipia Constituencies",
						   "Laikipia West|Laikipia West",
                           "Laikipia East|Laikipia East",
                           "Laikipia North|Laikipia North"
						   ];
	}else if (s1.value =="Nakuru") {
        var optionArray = ["| Nakuru Constituencies",
						   "Molo|Molo",
                           "Njoro|Njoro",
                           "Naivasha|Naivasha",
                           "Gilgil|Gilgil",
                           "Kuresoi South|Kuresoi South",
                           "Kuresoi North|Kuresoi North",
                           "Subukia|Subukia",
                           "Rongai|Rongai",
                           "Bahati|Bahati",
                           "Nakuru Town West|Nakuru Town West",
                           "Nakuru Town East|Nakuru Town East"
						   ];
	}else if (s1.value =="Narok") {
        var optionArray = ["| Narok Constituencies",
						   "Kilgoris|Kilgoris",
                           "Emurua Dikirr|Emurua Dikirr",
                           "Narok North|Narok North",
                           "Narok East|Narok East",
                           "Narok South|Narok South",
                           "Narok West|Narok West",
						   ];
	}else if (s1.value =="Kajiado") {
        var optionArray = ["| Kajiado Constituencies",
						   "Kajiado North|Kajiado North",
                           "Kajiado CentralKajiado Central",
                           "Kajiado East|Kajiado East",
                           "Kajiado West|Kajiado West",
                           "Kajiado South|Kajiado South"
						   ];
	}
    else if (s1.value =="Kericho") {
        var optionArray = ["| Kericho Constituencies",
						   "Kipkelion East|Kipkelion East",
                           "Kipkelion West|Kipkelion West",
                           "Ainamoi|Ainamoi",
                           "Bureti|Bureti",
                           "Belgut|Belgut",
                           "Sigowet–Soin|Sigowet–Soin"
						   ];
	}
    else if (s1.value =="Bomet") {
        var optionArray = ["|Bomet Constituencies",
						   "Sotik|Sotik",
                           "Chepalungu|Chepalungu",
                           "Bomet East|Bomet East",
                           "Bomet Central|Bomet Central",
                           "Konoin|Konoin"
						   ];
	}
    else if (s1.value =="Kakamega") {
        var optionArray = ["| Kakamega Constituencies",
						   "Lugari|Lugari",
                           "Likuyani|Likuyani",
                           "Malava|Malava",
                           "Lurambi|Lurambi",
                           "Navakholo|Navakholo",
                           "Mumias West|Mumias West",
                           "Mumias East|Mumias East",
                           "Matungu|Matungu",
                           "Butere|Butere",
                           "Khwisero|Khwisero",
                           "Shinyalu|Shinyalu",
                           "Ikolomani|Ikolomani"
						   ];
	}
    else if (s1.value =="Vihiga") {
        var optionArray = ["| Vihiga Constituencies",
						   "Vihiga|Vihiga",
                           "Sabatia|Sabatia",
                           "Hamisi|Hamisi",
                           "Luanda|Luanda",
                           "Emuhaya|Emuhaya"
						   ];
	}
    else if (s1.value =="Bungoma") {
        var optionArray = ["| Bungoma Constituencies",
						   "Mount Elgon|Mount Elgon",
                           "Sirisia|Sirisia",
                           "Kabuchai|Kabuchai",
                           "Bumula|Bumula",
                           "Kanduyi|Kanduyi",
                           "Webuye East|Webuye East",
                           "Webuye West|Webuye West",
                           "Kimilili|Kimilili",
                           "Tongaren|Tongaren"
						   ];
	}
    else if (s1.value =="Busia") {
        var optionArray = ["| Busia Constituencies",
						   "Teso North|Teso North",
                           "Teso South|Teso South",
                           "Nambale|Nambale",
                           "Matayos|Matayos",
                           "Butula|Butula",
                           "Funyula|Funyula",
                           "Budalangi|Budalangi"
						   ];
	}
    else if (s1.value =="Siaya") {
        var optionArray = ["| Siaya Constituencies",
						   "Ugenya|Ugenya",
                           "Ugunja|Ugunja",
                           "Alego Usonga|Alego Usonga",
                           "Gem|Gem",
                           "Bondo|Bondo",
                           "Rarieda|Rarieda"
						   ];
	}
    else if (s1.value =="Kisumu") {
        var optionArray = ["| Kisumu Constituencies",
						   "Kisumu East|Kisumu East",
                           "Kisumu West|Kisumu West",
                           "Kisumu Central|Kisumu Central",
                           "Seme|Seme",
                           "Nyando|Nyando",
                           "Muhoroni|Muhoroni",
                           "Nyakach|Nyakach"
						   ];
	}
     else if (s1.value =="Homa Bay") {
        var optionArray = ["| Homa Bay Constituencies",
						   "Kasipul|Kasipul",
                           "Kabondo Kasipul|Kabondo Kasipul",
                           "Karachuonyo|Karachuonyo",
                           "Rangwe|Rangwe",
                           "Homa Bay Town|Homa Bay Town",
                           "Ndhiwa|Ndhiwa",
                           "Mbita|Mbita",
                           "Suba|Suba"
						   ];
	}
     else if (s1.value =="Migori") {
        var optionArray = ["| Migori Constituencies",
						   "Rongo|Rongo",
                           "Awendo|Awendo",
                           "Suna East|Suna East",
                           "Suna West|Suna West",
                           "Uriri|Uriri",
                           "Nyatike|Nyatike",
                           "Kuria West|Kuria West",
                           "Kuria East|Kuria East"
						   ];
	}
     else if (s1.value =="Kisii") {
        var optionArray = ["| Kisii Constituencies",
						   "Bonchari|Bonchari",
                           "South Mugirango|South Mugirango",
                           "Bomachoge Borabu|Bomachoge Borabu",
                           "Bobasi|Bobasi",
                           "Bomachoge Chache|Bomachoge Chache",
                           "Nyaribari Masaba|Nyaribari Masaba",
                           "Nyaribari Chache|Nyaribari Chache",
                           "Kitutu Chache North|Kitutu Chache North",
                           "Kitutu Chache South|Kitutu Chache South"
						   ];
	}
     else if (s1.value =="Nyamira") {
        var optionArray = ["| Nyamira Constituencies",
						   "Kitutu Masaba|Kitutu Masaba",
                           "West Mugirango|West Mugirango",
                           "North Mugirango|North Mugirango",
                           "Borabu|Borabu"
						   ];
	}
    else{
        var optionArray = ["|Nairobi Constituencies",
						   " Westlands|Westlands",
                           " Dagoretti North|Dagoretti North",
                           " Dagoretti South|Dagoretti South",
                           " Lang'ata|Lang'ata",
                           " Kibra| Kibra",
                           " Roysambu|Roysambu",
                           " Kasarani|Kasarani",
                           " Ruaraka|Ruaraka",
                           " Embakasi South|Embakasi South",
                           " Embakasi North|Embakasi North",
                           " Embakasi Central|Embakasi Central",
                           " Embakasi East|Embakasi East",
                           " Embakasi West|Embakasi West",
                           " Makadara|Makadara",
                           " Kamukunji|Kamukunji",
                           " Starehe|Starehe",
                           " Mathare|Mathare"
						   ];
	}
	
  
	for(var option in optionArray){
	    var pair = optionArray[option].split("|");
        var newOption = document.createElement("option");
        newOption.value = pair[0];
        newOption.innerHTML = pair[1];
        s2.options.add(newOption);
	}
}
	