$(document).ready(function(){
 
 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"../functions/application.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#searchApplication').keyup(function(){
  var search = $(this).val();
  if(search !== '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });

});