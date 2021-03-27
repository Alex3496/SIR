
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

function hidepays(id) {
	var row = document.getElementById('col-paid');
	var row2 = document.getElementById('col-charge');
	if(id == 'payment_operator'){
		row.style.display = 'block';
		row2.style.display = 'none';
	}else if ( id == 'customer_charge' ){
		row2.style.display = 'block';
		row.style.display = 'none';
	}else if (id == 'both'){
		row2.style.display = 'block';
		row.style.display = 'block';
	}

}

function onloadHidePayments() {
	var row = document.getElementById('col-paid');
	var row2 = document.getElementById('col-charge'); 
    var radios = document.getElementsByName('pays');       
        for(i = 0; i < radios.length; i++) { 
            if(radios[i].checked){
            	if(radios[i].value == 'payment_operator'){
					row.style.display = 'block';
					row2.style.display = 'none';
				}else if ( radios[i].value == 'customer_charge' ){
					row2.style.display = 'block';
					row.style.display = 'none';
				}else if (radios[i].value == 'both'){
					row2.style.display = 'block';
					row.style.display = 'block';
				}
            }
            
        } 
} 

function load(){
	onloadHidePlates();
	onloadHidePayments();

}

window.onload = load;