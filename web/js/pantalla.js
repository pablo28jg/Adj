var itemsBarraEstado = new Array();
var contadorItemsBarraEstado = 0;
function showItemBarraEstado(nombre)
{
	hideItems();
	$("#div_contenido_"+nombre).show();				
}
function addItemBarraEstado(nombre,titulo,src,srcAtributos)
{
	var i;
	var ventana, item;
	if(findItem(nombre) != -1)
	{
		showItemBarraEstado(nombre);
	}
	else
	{
		hideItems();
		ventana = '<div id="div_contenido_'+nombre+'">';
			ventana += '<div class="div_titulo_ventana">';
				ventana += '<div class="div_titulo_ventana_titulo">' + titulo + '</div>';
				ventana += '<div><a href="javascript: removeItemBarraEstado(\'' + nombre + '\')">x</a></div>';
			ventana += '</div>';
			ventana += '<div id="div_cuerpo_contenido_' + nombre + '">';
				ventana += '<div class="div_encabezado_contenido">encabezado</div>';
				ventana += '<div class="div_cuerpo_contenido">cuerpo</div>';
				ventana += '<div class="div_pie_contenido">pie</div>';
			ventana += '</div>';
		ventana += '</div>';
		$("#contenido").append(ventana);
		item = '<div id="div_barra_'+nombre+'" class="div_barraestado">';
		item = item + '<a href="javascript: addItemBarraEstado(\''+nombre+'\')">'+nombre+'</a>';
		item = item + '</div>';
		$("#barraestado").append(item);
		i = findVacio();
		if(i == -1)
		{
			itemsBarraEstado[contadorItemsBarraEstado] = nombre;
			contadorItemsBarraEstado++;	
		}	
		else
			itemsBarraEstado[i] = nombre;
		atributos(nombre,srcAtributos);
		contenido(nombre,src);
	}			
}
function findItem(nombre)
{
	var i;
	for(i=0;i<=contadorItemsBarraEstado;i++)
	{
		if(itemsBarraEstado[i] == nombre )
		{
			return i;
		}
	}
	return -1;
}
function findVacio()
{
	var i;
	for(i=0;i<=contadorItemsBarraEstado;i++)
	{
		if(itemsBarraEstado[i] == '' )
			return i;
	}
	return -1;
}
function removeItemBarraEstado(nombre)
{
	var i = findItem(nombre);
	$("#div_contenido_"+nombre).remove();
	$("#div_barra_"+nombre).remove();
	itemsBarraEstado[i] = '';
}
function hideItems()
{
	var i;
	for(i=0;i<=contadorItemsBarraEstado;i++)
	{
		$("#div_contenido_"+itemsBarraEstado[i]).hide();
	}
}

function modulos(src)
{
	alert(src);
	$("#barralateral").load(src);
}

function atributos(nombre,src)
{
	//var cadena = ArmaCadena( "form" );	
    //alert( src );
	$.ajax({
		async:true,
		type: "GET",
		dataType: "html",
		contentType: "application/x-www-form-urlencoded",
		url:src,
		//data:"op=op&" + cadena,
		beforeSend:inicioEnvio,
		success:llegadaDatos,
		timeout:10000,
		error:problemas
	}); 		 
	function inicioEnvio()
	{
		$("#div_cuerpo_contenido_" + nombre + " .div_encabezado_contenido").html("");
		$("#div_cuerpo_contenido_" + nombre + " .div_pie_contenido").html("");		
	}			
	function llegadaDatos(datos)
	{			
		//alert( datos );
		$("#div_cuerpo_contenido_" + nombre + " .div_encabezado_contenido").html(datos);
		$("#div_cuerpo_contenido_" + nombre + " .div_pie_contenido").html(datos);
	}			
	function problemas()
	{
		//FunProblems();
		alert("problema");
	}
}

function contenido(nombre,src)
{
	//var cadena = ArmaCadena( "form" );	
    alert( src );
	$.ajax({
		async:true,
		type: "GET",
		dataType: "html",
		contentType: "application/x-www-form-urlencoded",
		url:src,
		//data:"op=op&" + cadena,
		beforeSend:inicioEnvio,
		success:llegadaDatos,
		timeout:10000,
		error:problemas
	}); 		 
	function inicioEnvio()
	{
		$("#div_cuerpo_contenido_" + nombre + " .div_cuerpo_contenido").html("");	
	}			
	function llegadaDatos(datos)
	{			
		//alert( datos );
		$("#div_cuerpo_contenido_" + nombre + " .div_cuerpo_contenido").html(datos);
	}			
	function problemas()
	{
		//FunProblems();
		alert("problema");
	}
}

function loadAtributos()
{
	
}