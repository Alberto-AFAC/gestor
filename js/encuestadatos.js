
function enviar()
{
    var preg13 = document.getElementById ("preg13").value;
    var preg16 = document.getElementById ("preg16").value;
    

if(document.form1.preg1[0].checked==false && document.form1.preg1[1].checked==false && document.form1.preg1[2].checked==false && document.form1.preg1[3].checked==false)
    {
      $('#pendiente1').toggle('toggle');
        setTimeout(function(){
        $('#pendiente1').toggle('toggle');
        },2000);   
        return;    
    }
if(document.form2.preg2[0].checked==false && document.form2.preg2[1].checked==false && document.form2.preg2[2].checked==false && document.form2.preg2[3].checked==false)
    {
      $('#pendiente2').toggle('toggle');
        setTimeout(function(){
        $('#pendiente2').toggle('toggle');
        },2000); 
        return;

    }
  if(document.form3.preg3[0].checked==false && document.form3.preg3[1].checked==false && document.form3.preg3[2].checked==false && document.form3.preg3[3].checked==false)
    {
      $('#pendiente3').toggle('toggle');
        setTimeout(function(){
        $('#pendiente3').toggle('toggle');
        },2000); 
        return;

    }
 if(document.form4.preg4[0].checked==false && document.form4.preg4[1].checked==false && document.form4.preg4[2].checked==false && document.form4.preg4[3].checked==false)
    {
      $('#pendiente4').toggle('toggle');
        setTimeout(function(){
        $('#pendiente4').toggle('toggle');
        },2000); 
        return;

    }
 if(document.form5.preg5[0].checked==false && document.form5.preg5[1].checked==false && document.form5.preg5[2].checked==false && document.form5.preg5[3].checked==false)
    {
      $('#pendiente5').toggle('toggle');
        setTimeout(function(){
        $('#pendiente5').toggle('toggle');
        },2000); 
        return;

    }
 if(document.form6.preg6[0].checked==false && document.form6.preg6[1].checked==false && document.form6.preg6[2].checked==false && document.form6.preg6[3].checked==false)
    {
      $('#pendiente6').toggle('toggle');
        setTimeout(function(){
        $('#pendiente6').toggle('toggle');
        },2000); 
        return;

        
    }
    if(document.form7.preg7[0].checked==false && document.form7.preg7[1].checked==false && document.form7.preg7[2].checked==false && document.form7.preg7[3].checked==false)
    {
      $('#pendiente7').toggle('toggle');
        setTimeout(function(){
        $('#pendiente7').toggle('toggle');
        },2000); 
        return;

    }
if(document.form8.preg8[0].checked==false && document.form8.preg8[1].checked==false && document.form8.preg8[2].checked==false && document.form8.preg8[3].checked==false)
    {
      $('#pendiente8').toggle('toggle');
        setTimeout(function(){
        $('#pendiente8').toggle('toggle');
        },2000); 
        return;

    }
if(document.form9.preg9[0].checked==false && document.form9.preg9[1].checked==false && document.form9.preg9[2].checked==false && document.form9.preg9[3].checked==false)
    {
      $('#pendiente9').toggle('toggle');
        setTimeout(function(){
        $('#pendiente9').toggle('toggle');
        },2000); 
        return;

    }
    if(document.form10.preg10[0].checked==false && document.form10.preg10[1].checked==false && document.form10.preg10[2].checked==false && document.form10.preg10[3].checked==false)
    {
      $('#pendiente10').toggle('toggle');
        setTimeout(function(){
        $('#pendiente10').toggle('toggle');
        },2000); 
        return;

    }
    if(document.form11.preg11[0].checked==false && document.form11.preg11[1].checked==false && document.form11.preg11[2].checked==false && document.form11.preg11[3].checked==false)
    {
      $('#pendiente11').toggle('toggle');
        setTimeout(function(){
        $('#pendiente11').toggle('toggle');
        },2000); 
        return;

    }
    if(document.form12.preg12[0].checked==false && document.form12.preg12[1].checked==false && document.form12.preg12[2].checked==false && document.form12.preg12[3].checked==false)
    {
      $('#pendiente12').toggle('toggle');
        setTimeout(function(){
        $('#pendiente12').toggle('toggle');
        },2000); 
        return;

    }
    if (preg13==''){
        $('#pendiente13').toggle('toggle');
          setTimeout(function(){
          $('#pendiente13').toggle('toggle');
          },2000); 
          return;
  
        }
    if(document.form14.preg14[0].checked==false && document.form14.preg14[1].checked==false && document.form14.preg14[2].checked==false && document.form14.preg14[3].checked==false)
    {
      $('#pendiente14').toggle('toggle');
        setTimeout(function(){
        $('#pendiente14').toggle('toggle');
        },2000); 
        return;

    }
    if(document.form15.preg15[0].checked==false && document.form15.preg15[1].checked==false && document.form15.preg15[2].checked==false && document.form15.preg15[3].checked==false)
    {
      $('#pendiente17').toggle('toggle');
        setTimeout(function(){
        $('#pendiente17').toggle('toggle');
        },2000); 
        return;
    }
    if (preg16==''){
        $('#pendiente16').toggle('toggle');
          setTimeout(function(){
          $('#pendiente16').toggle('toggle');
          },2000); 
          return;
  
        }else{
          $.ajax({
          url:'../php/regevalureaccion.php',
          type:'POST',
          data: 'gstIdlsc='+gstIdlsc+'&gstTitlo='+gstTitlo+'&tipo='+tipo+'&gstVignc='+gstVignc+'&perfil='+perfil+'&objetivo='+objetivo+'&adjunto='+adjunto+'&duracion='+duracion+'&constancia='+constancia+'&opcion=actcurso'
          }).done(function(respuesta){
          if (respuesta==0) {
          $('#exito').slideDown('slow');
          setTimeout(function(){
          $('#exito').slideUp('slow');
          },4000);
          }else{
          $('#error').slideDown('slow');
          setTimeout(function(){
          $('#error').slideUp('slow');
          },4000);
          }                    
          }); 
       }
      }
