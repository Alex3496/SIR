
/*
*	Dependiendo del checkbox seleccionado, muestra o esconde los campos de las placas
*
*/
function hidePlates(id) {
	var row = document.getElementById('row-plates-us');
	var row2 = document.getElementById('row-plates-mx');
	if(id == 'P_US'){
		row.style.display = 'flex';
		row2.style.display = 'none';
	}else if ( id == 'P_MX' ){
		row2.style.display = 'flex';
		row.style.display = 'none';
	}else if (id == 'P_both'){
		row2.style.display = 'flex';
		row.style.display = 'flex';
	}

}

function onloadHidePlates() {
	var row = document.getElementById('row-plates-us');
	var row2 = document.getElementById('row-plates-mx'); 
    var radios = document.getElementsByName('plates');       
        for(i = 0; i < radios.length; i++) { 
            if(radios[i].checked){
            	if(radios[i].value == 'P_US'){
					row.style.display = 'flex';
					row2.style.display = 'none';
				}else if ( radios[i].value == 'P_MX' ){
					row2.style.display = 'flex';
					row.style.display = 'none';
				}else if (radios[i].value == 'P_both'){
					row2.style.display = 'flex';
					row.style.display = 'flex';
				}
            }
            
        } 
} 

  window.onload = onloadHidePlates;