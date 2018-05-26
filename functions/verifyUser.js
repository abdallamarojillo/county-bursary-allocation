function verifyUser(str){
      var id = str;
      var status = $('#v-'+str).val();
      var comment = $('#comment-'+str).val();
      var vForm = $('#verifyform-'+str);
      
      $(vForm).submit(function(e){
         e.preventDefault();   
      });
      $.ajax({
         type: "POST",
         url :"../functions/verifyUser.php",
         data:"status="+status+"&id="+id+"&comment="+comment,
         //success: alert("hey"),
         success:
         swal({   title: "Verification Made",   
            text: "Verification Status updated",   
            type: "success",     
            confirmButtonColor: "teal",   
            confirmButtonText: "OK",    
            closeOnConfirm: false } , 
            function(isConfirm){   
                if (isConfirm) 
                    {   
                    location.reload();
                    }     
            }),
         
      });

}

