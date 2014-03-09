var itemsBarraEstado = new Array();
var contadorItemsBarraEstado = 0;
function showItemBarraEstado(nombre)
{
	hideItems();
	$("#div_contenido_"+nombre).show();				
}
function addItemBarraEstado(nombre,titulo,src)
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
			ventana += '<div>contenido expedientes</div>';
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