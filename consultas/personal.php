<script type="text/javascript">
$(document).ready(function(){
/*$('#gstIDara').select2();
$('#gstIDCat').select2();
$('#gstIDSub').select2();
$('#gstIDuni').select2();*/

$('#gstIDpai').select2();
$('#AgstIDpai').select2();
$('#AgstIDCat').select2();
//$('#AgstIDSub').select2();
$('#AgstIDuni').select2();
}); 
</script>
<script src="../js/select2.js"></script> 


<script type="text/javascript">

  
 
    var dataSet = [
<?php 
  $query = "SELECT * FROM personal WHERE estado = 0 ORDER BY gstIdper DESC";
  $resultado = mysqli_query($conexion, $query);



while($data = mysqli_fetch_array($resultado)){
?>["<?php echo  $data['gstNombr'];?>","<?php echo $data['gstApell']?>"],




<?php } ?>
    ];


var tableGenerarReporte = $('#data-table-reportes').DataTable({
    "language": {
      "searchPlaceholder": "Buscar datos...",
      "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
    },
    data: dataSet,
    columns: [
      {title: "gstNombr"},
      {title: "gstApell"}
    ],
  });

</script>
