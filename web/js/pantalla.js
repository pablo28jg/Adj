var itemsBarraEstado = new Array();
var contadorItemsBarraEstado = 0;
function showItemBarraEstado(nombre)
{
	hideItems();
	$("#contenido_"+nombre).show();				
}
function addItemBarraEstado(nombre)
{
	var i;
	if(findItem(nombre))
	{
		showItemBarraEstado(nombre);
	}
	else
	{
		hideItems();
		$("#contenido").append('<div id="contenido_'+nombre+'">'+nombre+'</div>');
		$("#barraestado").append('<div id="barra_'+nombre+'">'+nombre+'</div>');
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
	$("#contenido_"+nombre).remove();
	$("#barra_"+nombre).remove();
}
function hideItems()
{
	var i;
	for(i=0;i<=contadorItemsBarraEstado;i++)
	{
		$("#contenido_"+itemsBarraEstado[i]).hide();
	}
}