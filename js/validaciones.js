function validarInput(input) {
	var curp = input.value.toUpperCase(),
    	resultado = document.getElementById("resultado"),
        valido = "No válido";
        //document.getElementById("resultado").style.color = "red";
        //document.getElementById("resultado1").style.display = ""
        //document.getElementById("resultado").style.display = "none"
        document.getElementById("labelinval").style.display = ""
        document.getElementById("labelvalid").style.display = "none"
    if (curpValida(curp)) {
    	valido = "Válido";
        resultado.classList.add("ok");
       // document.getElementById("resultado").style.color = "green";
        //document.getElementById("resultado").style.display = ""
        //document.getElementById("resultado1").style.display = "none"
        document.getElementById("labelvalid").style.display = ""
        document.getElementById("labelinval").style.display = "none"
    	resultado.classList.remove("ok");
    }
        
    resultado.innerText =   valido;
}

function curpValida(curp) {
	var re = /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0\d|1[0-2])(?:[0-2]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/,
    	validado = curp.match(re);
	
    if (!validado)  //Coincide con el formato general?
    	return false;
    
    //Validar que coincida el dígito verificador
    function digitoVerificador(curp17) {
        //Fuente https://consultas.curp.gob.mx/CurpSP/
        var diccionario  = "0123456789ABCDEFGHIJKLMNÑOPQRSTUVWXYZ",
            lngSuma      = 0.0,
            lngDigito    = 0.0;
        for(var i=0; i<17; i++)
            lngSuma= lngSuma + diccionario.indexOf(curp17.charAt(i)) * (18 - i);
        lngDigito = 10 - lngSuma % 10;
        if(lngDigito == 10)
            return 0;
        return lngDigito;
    }
    if (validado[2] != digitoVerificador(validado[1])) 
    	return false;
	return true; //Validado
}

//--------------------------------codigo postal--------------------------------
/*var input=  document.getElementById('gstCpstl');
input.addEventListener('input',function(){
  if (this.value.length > 5) 
     this.value = this.value.slice(0,5); 
     
})*/
//Función para validar un RFC
// Devuelve el RFC sin espacios ni guiones si es correcto
// Devuelve false si es inválido
// (debe estar en mayúsculas, guiones y espacios intermedios opcionales)
function rfcValido(rfc, aceptarGenerico = true) {
    const re       = /^([A-ZÑ&]{3,4}) ?(?:- ?)?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])) ?(?:- ?)?([A-Z\d]{2})([A\d])$/;
    var   validado1 = rfc.match(re);

    if (!validado1)  //Coincide con el formato general del regex?
        return false;

    //Separar el dígito verificador del resto del RFC
    const digitoVerificador = validado1.pop(),
          rfcSinDigito      = validado1.slice(1).join(''),
          len               = rfcSinDigito.length,

    //Obtener el digito esperado
          diccionario       = "0123456789ABCDEFGHIJKLMN&OPQRSTUVWXYZ Ñ",
          indice            = len + 1;
    var   suma,
          digitoEsperado;

    if (len == 12) suma = 0
    else suma = 481; //Ajuste para persona moral

    for(var i=0; i<len; i++)
        suma += diccionario.indexOf(rfcSinDigito.charAt(i)) * (indice - i);
    digitoEsperado = 11 - suma % 11;
    if (digitoEsperado == 11) digitoEsperado = 0;
    else if (digitoEsperado == 10) digitoEsperado = "A";

    //El dígito verificador coincide con el esperado?
    // o es un RFC Genérico (ventas a público general)?
    if ((digitoVerificador != digitoEsperado)
     && (!aceptarGenerico || rfcSinDigito + digitoVerificador != "XAXX010101000"))
        return false;
    else if (!aceptarGenerico && rfcSinDigito + digitoVerificador == "XEXX010101000")
        return false;
    return rfcSinDigito + digitoVerificador;
}


//Handler para el evento cuando cambia el input
// -Lleva la RFC a mayúsculas para validarlo
// -Elimina los espacios que pueda tener antes o después
function validarInputRF(input) {
    var rfc         = input.value.trim().toUpperCase(),
        resultado1   = document.getElementById("resultado1"),
        valido1;
        
    var rfcCorrecto = rfcValido(rfc);   // ⬅️ Acá se comprueba
  
    if (rfcCorrecto) {
    	valido1 = "Válido";
      resultado1.classList.add("ok");
      document.getElementById("labelvalidrfc").style.display = ""
      document.getElementById("labelinvarfc").style.display = "none"
    } else {labelinvarfc
    	valido1 = "No válido"
    	resultado1.classList.remove("ok");
        document.getElementById("labelvalidrfc").style.display = "none"
        document.getElementById("labelinvarfc").style.display = ""
    }
        
}

//------------------------------------------------------------------------------------------------
//mascara para telefono
document.getElementById('gstCasa').addEventListener('input', function (e) {
    var x = e.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,4})(\d{0,4})/);
    e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
  });
//mascara para celular
document.getElementById('gstClulr').addEventListener('input', function (e) {
    var x = e.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,4})(\d{0,4})/);
    e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
  });
  //valida telefono con extension
 

  //vaidar email

