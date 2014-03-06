var itemsBarraEstado = new Array();
var contadorItemsBarraEstado = 0;
function showItemBarraEstado(nombre)
{
	hideItems();
	$("#div_contenido_"+nombre).show();				
}
function addItemBarraEstado(nombre,src)
{
	var i;
	if(findItem(nombre))
	{
		showItemBarraEstado(nombre);
	}
	else
	{
		hideItems();
		$("#contenido").append('<div id="div_contenido_'+nombre+'">contenido '+nombre+'</div>');
		$("#barraestado").append('<div id="div_barra_'+nombre+'" class="div_barraestado"><a href="javascript: addItemBarraEstado(\''+nombre+'\')">'+nombre+'</a></div>');
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
			return true;
		}
	}
	return false;
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
	$("#div_contenido_"+nombre).remove();
	$("#div_barra_"+nombre).remove();
}
function hideItems()
{
	var i;
	for(i=0;i<=contadorItemsBarraEstado;i++)
	{
		$("#div_contenido_"+itemsBarraEstado[i]).hide();
	}
}