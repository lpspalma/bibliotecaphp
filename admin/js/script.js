// JavaScript Document

function valida(recid,reccapa){
	if(confirm("Tem certeza de que deseja excluir este registro?")){
		window.location="excprod.php?id=" + recid + "&capa=" + reccapa;
	}
}