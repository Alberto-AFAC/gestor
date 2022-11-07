<?php
ob_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RECIBO DE NOMINA</title>
    <link rel="shortcut icon" href=""/>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
</head>
<style>


table {
       font-family: 'Montserrat';
        border-collapse: collapse;
        border-color: gray;
        width: 100%;
        border: black .5px solid;
    }
    tbody {
       border: black 1px solid;
    }
    tr {
       border: black 1px solid;
       width: 100px;
    }
    th {
        border: black 1px solid;
        text-align: left;
        padding: 4px;
        font-size: 25px;
        background-color: #D8D8D8;
        color:black;
        text-align:center;
    }
    td {
       border: black 1px solid;
        text-align: left;
        padding: 4px;
        font-size: 20px;
    }
     .imagen2{
      padding-left: 87%;
       padding-top: -5%;
    }
</style>

<body>
     <div style="padding-left:2%;padding-top:2%">
          <table>
          <tr>
                <th height="" width="400px" ROWSPAN=11 style="font-size:14px;text-align:center;background-color:#FFFFFF">
                  <img src="../dist/img/logoafac.png" width="270" height="113.4" alt="">
                </th>
	            <th width="400px" style="font-size:14px;text-align:center;">EMISOR</th> <th width="600px" COLSPAN=2  style="font-size:14px;text-align:center;">COMPROBANTE DE NOMINA</th>
	       </tr>
<tr>
    <td  style="font-size:10px;text-align:left;">RFC</td> 
    <td style="font-size:10px;text-align:left;">VERSION</td>
    <td style="font-size:10px;text-align:left;">TIPO DE COMPROBANTE</td>
    </tr>
    <tr>
    <td  style="font-size:10px;text-align:left;">NOMBRE</td> 
    <td style="font-size:10px;text-align:left;">SERIE</td>
    <td style="font-size:10px;text-align:left;">EXPORTACION</td>
    </tr>
     <tr>
    <td  style="font-size:10px;text-align:left;">REGIMEN FISCAL </td> 
    <td style="font-size:10px;text-align:left;">FOLIO</td>
    <td style="font-size:10px;text-align:left;">METODO PAGO</td>
    </tr>
    <tr>
    <td  style="font-size:10px;text-align:left;border-top: white 1px solid; border-bottom:white 1px solid"> </td> 
    <td style="font-size:10px;text-align:left;">FECHA</td>
    <td style="font-size:10px;text-align:left;">MONEDA</td>
    </tr>
    <tr>
    <td  style="font-size:10px;text-align:left;border-top: white 1px solid; border-bottom:white 1px solid"> </td> 
    <td style="font-size:10px;text-align:left;">LUGAR DE EXPEDICION </td>
    <td style="font-size:10px;text-align:left;">SUBTOTAL</td>
    </tr>
    <tr>
    <td  style="font-size:10px;text-align:left;border-top: white 1px solid; border-bottom:white 1px solid"> </td> 
    <td style="font-size:10px;text-align:left;">SELLO </td>
    <td style="font-size:10px;text-align:left;">DESCUENTO</td>
    </tr>
    <tr>
    <td  style="font-size:10px;text-align:left;border-top: white 1px solid; border-bottom:white 1px solid"> </td> 
    <td style="font-size:10px;text-align:left;">No. CERTIFICADO </td>
    <td style="font-size:10px;text-align:left;">TOTAL</td>
    </tr>
    <tr>
    <td  style="font-size:10px;text-align:left;"> </td> 
    <td style="font-size:10px;text-align:left;">CERTIFICADO</td>
    <td style="font-size:10px;text-align:left;">CONFIRMACION</td>
    </tr>
    <tr>
    <th  style="font-size:10px;text-align:center;">CFDI RELACIONADOS  </th> 
    <th COLSPAN=2  style="font-size:10px;text-align:center;">CFDI RELACIONADOS  </th> 
    </tr>
    <tr>
    <td style="font-size:10px;text-align:left;">TIPO RELACION</td>
    <td COLSPAN=2 style="font-size:10px;text-align:left;">UUID</td>
    </tr>

        </table>
        
       <table>
            <tr>
                <th height="1" style="font-size:14px;text-align:center;">RECEPTOR</th>
            </tr>
            <tr>
               <td height="1" style="font-size:10px;text-align:left;">RFC</td>
            </tr>
              <tr>
               <td height="1" style="font-size:10px;text-align:left;">NOMBRE</td>
            </tr>
            <tr>
               <td height="1" style="font-size:10px;text-align:left;">DOMICILIO FISCAL RECEPTOR</td>
            </tr>
            <tr>
               <td height="1" style="font-size:10px;text-align:left;">REGIMEN FISCAL</td>
            </tr>
            <tr>
               <td height="1" style="font-size:10px;text-align:left;">USO CFDI</td>
            </tr>

            <tr>
                <th height="1" style="font-size:12px;text-align:center;">CONCEPTOS</th>
            </tr>
        </table>
        <table>
           <tr><th ROWSPAN=2  style="font-size:14px;text-align:center;background-color:#FFFFFF">CLAVE DE PRODUCTO O SERVICIO</th>
	           <td style="font-size:10px;text-align:center;">CANTIDAD</td> <td style="font-size:10px;text-align:center;">CLAVE UNIDAD</td> <td style="font-size:10px;text-align:center;">DESCRIPCION </td> <td style="font-size:10px;text-align:center;">VALOR UNITARIO </td> <td style="font-size:10px;text-align:center;">IMPORTE</td>
	       </tr>
	       <tr>
	           <td style="font-size:10px;text-align:center;">0</td> <td style="font-size:10px;text-align:center;">DESCUENTO</td><td style="font-size:10px;text-align:center;">0</td> <td style="font-size:10px;text-align:center;">OBJETO IMPUESTO</td> <td style="font-size:10px;text-align:center;">0</td>
	       </tr>
        </table>
        <table>
            <tr>
                <th height="2" colspan="2" style="font-size:14px;text-align:center;">COMPLEMENTO NOMINA</th>
            </tr>
            <tr>
	           <td style="font-size:10px;text-align:left;  border-top: white 1px solid; border-bottom:white 1px solid">VERSION</td> <td style="font-size:10px;text-align:left; border-top: white 1px solid; border-bottom:white 1px solid">No. DIAS PAGADOS</td>
	        </tr>
	        <tr>
	           <td style="font-size:10px;text-align:left;  border-top: white 1px solid; border-bottom:white 1px solid">TIPO NOMINA</td> <td style="font-size:10px;text-align:left; border-top: white 1px solid; border-bottom:white 1px solid">TOTAL DE PERCEPCIONES</td>
	        </tr>
	        <tr>
	           <td style="font-size:10px;text-align:left;  border-top: white 1px solid; border-bottom:white 1px solid">FECHA PAGO</td> <td style="font-size:10px;text-align:left; border-top: white 1px solid; border-bottom:white 1px solid">TOTAL DE PERCEPCIONES</td>
	        </tr>
	        <tr>
	           <td style="font-size:10px;text-align:left;  border-top: white 1px solid; border-bottom:white 1px solid">FECHA INICIAL PAGO</td> <td style="font-size:10px;text-align:left; border-top: white 1px solid; border-bottom:white 1px solid">TOTAL OTROS PAGOS</td>
	        </tr>
	        <tr>
	           <td style="font-size:10px;text-align:left;  border-top: white 1px solid;">FECHA FINAL PAGO</td> <td style="font-size:10px;text-align:left; border-top: white 1px solid;"></td>
	        </tr>

        </table>
        <table>
            <tr>
                <th height="1" width="35%" colspan="1" style="font-size:12px;text-align:center;border: black 1px solid;">EMISOR</th>
                <th height="1" width="65%" colspan="4" style="font-size:12px;text-align:center;">RECEPTOR</th>
            </tr>
            <tr>
	           <td style="font-size:10px;text-align:left;border-top: white 1px solid; border-bottom:white 1px solid">REGISTRO PATRONAL</td> 
	           <td style="font-size:10px;text-align:left;">CURP</td> 
	           <td style="font-size:10px;text-align:left;">SINDICALIZADO</td> 
	           <td style="font-size:10px;text-align:left;">No. EMPLEADO</td> 
	           <td style="font-size:10px;text-align:left;">SALARIO BASE DE COTIZACION APORT</td> 
	        </tr>
	        <tr>
	           <td style="font-size:10px;text-align:left;border-top: white 1px solid; border-bottom:white 1px solid"></td> 
	           <td style="font-size:10px;text-align:left;">No. SEGURIDAD SOCIAL</td> 
	           <td style="font-size:10px;text-align:left;">TIPO JORNADA</td> 
	           <td style="font-size:10px;text-align:left;">DEPARTAMENTO</td> 
	           <td style="font-size:10px;text-align:left;">S.D.I</td> 
	        </tr>
	        <tr>
	           <td style="font-size:10px;text-align:left;border-top: white 1px solid; border-bottom:white 1px solid"></td> 
	           <td style="font-size:10px;text-align:left;">FECHA INICIO RELACION LABORAL</td> 
	           <td style="font-size:10px;text-align:left;">TIPO REGIMEN</td> 
	           <td style="font-size:10px;text-align:left;">PUESTO</td> 
	           <td style="font-size:10px;text-align:left;">CLAVE DE ENTIDAD FEDERATIVA</td> 
	        </tr>
	        <tr>
	           <td style="font-size:10px;text-align:left;border-top: white 1px solid; border-bottom:white 1px solid"></td> 
	           <td style="font-size:10px;text-align:left;">ANTIGÜEDAD</td> 
	           <td style="font-size:10px;text-align:left;">BANCO</td> 
	           <td style="font-size:10px;text-align:left;">NIVEL TABULAR</td> 
	           <td style="font-size:10px;text-align:left;">RIEGO DE PUESTO</td> 
	        </tr>
	        <tr>
	           <td style="font-size:10px;text-align:left;border-top: white 1px solid;  border-top: white 1px solid;"></td> 
	           <td style="font-size:10px;text-align:left;">TIPO DE CONTRATO</td> 
	           <td style="font-size:10px;text-align:left;">CUENTA BANCARIA</td> 
	           <td style="font-size:10px;text-align:left;">PERIODICIDAD PAGO</td> 
	           <td style="font-size:10px;text-align:left;"></td> 
	        </tr>
        </table>
        <table>
            <tr>
                <th height="1" width="50%" height="15" colspan="1" style="font-size:12px;text-align:center;border: black 1px solid;">PERCEPCION</th>
                <th height="1" width="50%" height="15" colspan="1" style="font-size:12px;text-align:center;">DEDUCCIONES</th>
            </tr>
            <tr>
                <td height="100px" style="font-size:10px;text-align:left;"></td> 
                <td height="100px" style="font-size:10px;text-align:left;"></td> 
	        </tr>
	        
        </table>
         <table>
            <tr>
                <th height="1" width="50%" height="15" colspan="1" style="font-size:12px;text-align:center;border: black 1px solid;">OTROS PAGOS</th>
                <th height="1" width="50%" height="15" colspan="1" style="font-size:12px;text-align:center;">SUBSIDIO AL EMPLEO</th>
            </tr>
            <tr>
                <td height="1" style="font-size:10px;text-align:center;">OTRO PAGO</td> 
                <td height="1" style="font-size:10px;text-align:left;">SUBSIDIO CAUSADO</td> 
	        </tr>
	         <tr>
                <td height="1" style="font-size:10px;text-align:center;border-top: white 1px solid; border-bottom:white 1px solid"></td> 
                <th height="1" style="font-size:10px;text-align:center;">COMPENSACION SALDOS A FAVOR </th> 
	        </tr>
	        <tr>
                <td height="1" style="font-size:10px;text-align:center;border-top: white 1px solid; border-bottom:white 1px solid"></td> 
                <td height="1" style="font-size:10px;text-align:left;">SALDO A FAVOR</td> 
	        </tr>
	        <tr>
                <td height="1" style="font-size:10px;text-align:center;border-top: white 1px solid; border-bottom:white 1px solid"></td> 
                <td height="1" style="font-size:10px;text-align:left;">AÑO</td> 
	        </tr>
	        <tr>
                <td height="1" style="font-size:10px;text-align:center;border-top: white 1px solid; border-bottom:white 1px solid"></td> 
                <td height="1" style="font-size:10px;text-align:left;">REMANENTE SALDO A FAVOR </td> 
	        </tr>
	        <tr>
	            <td height="1" style="font-size:10px;text-align:center;border-top: white 1px solid; border-bottom:white 1px solid"></td>
                <th height="1" width="50%" height="15" colspan="1" style="font-size:10px;text-align:center;">INCAPACIDADES</th>
	        </tr>
	        <tr>
                <td height="1" style="font-size:10px;text-align:center;border-top: white 1px solid; border-bottom:white 1px solid"></td> 
                <td height="1" style="font-size:10px;text-align:left;">INCAPACIDADES</td> 
	        </tr>
	        <tr>
                <td height="1" style="font-size:10px;text-align:center;border-top: white 1px solid; border-bottom:white 1px solid"></td> 
                <td height="1" style="font-size:10px;text-align:left;">DIAS DE INCAPACIDAD</td> 
	        </tr>
	         <tr>
                <td height="1" style="font-size:10px;text-align:center;border-top: white 1px solid; border-bottom:white 1px solid"></td> 
                <td height="1" style="font-size:10px;text-align:left;">TIPO DE INCAPACIDAD</td> 
	        </tr>
	         <tr>
                <td height="1" style="font-size:10px;text-align:center;"></td> 
                <td height="1" style="font-size:10px;text-align:left;">EMPORTE MONETARIO </td> 
	        </tr>
	        
        </table>
    </div>



    
    <?php
            //require_once '../dist/dompdf/autoload.inc.php';
           require_once '../dist/dompdf/autoload.inc.php';
            use Dompdf\Dompdf;
            $dompdf = new DOMPDF('1.0', 'utf-8');
            $dompdf->set_paper('letter', 'landscape');
            $dompdf->load_html(ob_get_clean());
            $dompdf->render();
            $dompdf->stream("RECIBO DE NOMINA", array("Attachment" => 0));
            $pdf = $dompdf->output();
        ?>
        
        
</body>
</html>