$('document').ready(function(){

		mouse_is_insideNotificacao=false; 
		mouse_is_insideDropusuario=true;
		mouse_is_insideFiltro = false;
		mouse_is_insideMensagem = false;
		focusPesquisa = false;
		clicado = false;
		things = "not doing";
		$('#dropusr').fadeOut(0,0);
		$('#setausr').fadeOut(0,0); 
		$('#diverro').fadeOut(0,0);
		$('.mudafotousuario').fadeOut(0,0);
		$('.mudafotoassunto').fadeOut(0,0);
		$("#cinzatransp").fadeOut(0,0);
		$('#divmsginv').fadeOut(0,0);
		$('.divFiltro').fadeOut(0,0);
		$('.divFiltro2').fadeOut(0,0);
		diff=false;
		
		rolando = false;

		//=====================================================ALterar Usuario==================================//

		$.ajax({
			url:"../controller/ControllerUsuario.php",
			type:"POST",
			data:{
				acao: "consultaSelectTodosNomesNoAdm"
			},
		})
		.done(function(result){
			$("#usrtoadmin").html(result);
		});

		$("#usrtoadmin").select2({

			 width: "220", 
			 placeholder: "Nome do Usuário"

		});

		$.ajax({
			url:"../controller/ControllerUsuario.php",
			type:"POST",
			data:{
				acao: "consultaSelectTodosNomesNoCommon"
			},
		})
		.done(function(result){
			$("#admtousr").html(result);
		});

		$("#admtousr").select2({

			 width: "220", 
			 placeholder: "Nome do Usuário"

		});

		$.ajax({
			url:"../controller/ControllerUsuario.php",
			type:"POST",
			data:{
				acao: "consultaSelectTodosNomesNoBan"
			},
		})
		.done(function(result){
			$("#usrtonot").html(result);
		});

		$("#usrtonot").select2({

			 width: "220", 
			 placeholder: "Nome do Usuário"

		});

		$.ajax({
			url:"../controller/ControllerUsuario.php",
			type:"POST",
			data:{
				acao: "consultaSelectTodosNomesNoUnban"
			},
		})
		.done(function(result){
			$("#nottousr").html(result);
		});


		$("#nottousr").select2({

			 width: "220", 
			 placeholder: "Nome do Usuário"

		});

		

		$('#divmsginv').hover(function(){
			mouse_is_insideMensagem = true;
		}, function(){
			mouse_is_insideMensagem = false;
		});

		$('#cinzatransp').click(function(){
			if (mouse_is_insideMensagem) {

			}else{
				$("#cinzatransp").slideUp();
				$('#divmsginv').slideUp();
			}
		});

		$('#alteraPerfil').click(function(){
			$.ajax({
				url:"../telas/alteraPerfil.php",
				type:"POST",
			})
			.done(function(result){
				$("#mudar").html(result);
			});
		});

		$('#inputPesquisa').focus(function(){
			$('.divFiltro').show();
			focusPesquisa = true;
		});

		$('#inputPesquisa').focusout(function(){
			focusPesquisa = false;
		});	
		$('body').click(function(){
			if ((!mouse_is_insideFiltro)&&(!focusPesquisa)){
				$('.divFiltro').fadeOut(0,0);
			}

		});
		
		$('.pesquisa1').change(function(){
			if (this.value == 'usuario'){
				$('.divFiltro2').show();
			}else{
				$('.divFiltro2').fadeOut(0,0);
			}
		});

		$('.divFiltro').hover(function(){
			mouse_is_insideFiltro = true;
		},function(){
			mouse_is_insideFiltro = false;
		});

		$('#visaogeral').click(function(){
			$.ajax({
				url:"../telas/mostraPerfil.php",
				type:"POST",
				data:{acao: "visaogeral", id:$('#id').val()},
			})
			.done(function(result){

				location.reload();
				
			});
		});


		$('#topicosusuario').click(function(){
			$.ajax({
				url:"../telas/mostraPerfil.php",
				type:"POST",
				data:{acao: "topicosrecentes", id:$('#id').val()},
			})
			.done(function(result){

				$('#mudar').html(result);
			});
		});

		$('#postsusuario').click(function(){
			$.ajax({
				url:"../telas/mostraPerfil.php",
				type:"POST",
				data:{acao: "postsrecentes", id:$('#id').val()},
			})
			.done(function(result){
				$('#mudar').html(result);
				
			});
		});
		
		$('.expand').click(function(){
		
			if (clicado){

				$('#dropusr').fadeOut(0.0);	
	        	$('#setausr').fadeOut(0.0);	
	        	clicado = false;
			}else{

				$('#dropusr').show();
				$('#setausr').show();
				clicado = true;
				mouse_is_insideDropusuario=true;
			}
		});
		
	    $('#dropusr').hover(function(){ 
	        mouse_is_insideDropusuario=true; 
	    }, function(){ 
	        mouse_is_insideDropusuario=false; 
	    });
	    $("body").click(function(){ 
	        if(!mouse_is_insideDropusuario){
	        	$('#dropusr').fadeOut(0.0);	
	        	$('#setausr').fadeOut(0.0);	
	        	clicado = false;
	        } 
	    });

		//======================================================================================================//
		//===============================================Notificações==========================================//

		$("#englobaNotificacao").hide();
		$("#notificacao").click(function(){;
			$("#englobaNotificacao").fadeIn(1);
			mouse_is_insideNotificacao=true;

			var numN = parseInt($("#numNotificacaoNum").text());
		   	if(numN > 5){
		   		$("#janelaNotific").css("height","360px");
		   	}
		});
		
	    $('#englobaNotificacao').hover(function(){ 
	        mouse_is_insideNotificacao=true; 
	    }, function(){ 
	        mouse_is_insideNotificacao=false; 
	    });
	    $('#loginbar').hover(function(){
	    	mouse_is_insideNotificacao=true;
	    });
	    $("body").click(function(){ 
	        if(!mouse_is_insideNotificacao){
	        	$('#englobaNotificacao').fadeOut(1);	
	        } 
	    });
	    //======================================================================================================//
		//===============================================Mensagem===============================================//
		
		$("#marcarMsg").click(function(){
			if($('#marcarMsg').prop('checked')){
				$('.inputExMsg').prop('checked', true);
			}else{
				$('.inputExMsg').prop('checked', false);
			}
		});

		$("#excluirTudo").click(function(){
			var x = false;
			var y = false;
			$(".inputExMsg:checked").each(function(e){
				x = true;
				if($(this).attr("enviadas") == "env"){
					y = true;
				}
			});
			if(x == true){
				$(".inputExMsg:checked").each(function(e){
					if(y){
						$.ajax({
							url:"../controller/ControllerMensagem.php",
							type:"POST",
							data:{
								acao:"excluirEnviadas",
								idMsg: $(this).attr("id")
							},
						});	
					}else{
						$.ajax({
							url:"../controller/ControllerMensagem.php",
							type:"POST",
							data:{
								acao:"excluirRecebido",
								idMsg: $(this).attr("id")
							},
						});	
						excluirVisualizar($(this).attr("id"));
					}
				});

				alertify.success('Mensagens Excluidas !');	
				setTimeout(function(){
				    location.reload();
				}, 1500);
			}else{
				alertify.alert('Selecione alguma mensagem !');
			}
		});

		$("#restaurarTudo").click(function(){
			var x = false;

			$(".inputExMsg:checked").each(function(e){
				x = true;
			});
			if(x == true){
				$(".inputExMsg:checked").each(function(e){
					$.ajax({
						url:"../controller/ControllerMensagem.php",
						type:"POST",
						data:{
							acao:"restaurarMensagem",
							idMsg: $(this).attr("id")
						},
					});	
				});

				alertify.success('Mensagens Restauradas !');	
				setTimeout(function(){
				    location.href = "http://localhost/PFC/telas/telaMensagem.php?acao=listarRecebidas";
				}, 1500);
			}else{
				alertify.alert('Selecione alguma mensagem !');
			}
		});

		if ($('#caixaMsg').is(':empty')){
  			$('#caixaMsg').html("<br><span style='margin: auto; width:170px; display:block;'>> Nenhuma Mensagem <</span>");
  			$('#botoesMsg').html("");
		}

		$(".msgListaMensagem").hide();

		$(".tituloListaMensagem").click(function(){
			titulo = $(this).text();
			$.ajax({
			 	url:"../controller/ControllerMensagem.php",
			 	data:{
			 		acao:"consultaPorTitulo",
			 		titulo:titulo,
			 	},
			 	type:"POST",
			 })
			 .done(function(result){
			 	$('#divmsginv').html(result);
			 })
			$("#cinzatransp").fadeIn();
			$('#divmsginv').fadeIn();

			excluirVisualizar(titulo);// id da mensagem -gambiarra-
		});



		$(".tabelaMsg").dblclick(function(){
			$(this).children("div").slideUp("fast");
		});

		$("#enviarMensagem").click(function(){
			if(rolando == false){
				rolando = true;

				if($("#selectUsuarioMensagem").val() == ""){
					mostraErro("Selecione um Destinatário !!!");
					rolando = false;
				}else{
					if($('#tituloMsg').val() == ""){
						mostraErro("Insira um Título !!!");
						$('#tituloMsg').css("border","1px ridge red");
						focar("tituloMsg");
						rolando = false;
					}else{
						if($('#tituloMsg').val().length < 3){
							mostraErro("O título deve ter mais de 2 caracteres !!!");
							$('#tituloMsg').css("border","1px ridge red");
							focar("tituloMsg");
							rolando = false;
						}else{
							if($('#textareaMsg').val() == ""){
							 	mostraErro("Insira a Mensagem !!!");
							 	$('#textareaMsg').css("border","1px ridge red");
							 	focar("textareaMsg");
							 	rolando = false;
							}else{
								if($('#textareaMsg').val().length < 2){
							 		mostraErro("A mensagem deve ter mais de 1 caracter !!!");
							 		$('#textareaMsg').css("border","1px ridge red");
							 		focar("textareaMsg");
							 		rolando = false;
								}else{
								 	$.ajax({
										url:"../controller/ControllerMensagem.php",
										type:"POST",
										data:{
											acao: "cadastrar",
											texto: $("#textareaMsg").val(),
											titulo: $("#tituloMsg").val(),
											nomeUserDestino: $("#selectUsuarioMensagem").val()
										},
									})
									.done(function(result){
										if (result == "erro"){
											alertify.error("Problema ao enviar Mensagem");
										}else{
											alertify.success("Mensagem enviada com sucesso!");
											setTimeout(function(){
											   location.href= "telaMensagem.php?acao=listarRecebidas";
											}, 1500);
										}
									});
								}
							} 
						}
					}
				}

			}else{
				validaClick();
			}
		});
		
		$("#responderMensagem").click(function(){
			if(rolando == false){
				rolando = true;

				if($('#tituloMsg').val() == ""){
					mostraErro("Insira um Título !!!");
					$('#tituloMsg').css("border","1px ridge red");
					focar("tituloMsg");
					rolando = false;
				}else{
					if($('#tituloMsg').val().length < 3){
						mostraErro("O título deve ter mais de 2 caracteres !!!");
						$('#tituloMsg').css("border","1px ridge red");
						focar("tituloMsg");
						rolando = false;
					}else{
						if($('#textareaMsg').val() == ""){
						 	mostraErro("Insira a Mensagem !!!");
						 	$('#textareaMsg').css("border","1px ridge red");
						 	focar("textareaMsg");
						 	rolando = false;
						}else{
							if($('#textareaMsg').val().length < 2){
						 		mostraErro("A mensagem deve ter mais de 1 caracter !!!");
						 		$('#textareaMsg').css("border","1px ridge red");
						 		focar("textareaMsg");
						 		rolando = false;
							}else{
							 	$.ajax({
									url:"../controller/ControllerMensagem.php",
									type:"POST",
									data:{
										acao: "cadastrar",
										texto: $("#textareaMsg").val(),
										titulo: $("#tituloMsg").val(),
										nomeUserDestino: $("#user").val()
									},
								})
								.done(function(result){
									if (result == "erro"){
										alertify.error("Problema ao enviar Mensagem");
									}else{
										alertify.success("Mensagem enviada com sucesso!");
										setTimeout(function(){
										   location.href= "telaMensagem.php?acao=listarRecebidas";
										}, 1500);
									}
								});
							}
						}
					} 
				}
			}else{
				validaClick();
			}
		});

		//======================================================================================================//
		//==========================================Controle Email e Username==================================//
		
		$("#email").focusout(function() {
	    	 $.ajax({
			 	url:"../controller/ControllerUsuario.php",
			 	data:{
			 		email: $("#email").val(),
			 		acao:"consultaEmail"
			 	},
			 	type:"POST",
			 })
			 .done(function(result){
			 	if(validaTamanho($('#email').val())){
					mostraErro("Insira um e-mail com mais de 3 caracteres");
					$('#email').css('border', '1px ridge red');

				}else if (validaEmail2($('#email').val())){
					mostraErro("Insira um e-mail vÃ¡lido");		
					$('#email').css('border', '1px ridge red');	

				}else if(!result == 1){
			 		setTimeout(function(){
			 			$("#confemail").html("");
			 			$('#email').css('border', '2px ridge lightgreen');
			 		},1000); 
			 	}else{
			 		setTimeout(function(){
			 			$("#confemail").html("Este Email ja existe");
			 			$('#email').css('border', '2px ridge red');
			 		},1000); 
			 	}
			 })
	    });
	    $("#username").focusout(function() {
	    	 $.ajax({
			 	url:"../controller/ControllerUsuario.php" ,
			 	data:{
			 		username: $("#username").val(),
			 		acao:"consultaUsername"
			 	},
			 	type:"POST",
			 })
			 .done(function(result){
			 	if (validaTamanho($('#username').val())){
					mostraErro("Insira um nome de usuÃ¡rio com mais de 3 caracteres");
					$('#username').css('border', '1px ridge red');

				}else if(!result == 1){
			 		setTimeout(function(){
			 			$("#confuser").html("");
			 			$('#username').css('border', '2px ridge lightgreen');
			 		},1000);
			 	}else{
					setTimeout(function(){
			 			$("#confuser").html("Este usuario ja existe");
			 			$('#username').css('border', '2px ridge red');
			 		},1000);
			 	}
			 })
	    });

	    //===================================================================================================//
		//==================================================Fade de Login====================================//

		$("#invisivel").hide();
		$('.login').click(function(){
			$("#invisivel").show(400);
			setTimeout(function(){
				$("#nomeusrLogin").focus();
			}, 400);
		});	
		mouse_is_inside=false;
		 $('.divtelafade').hover(function(){ 
	        mouse_is_inside=true; 
	    }, function(){ 
	        mouse_is_inside=false; 
	    });
	    $("#invisivel").click(function(){ 
	        if(!mouse_is_inside){
	        	$('#invisivel').hide(700);
	        } 
	    });
	    $("#cancelarlogin").click(function(){ 
	        $('#invisivel').hide(700);
	    });

	    //=====================================================Post==================================//
		$(".formulario").validate();
		
		$('#post').bind('keydown', function(e) { 
			var keyCode = e.keyCode || e.which; 

			if (keyCode == 9) { 
				e.preventDefault(); 
				var s = this.selectionStart;
				this.value = this.value.substring(0,this.selectionStart) + "\t" + this.value.substring(this.selectionEnd);
	            this.selectionEnd = s+1; 
			} 
			
		});

		$('#respostaPost').click(function(){
			if(rolando == false){
				rolando = true;
				if($('#post').val() == ""){
				 	alertify.alert("Preencha o campo Post");
				 	rolando = false;
				}else{
				 	$.ajax({
						url:"../controller/ControllerPost.php",
						type:"POST",
						data:{
							acao:"cadastrar",
							id_topico:$('[name="id_topico"]').val(),
							texto:$('#post').val()
						},
					})
					.done(function(result){

						if (result == "erro"){
							alertify.error("Problema ao cadastrar post");
						}else{
							alertify.success("Post criado com sucesso");
							setTimeout(function(){
							   location.href= result;
							}, 1500);
						}
					});
				} 
			}else{
				validaClick();
			}	
		});

		//=====================================================Img Usuario==================================//
		$('.imgusrhover').hover(function(){
			$('.mudafotousuario').fadeIn(300);
		}, function(){
			$('.mudafotousuario').hide();
		});
		$('.mudafotousuario').click(function(){
			$('#mudaimg').click();
		});
		$('#mudaimg').change(function(e){
			$('#formimg').submit();
		});

		$('.imgusrhover').hover(function(){
			$(this).children('.mudafotoassunto').fadeIn(200);
		}, function(){
			$(this).children('.mudafotoassunto').hide();
		});
		$('.mudafotoassunto').click(function(){
			$(this).parent().children('.formimg').children('.mudaimgas').click();
		});
		$('.mudaimgas').change(function(e){
			$(this).parent().children('.botas').click();
		});

		//=====================================================Cadastro FAQ==================================//
		$('#cadastrofaq').click(function(){
			if(rolando == false){
				rolando = true;
				if(validaTamanho($('#pergunta').val())){
					mostraErro("Insira uma pergunta com mais de 3 caracteres");
					$('#pergunta').css('border', '1px ridge red');

				}else if(validaTamanho($('#resposta').val())){
					mostraErro("Insira uma resposta com mais de 3 caracteres");
					$('#email').css('border', '1px ridge red');
				}else{
					$.ajax({
						url:"../controller/ControllerFaq.php",
						type:"POST",
						data:{
							acao:"cadastrar",
							pergunta:$('#pergunta').val(),
							resposta:$('#resposta').val(),
						},
					})
					.done(function(result){
						if (result == "false"){
							alertify.error("Problema ao cadastrar pergunta frequente");
						}else{
							alertify.success("Pergunta frequente cadastrada com sucesso");
							setTimeout(function(){
							    location.href= result;
							}, 1500);
						}
					});
				}
			}else{
				validaClick();
			}
		});
		//=================================================Painel ADM==================================//

		$('#tornarAdmNome').keydown(function(e) {
			if (e.keyCode == '13') {
				$('#tornarAdm').click();
			}
		});

		$('#admtousr').keydown(function(e) {
			if (e.keyCode == '13') {
				$('#removAdm').click();
			}
		});

		$('#usrtonot').keydown(function(e) {
			if (e.keyCode == '13') {
				$('#banUsr').click();
			}
		});

		$('#nottousr').keydown(function(e) {
			if (e.keyCode == '13') {
				$('#resUsr').click();
			}
		});

		$("#tornarAdm").click(function(){
			if($('#usrtoadmin').val().length > 2){
				alertify.confirm("Quer mesmo tornar <b style='font-size: 17px'> "+$("#usrtoadmin").val()+" </b> um Administrador?",
				  function(){
				  	$.ajax({
						url:"../controller/ControllerUsuario.php",
						type:"POST",
						data:{
							acao: "cadastrarAdmin",
							usernameAdmin: $("#usrtoadmin").val()
						},
					})
					.done(function(result){
						if(result != "null"){
							alertify.success($("#usrtoadmin").val()+" agora é um Administrador.");
							setTimeout(function(){
								location.reload();
							}, 2000);
						}else{
							alertify.error("Usuário Escolhido Inexistente.");
						}
					});
				  },
				  function(){
				    alertify.error('Cancelado');
				  });
			}else{
				mostraErro("Insira um nome de Usuário com mais de 2 Caracteres!");
				$('#usrtoadmin').css('border', '2px ridge red');
				focar("usrtoadmin");
				setTimeout(function(){
					$('#usrtoadmin').css('border', '2px ridge gray');
				}, 3000);
			}
		});

		$("#removAdm").click(function(){
			if($('#admtousr').val().length > 2){
				alertify.confirm("Quer mesmo retirar <b style='font-size: 17px'> "+$("#admtousr").val()+" </b> como Administrador?",
				  function(){
				  	$.ajax({
						url:"../controller/ControllerUsuario.php",
						type:"POST",
						data:{
							acao: "excluirAdmin",
							usernameAdmin: $("#admtousr").val()
						},
					})
					.done(function(result){
						if(result != "null"){
							alertify.success($("#admtousr").val()+" não é mais um Administrador.");
							setTimeout(function(){
								location.reload();
							}, 2000);
						}else{
							alertify.error("Usuário Escolhido Inexistente.");
						}
					});
				  },
				  function(){
				    alertify.error('Cancelado');
				  });
			}else{
				mostraErro("Insira um nome de Usuário com mais de 2 Caracteres!");
				$('#admtousr').css('border', '2px ridge red');
				focar("admtousr");
				setTimeout(function(){
					$('#admtousr').css('border', '2px ridge gray');
				}, 3000);
			}
		});

		$("#banUsr").click(function(){
			if($('#usrtonot').val().length > 2){
				alertify.confirm("Quer mesmo banir <b style='font-size: 17px'> "+$("#usrtonot").val()+" </b>?",
				  function(){
				  	$.ajax({
						url:"../controller/ControllerUsuario.php",
						type:"POST",
						data:{
							acao: "banirUsuario",
							usernameUsuario: $("#usrtonot").val()
						},
					})
					.done(function(result){
						if(result != "null"){
							alertify.success($("#usrtonot").val()+" foi banido!");
							setTimeout(function(){
								location.reload();
							}, 2000);
						}else{
							alertify.error("Usuário Escolhido Inexistente.");
						}
					});
				  },
				  function(){
				    alertify.error('Cancelado');
				  });
			}else{
				mostraErro("Insira um nome de Usuário com mais de 2 Caracteres!");
				$('#usrtonot').css('border', '2px ridge red');
				focar("usrtonot");
				setTimeout(function(){
					$('#usrtonot').css('border', '2px ridge gray');
				}, 3000);
			}
		});

		$("#resUsr").click(function(){
			if($('#nottousr').val().length > 2){
				alertify.confirm("Quer mesmo restaurar <b style='font-size: 17px'> "+$("#nottousr").val()+" </b>?",
				  function(){
				  	$.ajax({
						url:"../controller/ControllerUsuario.php",
						type:"POST",
						data:{
							acao: "resgatarUsuario",
							usernameUsuario: $("#nottousr").val()
						},
					})
					.done(function(result){
						if(result != "null"){
							alertify.success($("#nottousr").val()+" foi restaurado!");
							setTimeout(function(){
								location.reload();
							}, 2000);
						}else{
							alertify.error("Usuário Escolhido Inexistente.");
						}
					});
				  },
				  function(){
				    alertify.error('Cancelado');
				  });
			}else{
				mostraErro("Insira um nome de Usuário com mais de 2 Caracteres!");
				$('#nottousr').css('border', '2px ridge red');
				focar("nottousr");
				setTimeout(function(){
					$('#nottousr').css('border', '2px ridge gray');
				}, 3000);
			}
		});

		//=================================================Cadastro Usuario==================================//

		$('#cadastrarUsuario').click(function(){
			if(rolando == false){
				rolando = true;

				if(validaTamanho($('#nomeusuario').val())){
					mostraErro("insira um nome com mais de 3 caracteres");
					$('#nomeusuario').css('border', '1px ridge red');

				}else if (validaNome($('#nomeusuario').val()) ){
					mostraErro("Insira um nome válido");
					$('#nomeusuario').css('border', '1px ridge red');

				}else if(validaTamanho($('#email').val())){
					mostraErro("Insira um e-mail com mais de 3 caracteres");
					$('#email').css('border', '1px ridge red');

				}else if (validaEmail2($('#email').val())){
					mostraErro("Insira um e-mail válido");		
					$('#email').css('border', '1px ridge red');	

				}else if (validaTamanho($('#username').val())){
					mostraErro("Insira um nome de usuário com mais de 3 caracteres");
					$('#username').css('border', '1px ridge red');

				}else if (tamanhoSenha($('#senha').val())){
					mostraErro("Insira uma senha com mais de 5 caracters");
					$('#senha').css('border', '1px ridge red');

				}else if (validaSenha($('#senha').val(), $('#csenha').val())){
					mostraErro("As senhas digitadas não são iguais");
					$('#csenha').css('border', '1px ridge red');

				}else{
					$.ajax({
						url:"../controller/ControllerUsuario.php",
						type:"POST",
						data:{
							acao:"cadastrar",
							nomeusuario:$('#nomeusuario').val(),
							email:$('#email').val(),
							username:$('#username').val(),
							senha:$('#senha').val(),
						},
					})
					.done(function(result){

						if (result == "false"){
							alertify.error("Problema ao cadastrar usuário");
						}else{
							alertify.success("Usuário cadastrado com sucesso");
							setTimeout(function(){
							    location.href= "../telas/index.php";
							}, 1500);
						}
					});
				}
			}else{
				validaClick();
			}
		});

	//=================================================Cadastro Assunto==================================//
	$('#cadastraAssunto').click(function(){
		if(validaTamanho($('#nome').val())){
			mostraErro("Insira um título com mais de 3 caracteres");
			$('#nome').css('border', '2px ridge red');

		}else if(validaTamanho($('#descricao').val())){
			mostraErro("Insira uma descrição com mais de 3 caracteres");
			$('#descricao').css('border', '2px ridge red');

		}else if ($("#selectUsuarioAssunto").val() == ""){
			mostraErro("Selecione um grupo");

		}else{
			if (!diff){
				$.ajax({
					url:"../controller/ControllerAssunto.php",
					type:"POST",
					data:{
						acao:"cadastrar",
						titulo:$('#nome').val(),
						descricao:$('#descricao').val(),
						grupo:$('.select2-hidden-accessible').text(),
					},
				})
				.done(function(result){
					if (result == "false"){
						alertify.error("Problema ao cadastrar assunto");
					}else{
						alertify.success("Assunto cadastrado com sucesso!");
						setTimeout(function(){
						    location.href= "../telas/index.php";
						}, 1500);
					}
				});
			}else{
				if(validaTamanho($('#grupo').val())){
					mostraErro("Insira um grupo com mais de 3 caracteres");
					$('#grupo').css('border', '2px ridge red');

				}else{
					$.ajax({
					url:"../controller/ControllerAssunto.php",
					type:"POST",
					data:{
						acao:"cadastrar",
						titulo:$('#nome').val(),
						descricao:$('#descricao').val(),
						grupo:$('#grupo').val(),
					},
					})
					.done(function(result){
						if (result == "false"){
							alertify.error("Problema ao cadastrar assunto");
						}else{
							alertify.success("Assunto cadastrado com sucesso!");
							setTimeout(function(){
							    location.href= "../telas/index.php";
							}, 1500);
						}
					});
				}
			}
		}
	});

	$.ajax({
		url:"../controller/ControllerAssunto.php",
		type:"POST",
		data:{
			acao: "consultaGrupos"
		},
	})
	.done(function(result){
		$("#selectUsuarioAssunto").html(result);
		$("#selectUsuarioAssunto").select2({

		 width: "280", 
		 placeholder: "Grupo",

	});

 	//============================================================================================================//
	//===================================================== Logar  ===============================================//

	$('#nomeusrLogin').keydown(function(e) {
		if (e.keyCode == '13') {
			if(rolando == false){	
				rolando = true;
				
				if($('#nomeusrLogin').val() == ""){
					rolando = false;
					mostraErro("Insira um nome de Usuário !");
					$('#nomeusrLogin').css('border', '1px ridge red');
					focar("nomeusrLogin");
				}else{
					if($('#senhaLogin').val() == ""){
						rolando = false;
						mostraErro("Insira a senha !");
						$('#senhaLogin').css('border', '1px ridge red');
						focar("senhaLogin");
					}else{
						logar();
					}
				}
			}else{
				validaClick();
			}
		}
	});

	$('#senhaLogin').keydown(function(e) {
		if (e.keyCode == '13') {
			if(rolando == false){	
				rolando = true;
				
				if($('#nomeusrLogin').val() == ""){
					rolando = false;
					mostraErro("Insira um nome de Usuário !");
					$('#nomeusrLogin').css('border', '1px ridge red');
					focar("nomeusrLogin");
				}else{
					if($('#senhaLogin').val() == ""){
						rolando = false;
						mostraErro("Insira a senha !");
						$('#senhaLogin').css('border', '1px ridge red');
						focar("senhaLogin");
					}else{
						logar();
					}
				}
			}else{
				validaClick();
			}
		}
	});

	});
	$('#botlogin').click(function(){
		if(rolando == false){
			rolando = true;

			if($('#nomeusrLogin').val() == ""){
				rolando = false;
				mostraErro("Insira um nome de Usuário !");
				$('#nomeusrLogin').css('border', '1px ridge red');
				focar("nomeusrLogin");
			}else{
				if($('#senhaLogin').val() == ""){
					rolando = false;
					mostraErro("Insira a senha !");
					$('#senhaLogin').css('border', '1px ridge red');
					focar("senhaLogin");
				}else{
					logar();
				}
			}
		}else{
			validaClick();
		}
	});
}); // <---- FIM DA READY FUNCTION//

	//===================================================Funcoes Genericas/Especificas==================================//


	function geraSelectMsg(){
		$("document").ready(function(){
			$("#selectUsuarioMensagem").select2({

				 width: "220", 
				 placeholder: "Usuário Destino"

			});

			$.ajax({
				url:"../controller/ControllerUsuario.php",
				type:"POST",
				data:{
					acao: "consultaSelectTodosNomes"
				},
			})
			.done(function(result){
				alert(result);
				$("#selectUsuarioMensagem").html(result);
			});
		});
	}

	function logarAuto(nome, senha){

		$.ajax({
			url:"../controller/ControllerUsuario.php",
			type:"POST",
			data:{
				acao:"autologar",
				username:nome,
				senha:senha,
			},
			})
		.done(function(result){
			location.reload();
		});	
	}

	function logar(){
		if($('#lembrarme').is(':checked')){
			hue=1;
		}else{
			hue=2
		}
		$.ajax({
		url:"../controller/ControllerUsuario.php",
		type:"POST",
		data:{
			acao:"logar",
			username:$('#nomeusrLogin').val(),
			senha:$('#senhaLogin').val(),
			lembrarme:hue,
		},
		})
		.done(function(result){
			if (result == "erro"){
				mostraErro("Usuário e Senha não combinam !");
			}else{
				alertify.success("Usuário logado com sucesso.");
				setTimeout(function(){
				    location.href= result;
				}, 1000);
				$('#invisivel').fadeOut(1000);
			}
		});	
	}

	function excluirVisualizar(id){
		$.ajax({
			url:"../controller/ControllerMensagem.php",
			type:"POST",
			data:{
				acao:"visualizar",
				idmensagem: id,
			},
			})
		.done(function(result){
			
			consultaNumMensagem();
		});	
	}
	
	function focar(focarEm){
		$('document').ready(function(){ 
			$('#'+focarEm).focus();
		})
	}

	function excluirNotificacao(usr,top){
		 $.ajax({
		 	async : false,
			url:"../dao/DaoNotificacao.php",
			type:"POST",
			data:{acao: "excluir" ,id_usuario: usr , id_topico: top},
		  }).done(function() {
	   		 return true;
		  });
	}

	function excluirMensagemRecebida(id){
		alertify.confirm("Deseja mesmo Excluir esta mensagem?",
		  function(){
		  	$.ajax({
				url:"../controller/ControllerMensagem.php",
				type:"POST",
				data:{
					acao:"excluirRecebido",
					idMsg: id
				},
			})
			.done(function(result){
				alertify.success('Mensagem Excluida');	
				setTimeout(function(){
				    location.reload();
				}, 1500);
			});
		  },
		  function(){
		    alertify.error('Exclusão Cancelada');
		  });		
	}

	function restaurarMensagem(id){
		alertify.confirm("Deseja mesmo Restaurar esta mensagem?",
		  function(){
		  	$.ajax({
				url:"../controller/ControllerMensagem.php",
				type:"POST",
				data:{
					acao:"restaurarMensagem",
					idMsg: id
				},
			})
			.done(function(result){
				alertify.success('Mensagem Restaurada');	
				setTimeout(function(){
				    location.href = "../telas/telaMensagem.php?acao=listarRecebidas";
				}, 1500);
			});
		  },
		  function(){
		    alertify.error('Restauração Cancelada');
		  });		
	}

	function excluirMensagemEnviada(id){
		alertify.confirm("Deseja mesmo Excluir esta mensagem?", function(){
		  	$.ajax({
				url:"../controller/ControllerMensagem.php",
				type:"POST",
				data:{
					acao:"excluirEnviadas",
					idMsg: id,
				},
			})
			.done(function(result){
				alertify.success('Mensagem Excluida');	
				setTimeout(function(){
				   location.reload();
				}, 1500);
			});
		},function(){
		    alertify.error('Exclusão Cancelada');
		});		
	}

	function excluirAssunto(id,acao){
		alertify.confirm("Deseja mesmo Excluir este assunto?",function(){
			$.ajax({
				url:"../controller/ControllerAssunto.php",
				type:"POST",
				data:{
					acao:"excluir",
					id: id
				},
			})
			.done(function(result){
				alertify.success("Excluido com sucesso");	
				setTimeout(function(){
				   location.reload();
				}, 1500);
			});
		  },
		  function(){
		    alertify.error('Exclusão Cancelada');
		});
	}

	function excluiPost(id,ativo){
		if (ativo == 1){
			var texto = "Deseja excluir essa postagem?";
		}else {
			var texto = "Deseja recriar essa postagem?";
		}
		alertify.confirm(texto, function (e) {
		   	if (e) {
		        $.ajax({
					url:"../controller/ControllerPost.php",
					type:"POST",
					data:{
						acao:"excluir",
						id: id
					},
				})
				.done(function(result){
					if (result == "excluir"){
						alertify.success("Post removido com sucesso");
					}else{
						alertify.success("Post recriado com sucesso");

					}
					setTimeout(function(){
					    location.reload();
					}, 1500);	
				});
		    } else {
		        // user clicked "cancel"
		    }
		});
	}

	function excluiFaq(id){
		var texto = "Deseja excluir essa pergunta?";
		alertify.confirm(texto, function (e) {
		   	if (e) {
		        $.ajax({
					url:"../controller/ControllerFaq.php",
					type:"POST",
					data:{
						acao:"excluir",
						id: id
					},
				})
				.done(function(result){
					if (result == "excluir"){
						alertify.success("Pergunta removida com sucesso");
					}else{
						alertify.error("Erro ao excluir pergunta");

					}
					setTimeout(function(){
					    location.reload();
					}, 1500);
				});
		    } else {
		       alertify.error('Exclusão Cancelada.');
		    }
		});
	}

	function alteraFaq1(id){
		$.ajax({
			url:"../controller/ControllerFaq.php",
			type:"POST",
			data:{
				acao:"consultarPorId",
				id: id,
			},
		})
		.done(function(result){
			$('.box80').html(result);
		});
	}

	function consultaNumMensagem(){
		$.ajax({
			url:'../controller/ControllerMensagem.php',
			type:'POST',
			data:{acao: 'consultaVisualizadas'},
		})
		.done(function(result){
			if(result == 0){
				$('#numMsg').html("");
			}else{
				$('#numMsg').html("("+result+")");
			}
		});
	}
	
	function consultaNumNotificacao(){
		$.ajax({
			url:'../controller/ControllerNotificacao.php',
			type:'POST',
			data:{acao: 'consultarNum'},
		})
		.done(function(result){
			$('#notificacao').html(result);
		});
	}

	function geraNumNotificacao(){
		$.ajax({
			url:'../controller/ControllerNotificacao.php',
			type:'POST',
			async: false,
			data:{acao: 'consultarNumNum'},
		})
		.done(function(result){
			$("#numNotificacaoNum").html(result);
		});
	}

	function consultarNotificacoes(){
		$.ajax({
			url:'../controller/ControllerNotificacao.php',
			type:'POST',
			data:{acao: 'consultar'},
		})
		.done(function(result){
			$('#janelaNotific').html(result);
		});
	}

	function excluirNotificacao(usr,top){
		 $.ajax({
		 	async : false,
			url:"../dao/DaoNotificacao.php",
			type:"POST",
			data:{acao: "excluir" ,id_usuario: usr , id_topico: top},
		  }).done(function() {
	   		 return true;
		  });
	}

	function excluiPost(id,ativo){
		if (ativo == 1){
			var texto = "Deseja excluir essa postagem?";
		}else {
			var texto = "Deseja recriar essa postagem?";
		}
		alertify.confirm(texto, function (e) {
		   	if (e) {
		        $.ajax({
					url:"../controller/ControllerPost.php",
					type:"POST",
					data:{
						acao:"excluir",
						id: id
					},
				})
				.done(function(result){
					if (result == "excluir"){
						alertify.success("Post removido com sucesso");
					}else{
						alertify.success("Post recriado com sucesso");

					}
					setTimeout(function(){
					    location.reload();
					}, 1500);
									
					
				});
		    } else {
		        // user clicked "cancel"
		    }
		});
	}

	function redirecionar(id){
		location.href = "telaPerfil.php?acao=consultaPerfil&id="+id;
	}

	function consulta(){
		texto = $('#inputPesquisa').val();

		filtro1 = $("input[name='pesquisa1']:checked").val();
		filtro2 = $("input[name='pesquisa2']:checked").val();
		if (filtro1 != undefined){
			$.ajax({
				url:"../controller/ControllerPesquisa.php",
				type:"POST",
				data:{
					acao: filtro1,
					texto: texto,
					acao2: filtro2,
				},
			})
			.done(function(result){
				$('.resultado').html(result);
			});
		}else{
			mostraErro("Selecione algum filtro!");
			$('.divFiltro').show();
			$(".divFiltro").css('border', '1px ridge red');
			$("#setaPesquisa").css('border-bottom', '10px solid red');
		}
	}

//======================================================================================================================//
//===================================================== Funções para Validação==========================================//	
	function validaClick(){
		setTimeout(function(){
			rolando = false;
		}, 1500);
	}
	
	function mostraErro(erro){
		if (things != "doing"){
			$('#diverro').show().animate({top:'+=120'},1000);
			$('#diverro').text(erro);
			things = "doing";
			setTimeout(function() {
				$('#diverro').hide(500).animate({top:'-=120'},0);
				things = "not doing";
			}, 3000);
		}
	}
	function negaPermissao(){
		alertify.alert().setting('label', 'Voltar');
		alertify.alert("<img style='margin-left: 90px;' src='../imagens/acesso-negado.png' />", function(){
		    location.href= "../telas/index.php";
		});
	}

	function validausuario(usr){
		if ((usr.nomeusuario.value.length < 3) && (usr.nomeusuario.value.length > 100)){
			$('.erronome').text('Insira um nome com mais de 3 e menos de 100 letras');
			console.log("deu erro");
			return false;
		}

		if((usr.senha.value != usr.csenha.value)){
			console.log("deu erro");
			$('.errosenha').text('As senhas digitadas nao sao iguais');
			return false;
		}
	}

	function logout(){
	 alertify.error("Deslogado.");
	 $.ajax({
		url:"../telas/logout.php",
	  }).done(function() {
   		 location.href= "index.php";
	  });
	}

	function validaTamanho(str){
		return str.length <= 3;
	}

	function tamanhoSenha(senha){
		return senha.length <= 5;
	}

	function validaSenha(senha, csenha){
		return senha != csenha;
	}

	function validaEmail2(email){
		vet = email.split("@");
		return vet.length != 2;
	}

	function validaNome(nome){
		$.ajax({
			url:"../js/scriptsphp/isString.php",
			type:"POST",
			data:{texto:nome},
			async:false,
		})
		.done(function(result){
			if (result == "Caracteres invalidos"){
				x =  1;
			}else{
				x = 0;
			}
			
		});
		y = x == 1;
		return y;
	}

	function mudaselect(x){
	
		$("#selectUsuarioAssunto").remove();
		
		if (x.value == "Outro") {
			diff=true;
			$('#s2id_selectUsuarioAssunto').replaceWith('<input class="inputCadastro block clicktoenter" style="width: 260px" placeholder="Novo Grupo" id="grupo" type="text" name="grupo" required>');
		}
	}
