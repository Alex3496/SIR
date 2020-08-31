function handlerSwitch(id, field,label) {

		var checkBox = document.getElementById(id);
		var field = document.getElementById(field);
		var label = document.getElementById(label);

  	if (checkBox.checked == true){
   		field.disabled = false;
   		label.innerHTML = 'Si';
  	} else {
    	field.disabled = true;
    	label.innerHTML = 'No';
  	}
	}


  function load() {

  	if(document.getElementById('ctpat_Switch').checked == true || document.getElementById('certificate_ctpat').disabled == false){
    	document.getElementById('ctpat_Switch-label').innerHTML = 'Si';
    	document.getElementById('ctpat_Switch').checked = true;
    	document.getElementById('certificate_ctpat').disabled = false
    }
  	
  	if(document.getElementById('OAE_Switch').checked == true || document.getElementById('certificate_oae').disabled == false){
    	document.getElementById('OAE_Switch-label').innerHTML = 'Si';
    	document.getElementById('OAE_Switch').checked = true;
    	document.getElementById('certificate_oae').disabled = false
    }


  	if(document.getElementById('fast_Switch').checked == true || document.getElementById('fast').disabled == false){
    	document.getElementById('fast_Switch-label').innerHTML = 'Si';
    	document.getElementById('fast_Switch').checked = true;
    	document.getElementById('fast').disabled = false
    }

  	if(document.getElementById('warehouse_Switch').checked == true || document.getElementById('warehouse').disabled == false){
    	document.getElementById('warehouse_Switch-label').innerHTML = 'Si';
    	document.getElementById('warehouse_Switch').checked = true;
    	document.getElementById('warehouse').disabled = false
    }

    if(document.getElementById('fiscal_warehouse_Switch').checked == true || document.getElementById('fiscal_warehouse').disabled == false){
    	document.getElementById('fiscal_warehouse_Switch-label').innerHTML = 'Si';
    	document.getElementById('fiscal_warehouse_Switch').checked = true;
    	document.getElementById('fiscal_warehouse').disabled = false
    }
  }
  window.onload = load;