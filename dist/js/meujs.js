$(document).ready(function(){

    $(".eliminarc").click(function(e){
    	e.preventDefault(); 
    	$('#eliminarcurso').attr('data-id',$(this).attr('data-nome'));		
	});
	 $("#eliminarcurso").click(function(e){
    	e.preventDefault();
	    	$(".eliminarc").each(function(){
				if($(this).attr('data-nome') == $("#eliminarcurso").attr('data-id')){
					$(this).parentsUntil('.produto').remove();
				}			
					    
			});
			var nome=$(this).attr('data-id');
			$.post('./php/eliminarcurso.php',{
				Nome:nome
			},function(){			
			
		});	
		$('#myModal2').modal('hide');   	
	});

 /* ---------------------------------------------------------*/

    $("#modificarcurso").click(function(e){
    	e.preventDefault(); 

    	if($('#novonomecurso').val().length != 0){

    		$.post('./php/modificarcurso.php',{
					Nome:$('#novonomecurso').val(),
					Nomea:$('#nomeanteriorcurso').val()				
				},function(a){
					var nomeanteriorcurso = $('#nomeanteriorcurso').val();
					if(a=='1'){						
						$('td').each(function(){
							if($(this).attr('data-id') == $('#nomeanteriorcurso').val() ){
								$(this).text($('#novonomecurso').val());
								$(this).attr('data-id',$('#novonomecurso').val());
							}			    
						});
						$('.eliminarc').each(function(){
							if($(this).attr('data-nome') == $('#nomeanteriorcurso').val() ){
								$(this).attr('data-nome',$('#novonomecurso').val());
							}			    
						});
						$('.modificarc').each(function(){
							if($(this).attr('data-nome') == $('#nomeanteriorcurso').val() ){
								$(this).attr('data-nome',$('#novonomecurso').val());
							}			    
						});
						$('#myModal').modal('hide');
					}
					else{
						alert("Este nome de curso já existe");
					}
				});			
    	}
    	else{
    		alert("Deve introduzir um nome");
    	}
		
	});
/*-----------------------------------------------------------------------------*/
	$(".modificarc").click(function(e){
    	e.preventDefault();    	
    	$('#nomeanteriorcurso').val($(this).attr('data-nome'));
	});
/*------------------------DISCIPLINAS-----------------------------------------------------*/
	$(".eliminard").click(function(e){
    	e.preventDefault(); 
    	$("#eliminardisciplina").attr('data-id', $(this).attr('data-nome'));		
	});
	$("#eliminardisciplina").click(function(e){
    	e.preventDefault(); 
    	$(".eliminard").each(function(){
    		if($(this).attr('data-nome') == $("#eliminardisciplina").attr('data-id')){
    			$(this).parentsUntil('.disciplinalista').remove();
    		}
    	}); 
    	var nome=$(this).attr('data-id');		
		$.post('./php/eliminardisciplina.php',{
			Nome:nome
		},function(){			
			
		});
		$('#myModal2d').modal('hide'); 
	});
/*-----------------------------------------------------------------------------*/
	$(".modificard").click(function(e){
    	e.preventDefault();    	
    	$('#nomeda').val($(this).attr('data-nome'));
    	$('#anoda').val($(this).attr('data-ano'));
    	$('#semestreda').val($(this).attr('data-semestre'));
    	$('#nomeda').attr('data-nomea',$(this).attr('data-nome'));
	});
/* ------------------------------------------------------------------------------*/
$("#modifidisciplina").click(function(e){
    	e.preventDefault(); 

    	if($('#nomeda').val().length != 0 && $('#anoda').val().length != 0 && $('#semestreda').val().length != 0){

    		$.post('./php/modificardisciplina.php',{
					Nome:$('#nomeda').val(),
					Ano:$('#anoda').val(),
					Semestre: $('#semestreda').val(),
					Nomeda: $('#nomeda').attr('data-nomea')			
				},function(a){
					var nomedisa = $('#nomeda').attr('data-nomea');
					if(a=='1'){						
						$('.nomed').each(function(){
							if($(this).attr('data-id') == nomedisa){
								$(this).text($('#nomeda').val());
								$(this).attr('data-id',$('#nomeda').val());
							}			    
						});
						$('.anod').each(function(){
							if($(this).attr('data-id') ==  nomedisa){
								$(this).text($('#anoda').val());
								$(this).attr('data-id',$('#nomeda').val());
							}			    
						});
						$('.semestred').each(function(){
							if($(this).attr('data-id') == nomedisa ){
								$(this).text($('#semestreda').val());
								$(this).attr('data-id',$('#nomeda').val());
							}			    
						});
						$('.modificard').each(function(){
							if($(this).attr('data-nome') == nomedisa ){
								$(this).attr('data-nome',$('#nomeda').val());
							}			    
						});
						$('.eliminard').each(function(){
							if($(this).attr('data-nome') == nomedisa ){
								$(this).attr('data-nome',$('#nomeda').val());
							}			    
						});

						$('#myModald').modal('hide');
					}
					else{
						alert("Este nome de disciplina já existe");
					}
				});			
    	}
    	else{
    		alert("Deve introduzir todos os dados");
    	}
		
	});
/*-------------------Validação------------------*/
	$(".telefone").keypress(function(tecla) {
        if((tecla.charCode >= 48 && tecla.charCode <= 57) || tecla.charCode == 8 || tecla.charCode == 0) {
 			return true;
        }
        else{
        	return false;
        }
    });
    $(".notaf").keypress(function(tecla) {
    	

    	if(tecla.charCode == 8 || tecla.charCode == 0){
    		return true;
    	}
        if((tecla.charCode >= 48 && tecla.charCode <= 57)) {
        	var aux = $(this).val()+String.fromCharCode(tecla.which);
        	var num = parseFloat(aux);
        	
        	if(num <= 20){
        		return true;
        	}
        	else{
        		return false;
        	}
        	
        }
        else{
        	return false;
        }
    });

/* --------------Estudantes---------------------------------*/

	$("#cursoestudantelista").change(function(e) {
        var curso = $(this).val();
        var ano = $('#anoadmisaolista').val();
        $.post('./listar_estudantes.php',{
			Cursoestudantelista: curso,
			Anoadmisaolista: ano
		},function(){	
			location.href="./listar_estudantes.php?Cursoestudantelista="+curso+"&Anoadmisaolista="+ano;			
		});
    });
    $("#anoadmisaolista").change(function(e) {
        var ano = $(this).val();
        var curso = $('#cursoestudantelista').val();
        $.post('./listar_estudantes.php',{
			Anoadmisaolista:ano,
			Cursoestudantelista: curso
		},function(){
			location.href="./listar_estudantes.php?Cursoestudantelista="+curso+"&Anoadmisaolista="+ano;		
		});
    });
 /*----------------------------------------------------------------------*/
 	$(".eliminare").click(function(e){
    	e.preventDefault(); 
    	$('#eliminarea').attr('data-id',$(this).attr('data-id'));		
	});
	 $("#eliminarea").click(function(e){
    	e.preventDefault();
	    	$(".eliminare").each(function(){
				if($(this).attr('data-id') == $("#eliminarea").attr('data-id')){
					$(this).parentsUntil('.estudanteslista').remove();
				}			
					    
			});
			var bi=$(this).attr('data-id');
			$.post('./php/eliminarestudante.php',{
				bi:bi
			},function(){			
			
		});	
		$('#myModale2').modal('hide');   	
	});
/*------------------------------------------------------------------------*/
	$(".modificare").click(function(e){
    	e.preventDefault();    	
    	$('#nomeea').val($(this).attr('data-nome'));
    	$('#bia').val($(this).attr('data-id'));
    	$('#paia').val($(this).attr('data-pai'));
    	$('#maea').val($(this).attr('data-mae'));
    	$('#direcaoa').val($(this).attr('data-direcao'));
    	$('#dataa').val($(this).attr('data-data'));
    	$('#anoadmisaoa').val($(this).attr('data-ano'));
    	$('#emaila').val($(this).attr('data-email'));
    	$('#telefonea').val($(this).attr('data-telefone')); 
    	$('#obsa').val($(this).attr('data-obs'));
    	$('#cursoestudantea').val($(this).attr('data-curso'));
    	if($(this).attr('data-sexo')=='mulher'){
    		$('#sexoam').attr('checked', "true");
    		$('#sexoah').removeAttr("checked")
    		$('#verificarsexo').attr('data-id','mulher')
    	}
    	else{
    		$('#sexoah').attr('checked', "true");
    		$('#sexoam').removeAttr('checked');
    		$('#verificarsexo').attr('data-id','homem');
    	}
    	$("#modifiestudante").attr('data-id',$(this).attr('data-id'))
    	  	
	});
	$('#sexoah').click(function(){
		$('#verificarsexo').attr('data-id','homem');
	});
	$('#sexoam').click(function(){
		$('#verificarsexo').attr('data-id','mulher');
	});
	/* --------------------------------------------*/
	$("#modifiestudante").click(function(e){
    	e.preventDefault();

    	 if($('#bia').val().length == 14 &&  $('#telefonea').val().length == 9){
    	 	var sexo =$('#verificarsexo').attr('data-id');


    		$.post('./php/modificarestudante.php',{
    				bia: $("#modifiestudante").attr('data-id'),
					bi:$('#bia').val(),
					nome:$('#nomeea').val(),
					pai:$('#paia').val(),
					mae:$('#maea').val(),
					direcaoa:$('#direcaoa').val(),
					data:$('#dataa').val(),
					ano:$('#anoadmisaoa').val(),
					email:$('#emaila').val(),
					telefone:$('#telefonea').val(),
					obs:$('#obsa').val(),
					curso:$('#cursoestudantea').val(),
					sexo:sexo				
				},function(a){
					if(a == 1){
						$('#cursoestudantelista').val($('#cursoestudantea').val());
						$('#anoadmisaolista').val($('#anoadmisaoa').val());
						location.href="./listar_estudantes.php?Cursoestudantelista="+$('#cursoestudantea').val()+"&Anoadmisaolista="+$('#anoadmisaoa').val();
						
						$('#myModale1').modal('hide');
					}
					else{
						alert("Este BI já existe");
					}
					
				});	
			  	
    	}
    	else{
    		alert("O BI e telefone devem ter os formatos corretos.");
    	}
		
	});
	/*------------------Ficha-------------------------*/
		$("#cursolistaficha").change(function(e) {
	        var curso = $(this).val();
	        var ano = $('#anoadmisaoficha').val();
	        var disciplinaficha = $('#disiplinaficha').val();
	        $.post('./ficha_academica.php',{
				Cursoestudantelista: curso,
				Anoadmisaolista: ano,
				Disciplinaficha:disciplinaficha
			},function(){	
				location.href="./ficha_academica.php?Cursoestudantelista="+curso+"&Anoadmisaolista="+ano+"&Disciplinaficha="+disciplinaficha;			
			});
	    });
	    $("#anoadmisaoficha").change(function(e) {
	        var curso = $("#cursolistaficha").val();
	        var ano = $(this).val();
	        var disciplinaficha = $('#disiplinaficha').val();
	        $.post('./ficha_academica.php',{
				Cursoestudantelista: curso,
				Anoadmisaolista: ano,
				Disciplinaficha:disciplinaficha
			},function(){	
				location.href="./ficha_academica.php?Cursoestudantelista="+curso+"&Anoadmisaolista="+ano+"&Disciplinaficha="+disciplinaficha;			
			});
	    });	  
	    $("#disiplinaficha").change(function(e) {
	        var curso = $("#cursolistaficha").val();
	        var ano = $("#anoadmisaoficha").val();
	        var disciplinaficha = $(this).val();
	        $.post('./ficha_academica.php',{
				Cursoestudantelista: curso,
				Anoadmisaolista: ano,
				Disciplinaficha:disciplinaficha
			},function(){	
				location.href="./ficha_academica.php?Cursoestudantelista="+curso+"&Anoadmisaolista="+ano+"&Disciplinaficha="+disciplinaficha;			
			});
	    });
	    $("#salvarficha").click(function(e){
    		e.preventDefault();    		
    		
    		var notas = [];   		
    		
    		
    		$(".notaf").each(function(){    			
    			
    			notas.push({"bi":$(this).attr('data-id'),"nome":$(this).attr('data-dis'),"class":$(this).val()});		
					    
			});
			

    		$.post('./php/ficha.php',{
    			Notas:notas 				
				},function(a){
					if(a =="1"){
						var mensagem = "<strong>Informações alteradas com sucesso!</strong><br>Suas informações foram alteradas e já podem ser visualizadas no painel.";
						mostraDialogo(mensagem, "info", 5000);
							
						//alert("Operação realizada com êxito");
					}	
					else{
						var mensagem = "<strong>A operação não foi realizada!!!</strong><br>Ocorreu algum problema com os dados ou com a conexão à base de dados.";
						mostraDialogo(mensagem, "danger", 5000);
					}		
					
			});	   	 
		
		});	   
		$(".infoestu").click(function(e){
    		e.preventDefault();   

    		var biinfo = $(this).attr('data-id');

    		$.post('./estudante_info.php',{
    			Bi:biinfo 				
				},function(){
					location.href="./estudante_info.php?Bi="+biinfo;									
					
			});	   	 
		
		});	   

	/*------------------Ficha Fim-----------------*/

	/*------------------User-----------------------*/
	$("#entrar").click(function(e){
    	e.preventDefault();    	
		if($('#userid').val().length == 0 && $('#senha').val().length == 0){
			location.href="./principal.php";
		}
		else{			
			
			$.post('./php/user.php',{
					User:$('#userid').val(),
					Senha:$('#senha').val()
				},function(a){
					if(a=='1'){
						location.href="./principal.php";
					}
					else{
						mostraDialogo("<strong>Usuário ou senha não válidos!!!</strong>","danger", 5000);						
					}
			});		
		}
	});
	$(".fecharsessao").click(function(e){
    	e.preventDefault();
    	$.post('./php/fecharsessao.php',{

		},function(){
			location.href="./index.php";					
		});
	});
	$("#trocarsenha").click(function(e){
    	e.preventDefault();
    	
    	var user = $('#dnu').val();
    	var senhaAnterior = $('#senhaanterior').val();
    	var novaSenha = $('#novasenha').val();
    	var repnovaSenha = $('#rnovasenha').val();  

    	if($('#novasenha').val().length < 6){    		
    		 mostraDialogo("<strong>A nova senha deve ter mais de 5 caracteres!!!</strong>","danger", 5000);
    	}
    	else{
    		if(novaSenha == repnovaSenha){
		    	$.post('./php/trocar_senha.php',{
		    		User:user,
		    		Senha:novaSenha,
		    		Senhaa:senhaAnterior
				},function(a){
					if(a=="1"){						
						mostraDialogo("Senha trocada com sucesso.","info", 5000);
					}
					else{
						mostraDialogo("Não se realizou a ação, comprove que sua senha anterior é correta.","danger", 5000);
					}
										
				});
    		}
    		else{
    			mostraDialogo("As senhas novas não coincidem.","danger", 5000);
    		}
    	}

    	
	});
	$("#criarnovousuario").click(function(e){
    	e.preventDefault();

    	var user = $('#usernew').val();
    	var senha = $('#senhanovo').val();
    	var repsenha = $('#senharep').val(); 
    	var tipo = $('#tipouser').val();

    	if($('#usernew').val().length > 0){
    		if($('#senhanovo').val().length >= 6){
    			if($('#senhanovo').val() == $('#senharep').val()){
	    			$.post('./php/novo_usuario.php',{
			    		User:user,
			    		Senha:senha,
			    		Tipo:tipo
						},function(a){
						if(a=="1"){						
							mostraDialogo("O usuário se criou com sucesso.","info", 5000);
						}
						else{
							mostraDialogo("Não se realizou a ação, comprove que se tem acesso à base de dados ou que o usuário que pretende criar não exista.","danger", 5000);
						}
											
					});

    			}
    			else{
    				mostraDialogo("As senhas não coincidem.","danger", 5000);
    			}
    		}
    		else{
    			 mostraDialogo("<strong>A senha deve ter mais de 5 caracteres!!!</strong>","danger", 5000);
    		}
    	}
    	else{
    		 mostraDialogo("<strong>O usuário não pode ser vazio!!!</strong>","danger", 5000);
    	}



    });
	/*------------------FIM User-----------------------*/
	/*--------------imprimir e exportar  ficha academica-----------------*/
	$('.exportar').click(function(e){
		fnExcelReport('estudanteinfo');
	});
	$('.printinfoest').click(function(e){
		printTabela('estudanteinfo');
	});


	/*---------Imprimir e excel lista 20 estudantes -------------*/
	$('#excelestudantes').click(function(e){
		fnExcelReport('lista20estudantes');
	});
	$('#printestudantes').click(function(e){
		printTabela('lista20estudantes');
	});


	/*--------Imprimir e excel lista melhores disciplinas--------*/
	$('#exceldisciplinasm').click(function(e){
		fnExcelReport('lista20disciplinasmelhores');
	});
	$('#printdisciplinasm').click(function(e){
		printTabela('lista20disciplinasmelhores');
	});
	/*--------Imprimir e excel lista piores disciplinas--------*/
	$('#exceldisciplinasp').click(function(e){
		fnExcelReport('lista20disciplinaspiores');
	});
	$('#printdisciplinasp').click(function(e){
		printTabela('lista20disciplinaspiores');
	});
	/*--------Imprimir e excel lista melhores anos--------*/
	$('#excelmelhoresanos').click(function(e){
		fnExcelReport('listamelhoresanos');
	});
	$('#printmelhoresanos').click(function(e){
		printTabela('listamelhoresanos');
	});
});

/*-------- Para mostrar diálogos------------*/
function mostraDialogo(mensagem, tipo, tempo){
    
    // se houver outro alert desse sendo exibido, cancela essa requisição
    if($("#message").is(":visible")){
        return false;
    }

    // se não setar o tempo, o padrão é 3 segundos
    if(!tempo){
        var tempo = 3000;
    }

    // se não setar o tipo, o padrão é alert-info
    if(!tipo){
        var tipo = "info";
    }

    // monta o css da mensagem para que fique flutuando na frente de todos elementos da página
    var cssMessage = "display: block; position: fixed; top: 0; left: 20%; right: 20%; width: 60%; padding-top: 10px; z-index: 9999";
    var cssInner = "margin: 0 auto; box-shadow: 1px 1px 5px black;";

    // monta o html da mensagem com Bootstrap
    var dialogo = "";
    dialogo += '<div id="message" style="'+cssMessage+'">';
    dialogo += '    <div class="alert alert-'+tipo+' alert-dismissable" style="'+cssInner+'">';
    dialogo += '    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>';
    dialogo +=          mensagem;
    dialogo += '    </div>';
    dialogo += '</div>';

    // adiciona ao body a mensagem com o efeito de fade
    $("body").append(dialogo);
    $("#message").hide();
    $("#message").fadeIn(200);

    // contador de tempo para a mensagem sumir
    setTimeout(function() {
        $('#message').fadeOut(300, function(){
            $(this).remove();
        });
    }, tempo); // milliseconds

}
/*--- Para exportar a excel-----*/
function fnExcelReport(chave)
{
    var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
    var textRange; var j=0;
    tab = document.getElementById(chave); // id of table

    for(j = 0 ; j < tab.rows.length ; j++) 
    {     
        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
        //tab_text=tab_text+"</tr>";
    }

    tab_text=tab_text+"</table>";
    tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
    tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE "); 

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
    {
        txtArea1.document.open("txt/html","replace");
        txtArea1.document.write(tab_text);
        txtArea1.document.close();
        txtArea1.focus(); 
        sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Sumit.xls");
    }  
    else                 //other browser not tested on IE 11
        sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

    return (sa);
}
/* --------Para imprimir---------*/
function printTabela(chave)
{
   var divToPrint=document.getElementById(chave);
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}