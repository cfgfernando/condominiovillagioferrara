
var cFuncoes = {
	
	// Cursor no primeiro campo
	focusOnFirst:function(){
		// Pega o valor da vari�vel oculta, pois tem p�gina que n�o quero o focus
		// Nas p�ginas sem focus, eu crio outro elemento igual, mas com outro valor
		var nenhum = document.getElementById("nenhum").value;
		
		if(nenhum == ""){
			var aInputs = document.getElementsByTagName("input");
			//faz enquanto houver inputs
			for(var i=0; i<aInputs.length; i++){
				if (aInputs[i].getAttribute("type") == "hidden"){ continue; }
				if (aInputs[i].getAttribute("type") == "file")  { continue; }
				if (aInputs[i].getAttribute("type") == "submit"){ continue; }
				if (aInputs[i].getAttribute("type") == "button"){ continue;	}
				if (aInputs[i].getAttribute("type") == "radio") { continue;	}
				aInputs[i].focus();
				return false;
			}
		}
	},

	// Confirma os dados do formul�rio de contato:
	checaCampos:function(formulario){
		var teste = formulario;
		var form = document.getElementById(teste);
		with(form){
			if(nome.value == ""){
				alert("Preencha o seu nome!");
				nome.focus();
				return false
			}
			if(email.value == ""){
				alert("Preencha o seu email!");
				email.focus();
				return false
			}
			if(telefone.value == ""){
				alert("Preencha o seu telefone!");
				telefone.focus();
				return false
			}
			if(uf.value == ""){
				alert("Selecione o estado!");
				uf.focus();
				return false
			}
			if(comentarios.value == ""){
				alert("Preencha o campo de comentarios!");
				comentarios.focus();
				return false
			}
		}
	},
	
	// Abre um pop-up:
	AbrePopup:function(url,titulo,parametros){
		window.open(url,titulo,parametros);
	},
	verificaSite:function(){
		if($('.autor').text() == 'Rolly Santos'){
			alert('Parabens.');
		} else {
			alert('Voc� foi v�tima de uma fraude! Ligue para (19) 98156-2916 para obter o script original.');
		}
	}
	
}

addEvent(window,"load",cFuncoes.focusOnFirst);
addEvent(window,"load",cFuncoes.verificaSite);




