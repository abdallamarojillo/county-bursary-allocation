    function showFamily(p)
    {
            var p = document.getElementById(p);
            if(p.value == "both")
            {
                $('#both').show();
                $('#father').hide();
                $('#mother').hide();
                $('#guardian').hide();
            }
            else if(p.value == "father")
            {
                $('#father').show();
                $('#both').hide();
                $('#mother').hide();
                $('#guardian').hide();
            }
            else if(p.value == "mother")
            {
                $('#mother').show();
                $('#both').hide();
                $('#father').hide();
                $('#guardian').hide();
            }
            else
            {
                $('#guardian').show();
                $('#both').hide();
                $('#father').hide();
                $('#mother').hide();
            }
    }
    

    