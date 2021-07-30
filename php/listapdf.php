<?php include("../conexion/conexion.php");
session_start();

$titulo = $_POST['gstTitulo'];

setcookie("TestCookie", $titulo, time()+3600); 

?>

<script src="../dist/jspdf/dist/jspdf.debug.js"></script>
<script src="../dist/js/jspdf.plugin.autotable.min.js"></script>
<script type="text/javascript">
    

// setcookie(
//     string $name,
//     string $value = "",
//     int $expires = 0,
//     string $path = "",
//     string $domain = "",
//     bool $secure = false,
//     bool $httponly = false
// ): bool


var pdf = new jsPDF("landscape");
    pdf.setFontSize(10)

    var logo = new Image();
    logo.src = '../dist/img/AFACPDF.png';
   // pdf.addImage(logo, 'PNG', 120, 5, 40, 30);
    pdf.setFontType('bold')
    pdf.text(15, 40, 'LISTA TECNICA DE PARTICIPANTES')

    pdf.text(15, 45, 'TEMA DEL CURSO:' + ' ' + <?php echo $titulo ?>)

    var columns = ["ID","NOMBRE"];
    var data = [

<?php

    $idcurso = $_POST['gstIdlsc'];
    setcookie("TestCookie", $idcurso, time()+3600); 

    $query = "SELECT gstIdlsc,gstNombr FROM listacursos 
              INNER JOIN cursos ON idmstr = gstIdlsc
              INNER JOIN personal ON gstIdper = idinsp
              WHERE gstIdlsc = $idcurso";
    $resultado = mysqli_query($conexion, $query);
    $x=0;
    while($curso = mysqli_fetch_assoc($resultado)) {
        $x++;

          $gstNombr = $curso['gstNombr'];

?>


    ['<?php echo $x?>','<?php echo $gstNombr?>'],

<?php }?>

];



    // var data = [
    //     [1, "NENFI REIBER", "INSPECTOR VERIFICADOR AERONÁUTICO DE LICENCIAS."],
    //     [2, "JUAN MANUEL", "INSPECTOR VERIFICADOR AERONÁUTICO DE OPERACIONES VUELO"],
    //     [3, "PEDRO JAVIER", "INSPECTOR VERIFICADOR AERONÁUTICO EN SMS-SSP"],
    //     [4, "NENFI REIBER", "INSPECTOR VERIFICADOR AERONÁUTICO DE LICENCIAS."],
    //     [5, "JUAN MANUEL", "INSPECTOR VERIFICADOR AERONÁUTICO DE LICENCIAS."],
    //     [6, "PEDRO JAVIER", "INSPECTOR VERIFICADOR AERONÁUTICO DE LICENCIAS."]
    // ];

    /* FUNCIÓN PARA CREAR EL PIE DE PAGINA*/
    const pageCount = pdf.internal.getNumberOfPages();
    for (var i = 1; i <= pageCount; i++) {
        pdf.setFontSize(8)
        pdf.setPage(i);
        pdf.text('Página ' + String(i) + ' de ' + String(pageCount), 220 - 20, 320 - 30, null, null,
            "right");
    }
    pdf.autoTable(columns, data, {
        margin: {
            top: 50,
            bottom: 15
        },
        styles: {

            overflow: 'linebreak',
            fontSize: 8
        },
        headStyles: {
            fillColor: [0, 0, 0],
            textColor: [0, 0, 0],
            fontSize: 8,
            padding: 0,
        },
        showHeader: 'everyPage',
        theme: 'grid'

    });

    window.open(pdf.output('bloburl'))


</script>

