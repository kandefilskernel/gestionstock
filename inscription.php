<html>
   <head>
      <script> 
      function validateForm()                                    
{ 
    var name = document.forms["myForm"]["name"];               
    var email = document.forms["myForm"]["email"];    
    var message = document.forms["myForm"]["message"];   
   
    if (name.value == "")                                  
    { 
        document.getElementById('errorname').innerHTML="Veuillez entrez un nom valide";  
        name.focus(); 
        return false; 
    }else{
        document.getElementById('errorname').innerHTML="";  
    }
       
    if (email.value == "")                                   
    { 
        document.getElementById('erroremail').innerHTML="Veuillez entrez une adresse mail valide"; 
        email.focus(); 
        return false; 
    }else{
        document.getElementById('erroremail').innerHTML="";  
    }
   
    if (email.value.indexOf("@", 0) < 0)                 
    { 
        document.getElementById('erroremail').innerHTML="Veuillez entrez une adresse mail valide"; 
        email.focus(); 
        return false; 
    } 
   
    if (email.value.indexOf(".", 0) < 0)                 
    { 
        document.getElementById('erroremail').innerHTML="Veuillez entrez une adresse mail valide"; 
        email.focus(); 
        return false; 
    } 
   
    if (message.value == "")                           
    {
        document.getElementById('errormsg').innerHTML="Veuillez entrez un message valide"; 
        message.focus(); 
        return false; 
    }else{
        document.getElementById('errormsg').innerHTML="";  
    }
   
    return true; 
}
      </script> 
      <style>
     
    <link rel="stylesheet" type="text/css" href="fiston.css"><!-- followed by your custom css after-->
      </style>
      <meta charset="utf-8">
   </head>
   <body>
      <h1>Formulaire de contact</h1>
      <form name="myForm" action="/file.php" onsubmit="return validateForm()" method="post">
         <table class="form-style">
            <tr>
               <td>
                  <label>
                     Votre nom <span class="required">*</span>
                  </label>
               </td>
               <td>
                  <input type="text" name="name" class="long"/>
                  <span class="error" id="errorname"></span>
               </td>
            </tr>
            <tr>
               <td>
                  <label>
                     Votre adresse e-mail <span class="required">*</span>
                  </label>
               </td>
               <td>
                  <input type="email" name="email" class="long"/>
                  <span class="error" id="erroremail"></span>
               </td>
            </tr>
            <tr>
               <td>
                  <label>
                     Message <span class="required">*</span>
                  </label>
               </td>
               <td>
                  <textarea name="message" class="long field-textarea"></textarea>
                  <span class="error" id="errormsg"></span>
               </td>
            </tr>
            <tr>
               <td></td>
               <td>
                  <input type="submit" value="Envoyer">      
                  <input type="reset" value="Réinitialiser"> 
               </td>
            </tr>
         </table>
      </form>
   </body>
</html>