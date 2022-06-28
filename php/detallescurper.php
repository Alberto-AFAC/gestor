<?php
	include("../conexion/conexion.php");
    header('Content-Type: application/json');
	session_start();
    $id_perinsp = $_GET["id_perinsp"];
   // $id = 'FO53';
	$query = "SELECT
	c.*,
	l.gstIdlsc,
	l.codigoCrso,
	l.gstTitlo,
	l.gstTipo,
	l.gstVignc,
	l.gstPrfil,
	l.gstTmrio,
	l.gstDrcin,
	l.gstCntnc,
	l.gstObjtv,
	l.gstFalta,
	l.gstProvd,
	l.gstCntro,
	DATE_FORMAT( c.fechaf, '%d/%m/%Y' ) AS fcursof,
	(
	SELECT
		MAX( cursos.fcurso ) 
	FROM
		cursos 
	WHERE
		cursos.idmstr = c.idmstr 
		AND cursos.idinsp = c.idinsp 
		AND l.gstVignc != 101 
		AND c.proceso = 'FINALIZADO' 
		AND c.confirmar = 'CONFIRMADO' 
		AND cursos.evaluacion >= 80 
		AND c.evaluacion >= 80 
		AND c.prtcpnt='SI'
		) AS recursado,(
	SELECT
		MAX(s.fcurso) 
	FROM
		cursos s,
		listacursos a 
	WHERE
		s.idinsp = c.idinsp 
		AND s.idmstr = a.gstIdlsc 
		AND l.gstVignc != 101 
		AND c.proceso = 'FINALIZADO' 
		AND c.confirmar = 'CONFIRMADO' 
		AND s.evaluacion >= 80 
		AND l.gstTipo = 'BÁSICOS/INICIAL' 
		AND a.gstTipo = 'RECURRENTES' 
		AND a.gstPrfil = l.gstPrfil 
		AND c.evaluacion >= 80
		AND c.prtcpnt='SI'
	) AS recurrente,
	CASE WHEN l.gstVignc !=101 THEN (select DATE_ADD(c.fechaf, INTERVAL l.gstVignc YEAR))
    Else 'UNICA VEZ'
    END AS pronostico,
		CASE WHEN DATE_FORMAT(NOW(), '%Y/%m/%d') < (select DATE_ADD(c.fechaf, INTERVAL l.gstVignc YEAR)) THEN 'vigente'
             ELSE 'vencido'
    END AS estatus
    FROM
    cursos c,
	listacursos l 
    WHERE
	l.gstIdlsc = c.idmstr 
	AND c.idinsp != c.idcoor 
	AND c.idinsp != c.idinst 
	AND c.estado = '0'
	and  c.idinsp=$id_perinsp 
    ORDER BY c.fcurso DESC";
	$resultado = mysqli_query($conexion, $query);
    $item = 0;
    if(!$resultado){
		die("error");
	}else{
        
        while($data = mysqli_fetch_assoc($resultado)){
            $item++;
        //--------------------------------------------------------------FUNCIONES--------------------------------------------------------------------------------------
            //Asistencia++++++++++++++++++++++++++++++++++++  
            $confr=$data["id_curso"];
            if ($data["confirmar"] == 'CONFIRMAR'){ 
                $confirmar = "<span style='color: grey;'>PENDIENTE</span>";
            }
            if ($data["confirmar"] == "CONFIRMADO") {
               $confirmar ="<span title='Confirma su asistencia' style='color: green;'>CONFIRMADO</span>";
            }
            if ($data["confirmar"] == "TRABAJO"){
                $confirmar ="<a type'button' onclick='modaldeclin(". $confr . ")' title='Ver detalles' data-toggle='modal' data-target='#modal-declinado' style='color: #BB2303; cursor: pointer;'>DECLINADO</a>";
                $status = "<span style='background-color: #BB2303; font-size: 14px;' class='badge'>DECLINADO</span>";
                $proc12 = "<span style='background-color: #BB2303; font-size: 14px;' class='badge'>DECLINADO</span>";
            }
            if ($data["confirmar"] == "ENFERMEDAD"){
                $confirmar = "<a type'button' onclick='modaldeclin(" . $confr . ")' title='Ver detalles' data-toggle='modal' data-target='#modal-declinado' style='color: #BB2303; cursor: pointer;'>DECLINADO</a>";
                $status = "<span style='background-color: #BB2303; font-size: 14px;' class='badge'>DECLINADO</span>";
                $proc12 = "<span style='background-color: #BB2303; font-size: 14px;' class='badge'>DECLINADO</span>";
            }
            if ($data["confirmar"] == "OTROS" && $data["justifi"] != 'NO ASISTIÓ'){
                $confirmar = "<a type'button' onclick='modaldeclin(" . $confr . ")' title='Ver detalles' data-toggle='modal' data-target='#modal-declinado' style='color: #BB2303; cursor: pointer;'>DECLINADO</a>";
                $status = "<span style='background-color: #BB2303; font-size: 14px;' class='badge'>DECLINADO</span>";
                $proc12 = "<span style='background-color: #BB2303; font-size: 14px;' class='badge'>DECLINADO</span>";
            }
            if ($data["confirmar"] == "OTROS" && $data["justifi"] == 'NO ASISTIÓ' && $data["proceso"] == 'FINALIZADO'){
                $confirmar = "<a type'button' onclick='modaldeclin(" . $confr . ")' title='Ver detalles' data-toggle='modal' data-target='#modal-declinado' style='color: #BB2303; cursor: pointer;'>NO ASISTIO</a>";
                $status = "<span style='background-color: #BB2303; font-size: 14px;' class='badge'>DECLINADO</span>";
                $proc12 = "<span style='background-color: #BB2303; font-size: 14px;' class='badge'>DECLINADO</span>";
                $valua = "";
            }
            if ($data["confirmar"] == "OTROS" && $data["justifi"] == 'NO ASISTIÓ' && $data["proceso"] == 'PENDIENTE'){
                $confirmar = "<a type'button' onclick='modaldeclin(" . $confr . ")' title='Ver detalles' data-toggle='modal' data-target='#modal-declinado' style='color: #BB2303; cursor: pointer;'>NO ASISTIO</a>";
                $status = "<span style='background-color: #BB2303; font-size: 14px;' class='badge'>NO ACREDITO</span>";
                $proc12 = "<span style='color:grey; font-size: 14px;'>PENDIENTE</span>";
                $valua = "";
            }
            //Procesos+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
            $factual = date('d-m-Y');
	        $Fechainicur = date("d-m-Y",strtotime($data["fcurso"]));
            $Fechafincur = date("d-m-Y",strtotime($data["fechaf"]));

            if (($factual == $Fechainicur) && ($factual <= $Fechafincur)){ //intervalo de tiempo
                $proc12 = "<span style='color: #3C8DBC; font-size: 14px;'>EN CURSO</span>";
            }else{
                if ($data["proceso"] == "FINALIZADO" && $data["confirmar"] == 'CONFIRMADO'){
                    $proc12 = "<span style='color: green; font-size: 14px;'>FINALIZADO</span>";
                }
                if ($data["proceso"] == "PENDIENTE" && $data["confirmar"] == 'CONFIRMADO'){
                    $proc12 = "<span style='color:grey; font-size: 14px;'>PENDIENTE</span>";
                }
                if ($data["proceso"] == "PENDIENTE" && $data["confirmar"] == 'CONFIRMAR'){
                    $proc12 = "<span style='font-weight: bold;color:grey; font-size: 14px;'>PENDIENTE</span>";
                }
            }
            //Evaluación+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
            if ($data["evaluacion"] == 'NULL' && $data["confirmar"] == 'CONFIRMADO' && $data["proceso"] == 'PENDIENTE'|| $data["evaluacion"] == "" && $data["confirmar"] == 'CONFIRMADO' && $data["proceso"] == 'PENDIENTE'){
                $valua = "<p style='font-weight: bold; color: grey; font-size: 14px;'>FALTA EVALUACIÓN</p>";
            }
            if ($data["evaluacion"] == 'NULL' && $data["confirmar"] == 'CONFIRMADO'  && $data["proceso"] == 'FINALIZADO'|| $data["evaluacion"] == "" && $data["confirmar"] == 'CONFIRMADO'  && $data["proceso"] == 'FINALIZADO'){
                $valua = "<p style='font-weight: bold; color: grey; font-size: 14px;'>FALTA EVALUACIÓN</p>";
            }
            if ($data["evaluacion"] >= 80 && $data["evaluacion"] != 0 && $data["evaluacion"] != "NULL" && $data["confirmar"] == 'CONFIRMADO'){
                $valua = "<p style='color: green; font-size: 14px;'>APROBO</p>";
            }
            if ($data["evaluacion"] <= 79 && $data["evaluacion"] != "NULL" && $data["confirmar"] == 'CONFIRMADO' || $data["evaluacion"] <= 79 && $data["evaluacion"] != "0" && $data["confirmar"] == 'CONFIRMADO'){
                $valua = "<p style='color: red; font-size: 14px;'>NO APROBO</p>";
            }
            if ($data["evaluacion"] == "NULL" && $data["confirmar"] == 'CONFIRMAR' || $data["evaluacion"] <= 79 && $data["evaluacion"] == "0" && $data["confirmar"] == 'CONFIRMAR'){
                $valua = "<p style='color: grey; font-size: 14px;'>PENDIENTE</p>";
            }            
            //Vigencia++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
            ini_set('date.timezone','America/Mexico_City');
            //-----COMPARACIÓN DE FECHAS DE VENCIMIENTO
		    $facnow = strtotime(Date("Y-m-d"));
            $ftermino = strtotime(Date($data["fechaf"]));
            $vence = strtotime(Date($data["pronostico"]));
            $xpencer = strtotime(Date($vence."- 6 month"));
            //--UNICA VEZ ¡¡¡¡¡
            if ($data["gstVignc"] == 101){
               // $status = 'UNICA VEZ';
                if ($data["confirmar"] == 'CONFIRMADO' && $data["proceso"] == "FINALIZADO" && $data["evaluacion"] >= 80 && $data["pronostico"]=="UNICA VEZ"){
                    $status = "<span style='background-color:#3C8DBC; font-size: 14px;' class='badge'>UNICA VEZ</span>";
                }//unica vez (101)
                if ($data["confirmar"] == 'CONFIRMADO' && $data["proceso"] == "FINALIZADO" && $data["evaluacion"] <= 79 && $data["pronostico"]=="UNICA VEZ"){
                    $status ="<span style='background-color:#BB2303; font-size: 14px;' class='badge'>NO ACREDITADO</span>";
                }//unica vez no acreditado
                //PENDIENTE  ¡¡¡¡¡
                if ($data["proceso"] == "PENDIENTE" && $data["confirmar"] == 'CONFIRMADO' && $data["evaluacion"] == '' || $data["proceso"] == "PENDIENTE" && $data["confirmar"] == 'CONFIRMADO' && $data["evaluacion"] == 'NULL'||$data["proceso"] == "PENDIENTE" && $data["confirmar"] == 'CONFIRMADO' && $data["evaluacion"] == '0'){
                    $status = "<span style='background-color:grey; font-size: 14px;' class='badge'>PENDIENTE</span>";
                }
                if ($data["proceso"] == "PENDIENTE" && $data["confirmar"] == 'CONFIRMAR' && $data["evaluacion"] == '' || $data["proceso"] == "PENDIENTE" && $data["confirmar"] == 'CONFIRMAR' && $data["evaluacion"] == 'NULL'||$data["proceso"] == "PENDIENTE" && $data["confirmar"] == 'CONFIRMAR' && $data["evaluacion"] == '0'){
                    $status = "<span style='background-color:grey; font-size: 14px;' class='badge'>PENDIENTE</span>";
                }
                if ($data["confirmar"] == 'CONFIRMADO' && $data["proceso"] == "FINALIZADO" && $data["evaluacion"] == '' || $data["confirmar"] == 'CONFIRMADO' && $data["proceso"] == "FINALIZADO" && $data["evaluacion"] == 'NULL'){
                    $status = "<span style='backgrou    nd-color:grey; font-size: 14px;' class='badge'>PENDIENTE3</span>";
                }
            }else{
                //VIGENTES ¡¡¡¡¡
                if ($facnow < $vence){
                    if ($data["gstTipo"] == 'BÁSICOS/INICIAL'){
                        if ($facnow > $xpencer && $data["fcurso"] == $data["recurrente"] && $data["evaluacion"] >= 80 && $data["confirmar"] == 'CONFIRMADO' && $data["proceso"] == "FINALIZADO") {
                            $status = "<span style='background-color: green; font-size: 14px;' class='badge'>VIGENTE</span>";
                        }
                        if ($facnow > $xpencer && $data["recurrente"]==NULL && $data["evaluacion"] >= 80 && $data["confirmar"] == 'CONFIRMADO' && $data["proceso"] == "FINALIZADO") {
                            $status = "<span style='background-color: green; font-size: 14px;' class='badge'>VIGENTE</span>";
                        }
                        //NO ACREDITO ¡¡¡¡
                        if ($data["evaluacion"] <= 79 && $data["confirmar"] == 'CONFIRMADO' && $data["proceso"] == "FINALIZADO") {
                            $status = "<span style='background-color:#BB2303; font-size: 14px;' class='badge'>NO ACREDITADO</span>";
                        }
                        //POR VENCER ¡¡¡¡¡
                        if ($facnow <= $xpencer && $data["recurrente"]== NULL && $data["evaluacion"] >= 80 && $data["confirmar"] == 'CONFIRMADO' && $data["proceso"] == "FINALIZADO") {
                            $status = $vence."<span style='background-color: orange; font-size: 14px;' class='badge'>POR VENCER</span>";
                        }
                        //PENDIENTE ¡¡¡¡¡¡
                        if ($data["recurrente"]== NULL && $data["proceso"] == "PENDIENTE" && $data["confirmar"] == 'CONFIRMADO' && $data["evaluacion"] == '' || $data["proceso"] == "PENDIENTE" && $data["confirmar"] == 'CONFIRMADO' && $data["evaluacion"] == 'NULL'||$data["proceso"] == "PENDIENTE" && $data["confirmar"] == 'CONFIRMADO' && $data["evaluacion"] == '0'){
                            $status = "<span style='background-color:grey; font-size: 14px;' class='badge'>PENDIENTE</span>";
                        }
                        if ($data["recurrente"]== NULL && $data["confirmar"] == 'CONFIRMADO' && $data["proceso"] == "FINALIZADO" && $data["evaluacion"] == '' || $data["confirmar"] == 'CONFIRMADO' && $data["proceso"] == "FINALIZADO" && $data["evaluacion"] == 'NULL'){
                            $status = "<span style='background-color:grey; font-size: 14px;' class='badge'>PENDIENTE3</span>";
                        }
                        if ($data["recurrente"]== NULL && $data["confirmar"] == 'CONFIRMAR' && $data["proceso"] == "FINALIZADO" && $data["evaluacion"] == '' || $data["confirmar"] == 'CONFIRMAR' && $data["proceso"] == "FINALIZADO" && $data["evaluacion"] == 'NULL' || $data["confirmar"] == 'CONFIRMAR' && $data["proceso"] == "FINALIZADO" && $data["evaluacion"] == '0'){
                            $status = "<span style='background-color:grey; font-size: 14px;' class='badge'>PENDIENTE</span>";
                        }
                        if ($data["recurrente"]== NULL && $data["proceso"] == "PENDIENTE" && $data["confirmar"] == 'CONFIRMAR' && $data["evaluacion"] == '' || $data["proceso"] == "PENDIENTE" && $data["confirmar"] == 'CONFIRMAR' && $data["evaluacion"] == 'NULL'||$data["proceso"] == "PENDIENTE" && $data["confirmar"] == 'CONFIRMAR' && $data["evaluacion"] == '0'){
                            $status = "<span style='background-color:grey; font-size: 14px;' class='badge'>PENDIENTE</span>";
                        }
                        //TOMA RECURRENCIA  ¡¡¡¡¡
                        if ($data["fcurso"] < $data["recurrente"] && $data["evaluacion"] >= 80 && $data["confirmar"] == 'CONFIRMADO') {
                            //$recurrente = strtotime(Date($data["recurrente"]));
                            $recurrente = date("d-m-Y",strtotime($data["recurrente"]));
                            $span="<br><span style='background-color:#083368; font-size: 14px;' class='badge'>RECURRENCIA</span>";
                            $status = $recurrente.$span;
                        }
                    }else{
                        if ($facnow > $xpencer && $data["fcurso"] == $data["recursado"] && $data["evaluacion"] >= 80 && $data["confirmar"] == 'CONFIRMADO' && $data["proceso"] == "FINALIZADO") {
                            $status = "<span style='background-color: green; font-size: 14px;' class='badge'>VIGENTE</span>";
                        }
                        //NO ACREDITO ¡¡¡¡
                        if ($data["evaluacion"] <= 79 && $data["confirmar"] == 'CONFIRMADO' && $data["proceso"] == "FINALIZADO") {
                            $status = "<span style='background-color:#BB2303; font-size: 14px;' class='badge'>NO ACREDITADO</span>";
                        }
                        //POR VENCER ¡¡¡¡¡
                        if ($facnow <= $xpencer && $data["fcurso"] == $data["recursado"] && $data["evaluacion"] >= 80 && $data["confirmar"] == 'CONFIRMADO' && $data["proceso"] == "FINALIZADO") {
                            $status = $vence."<span style='background-color: orange; font-size: 14px;' class='badge'>POR VENCER</span>";
                        }
                        //PENDIENTE  ¡¡¡¡¡
                        if ($data["fcurso"] == $data["recursado"] && $data["proceso"] == "PENDIENTE" && $data["confirmar"] == 'CONFIRMADO' && $data["evaluacion"] == '' || $data["proceso"] == "PENDIENTE" && $data["confirmar"] == 'CONFIRMADO' && $data["evaluacion"] == 'NULL'||$data["proceso"] == "PENDIENTE" && $data["confirmar"] == 'CONFIRMADO' && $data["evaluacion"] == '0'){
                            $status = "<span style='background-color:grey; font-size: 14px;' class='badge'>PENDIENTE</span>";
                        }
                        if ($data["fcurso"] == $data["recursado"] && $data["confirmar"] == 'CONFIRMADO' && $data["proceso"] == "FINALIZADO" && $data["evaluacion"] == '' || $data["confirmar"] == 'CONFIRMADO' && $data["proceso"] == "FINALIZADO" && $data["evaluacion"] == 'NULL'){
                            $status = "<span style='background-color:grey; font-size: 14px;' class='badge'>PENDIENTE</span>";
                        }
                        if ($data["fcurso"] == $data["recursado"] && $data["confirmar"] == 'CONFIRMAR' && $data["proceso"] == "FINALIZADO" && $data["evaluacion"] == '' || $data["confirmar"] == 'CONFIRMAR' && $data["proceso"] == "FINALIZADO" && $data["evaluacion"] == 'NULL' || $data["confirmar"] == 'CONFIRMAR' && $data["proceso"] == "FINALIZADO" && $data["evaluacion"] == '0'){
                            $status = "<span style='background-color:grey; font-size: 14px;' class='badge'>PENDIENTE</span>";
                        }
                        if ($data["fcurso"] == $data["recursado"] && $data["proceso"] == "PENDIENTE" && $data["confirmar"] == 'CONFIRMAR' && $data["evaluacion"] == '' || $data["proceso"] == "PENDIENTE" && $data["confirmar"] == 'CONFIRMAR' && $data["evaluacion"] == 'NULL'||$data["proceso"] == "PENDIENTE" && $data["confirmar"] == 'CONFIRMAR' && $data["evaluacion"] == '0'){
                            $status = "<span style='background-color:grey; font-size: 14px;' class='badge'>PENDIENTE</span>";
                        }
                        //RENUEVA RECURRENCIA ¡¡¡¡
                        if ($data["fcurso"] < $data["recursado"] && $data["evaluacion"] >= 80 && $data["confirmar"]  == 'CONFIRMADO') {
                           // $recursado = strtotime(Date($data["recursado"]));
                            $recursado = date("d-m-Y",strtotime($data["recursado"]));
                            $span="<br><span style='background-color:#083368; font-size: 14px;' class='badge'>RENOVADO</span>";
                            $status = $recursado.$span;
                        }
                    }    
                //VENCIDOS
                }else if ($facnow > $vence){
                    /*if ($data["confirmar"] == 'CONFIRMADO' && $data["proceso"] == "FINALIZADO" && $data["evaluacion"] >= 80){
                        $status = "<span style='background-color:#BB2303; font-size: 14px;' class='badge'>VENCIDO</span>";
                    }//VENCIDO  */
                    if ($data["evaluacion"] <= 79 && $data["confirmar"] == 'CONFIRMADO' && $data["proceso"] == "FINALIZADO") {
                        $status = "<span style='background-color:#BB2303; font-size: 14px;' class='badge'>NO ACREDITADO</span>";
                    }
                    if ($data["gstTipo"] == 'BÁSICOS/INICIAL'){

                        if ($data["fcurso"] == $data["recurrente"] && $data["evaluacion"] >= 80 && $data["confirmar"] == 'CONFIRMADO' && $data["proceso"] == "FINALIZADO") {
                            $status = "<span style='background-color:#BB2303; font-size: 14px;' class='badge'>VENCIDO</span>";
                        }
                        if ($data["recurrente"]==NULL && $data["evaluacion"] >= 80 && $data["confirmar"] == 'CONFIRMADO' && $data["proceso"] == "FINALIZADO") {
                            $status = "<span style='background-color:#BB2303; font-size: 14px;' class='badge'>VENCIDO</span>";
                        }
                        if ($data["recurrente"]== NULL && $data["confirmar"] == 'CONFIRMAR' && $data["proceso"] == "FINALIZADO" && $data["evaluacion"] == '' || $data["confirmar"] == 'CONFIRMAR' && $data["proceso"] == "FINALIZADO" && $data["evaluacion"] == 'NULL' || $data["confirmar"] == 'CONFIRMAR' && $data["proceso"] == "FINALIZADO" && $data["evaluacion"] == '0'){
                            $status = "<span style='background-color:#BB2303; font-size: 14px;' class='badge'>NO ACREDITADO</span>";
                        }
                        if ($data["fcurso"] < $data["recurrente"] && $data["evaluacion"] >= 80 && $data["confirmar"] == 'CONFIRMADO') {
                            //$recurrente = strtotime(Date($data["recurrente"]));
                            $recurrente = date("d-m-Y",strtotime($data["recurrente"]));
                            $span="<br><span style='background-color:#083368; font-size: 14px;' class='badge'>RECURRENCIA</span>";
                            $status = $recurrente.$span;
                        }
                    
                    }else{
                        if ($data["fcurso"] == $data["recursado"] && $data["evaluacion"] >= 80 && $data["confirmar"] == 'CONFIRMADO' && $data["proceso"] == "FINALIZADO") {
                            $status = "<span style='background-color:#BB2303; font-size: 14px;' class='badge'>VENCIDO</span>";
                        }
                        if ($data["fcurso"] < $data["recursado"] && $data["evaluacion"] >= 80 && $data["confirmar"]  == 'CONFIRMADO') {
                            // $recursado = strtotime(Date($data["recursado"]));
                             $recursado = date("d-m-Y",strtotime($data["recursado"]));
                             $span="<br><span style='background-color:#083368; font-size: 14px;' class='badge'>RENOVADO</span>";
                             $status = $recursado.$span;
                        }
                        if ($data["fcurso"] == $data["recursado"] && $data["confirmar"] == 'CONFIRMAR' && $data["proceso"] == "FINALIZADO" && $data["evaluacion"] == '' || $data["confirmar"] == 'CONFIRMAR' && $data["proceso"] == "FINALIZADO" && $data["evaluacion"] == 'NULL' || $data["confirmar"] == 'CONFIRMAR' && $data["proceso"] == "FINALIZADO" && $data["evaluacion"] == '0'){
                            $status = "<span style='background-color:#BB2303; font-size: 14px;' class='badge'>NO ACREDITADO</span>";
                        }
                    }
                }
            }
            //contenido de la tabla--------------------------------------------------------------------------
            $cursos[] = [ 
                $item,
                $data["codigo"], 
                $data["gstTitlo"],
                $data["gstTipo"],
                $Fechainicur,
                $data["hcurso"],
                $Fechafincur,
                $confirmar,
                $status,
                $proc12.$valua
            ];
        }
	}
	if(isset($cursos)&&!empty($cursos )){
        $json_string = json_encode(array( 'data' => $cursos ));
        echo $json_string;
        }else{
        echo $cursos ='0';
        }
    mysqli_free_result($resultado);
    mysqli_close($conexion);

?>
