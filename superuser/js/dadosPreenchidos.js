function checaDados(){
		with(document.form1){
			if (nm_morador.value == ""){
				alert("Favor preencher o campo nome!");
				nm_morador.focus();
				return false;
			}

			if (ds_endereco.value == ""){
				alert("Favor preencher o campo endereço!");
				ds_endereco.focus();
				return false;
			}
			
		/*	if (nr_endereco.value == ""){
				alert("Favor preencher o campo número no endereço!");
				nr_endereco.focus();
				return false;
			}
*/
			if (nm_bairro.value == ""){
				alert("Favor preencher o campo bairro!");
				nm_bairro.focus();
				return false;
			}

			if (nm_cidade.value == ""){
				alert("Favor preencher o campo cidade!");
				nm_cidade.focus();
				return false;
			}

			if (sg_uf.value == ""){
				alert("Favor selecionar um estado (UF)!");
				sg_uf.focus();
				return false;
			}
			
			if (nr_cep.value == ""){
				alert("Favor preencher o campo cep!");
				nr_cep.focus();
				return false;
			}
/*
			if (fone_morador.value == "" && nr_celular.value == ""){
				alert("Favor preencher o campo telefone ou celular!");
				fone_morador.focus();
				return false;
			}
		*/	
		}
	}
	
function checaDados2(){
		with(document.form1){
			if (senha_usuario.value == ""){
				alert("Favor preencher o campo nova senha!");
				senha_usuario.focus();
				return false;
			}

			if (confirma_senha.value == ""){
				alert("Favor preencher o campo confirmação!");
				confirma_senha.focus();
				return false;
			}
			
			if (senha_usuario.value != confirma_senha.value){
				alert("O campo senha e confirma senha possuem valores diferentes!");
				senha_usuario.value = "";
				confirma_senha.value = "";
				senha_usuario.focus();				
				return false;
			}
		}
	}

function checaDados3(){
		with(document.form1){
			if (login_usuario.value == ""){
				alert("Favor preencher o campo login!");
				login_usuario.focus();
				return false;
			}

			if (senha_atual.value == ""){
				alert("Favor preencher o campo senha atual!");
				senha_atual.focus();
				return false;
			}

			if (senha_usuario.value == ""){
				alert("Favor preencher o campo senha!");
				senha_usuario.focus();
				return false;
			}

			if (confirma_senha.value == ""){
				alert("Favor preencher o campo confirma senha!");
				confirma_senha.focus();
				return false;
			}
			
			if (senha_usuario.value != confirma_senha.value){
				alert("O campo senha e confirma senha possuem valores diferentes!");
				senha_usuario.value = "";
				confirma_senha.value = "";
				senha_usuario.focus();				
				return false;
			}
		}
	}
	

	
function checaCampos(){
		with(document.form1){
			if(nome.value == ""){
				alert('Insira seu nome!');
				nome.focus();
				return false;
			}
			if(email.value == ""){
				alert('Insira seu email!');
				email.focus();
				return false;
			}
			if(mensagem.value == ""){
				alert('Insira uma mensagem!');
				mensagem.focus();
				return false;
			}
		}
	}


function checaCampos2(){
		with(document.form_login){
			if(login_usuario.value == ""){
				alert('Favor inserir o login!');
				login_usuario.focus();
				return false;
			}
			if(senha_usuario.value == ""){
				alert('Favor inserir a senha!');
				senha_usuario.focus();
				return false;
			}
		}
	}	