<!DOCTYPE html>
<html>
  <head>
    <title>AJAX en jQuery</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  </head>
  <body>

<form>
  
<table>
 <td>
<input type='checkbox' value='SI'><input type='checkbox' value='NO'>
<input type="checkbox" value="SI">
<input type="checkbox" value="SI">
<input type="checkbox" value="SI">
 </td> 
<tr>
 <td>
<input type="checkbox" value="NO">
<input type="checkbox" value="NO">
<input type="checkbox" value="NO">
<input type="checkbox" value="NO">
 </td>

</table>
  
    <button type="button" onclick="mostrar()">enviar</button>

</form>
    <script type="text/javascript">


function mostrar(){


  var actual = new Array();
       
       
        $("input:checkbox:checked").each(function() {
//             alert($(this).val());
             actual.push($(this).val());
        });
    


    alert(actual);     


console.log(actual.length);
}     
      
    
    </script>
  </body>
</html>