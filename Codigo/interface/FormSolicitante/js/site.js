var retorno = 0;
var array = new Array();

// JavaScript Document
function load_grid(){    
	$.ajax({
		url: 'seleciona.php',
		type: "POST",
		success: function (data) {
			imprime(data);
		}
	});
    $("#nomeSolicitante").focus();    
    limpa_form();
}

function limpa_form(){

	if ( $("#limpar").val() == "Cancelar" ){
		var cancelar = 
		{
			cancelaralteracao: {
				html:'Deseja cancelar a alteração?',
				buttons: {Nao: false, Sim: true},
				focus: 1,
				submit:function(v,m,f){
					if(!v) 
						return true;
					else{
							$("#acao").val("inserir");
							$("#botao").val("Salvar");
							$("#limpar").val("Limpar");
							limpa_form();
							$.prompt.goToState('cancelado');
						}
					return false;
				}
			},
			cancelado: {
				html:'Alteração cancelada!',
				buttons: {Sair: false},
				focus: 1,
				submit:function(v,m,f){
					if(!v) 
					{
						$("#nomeSolicitante").focus();
						retorno=0;
						$.prompt.close()
					}		
				}
			}
        };    
		$.prompt(cancelar);
    }
    else{
        $("#acao").val("inserir");
        $("#botao").val("Salvar");
        $("#limpar").val("Limpar");
        $("#nomeSolicitante").val("");
        $("#emailSolicitante").val("");
        $("#dtNascSolicitante").val("");
        $("#matriculaSolicitante").val("");
        $("#nomeUsuario").val("");
        $("#senhaUsuario").val("");

        $("#botao").show();
        $("#nomeSolicitante").attr("disabled", false);
        $("#emailSolicitante").attr("disabled", false);
        $("#dtNascSolicitante").attr("disabled", false);
        $("#matriculaSolicitante").attr("disabled", false);
        $("#nomeUsuario").attr("disabled", false);
        $("#senhaUsuario").attr("disabled", false);
        $("#nomeSolicitante").focus();
	}
}

function enviar(){
	if($("#acao").val()=="inserir")
	{
        var confirmar = {
			confirmacao: {	                            
                        html:'Registro salvo com sucesso!',	
			buttons: {Ok: 0},
			focus: 1,
				submit:function(v,m,f){
					if(v==0){
										$.ajax({                                                                                    
												url: 'insere.php',
												async: false,
												type: "POST",
												data: {
														nomeSolicitante: $("#nomeSolicitante").val(),
														emailSolicitante: $("#emailSolicitante").val(),
														dtNascSolicitante: $("#dtNascSolicitante").val(),
														matriculaSolicitante: $("#matriculaSolicitante").val(),
														nomeUsuario: $("#nomeUsuario").val(),
														senhaUsuario: $("#senhaUsuario").val()														
												},
												success: function (data) {
														limparValidacao();
														load_grid(data); 														                                                
												}
										});
										$.prompt.close()
									}
									$("#nomeSolicitante").focus();
					return false;
				}
                        }
		};
		$.prompt(confirmar);
    }
	
	else if($("#acao").val()=="alterar"){
		var alteracao = {
		confirmaralterar: {
			html:'Deseja realmente alterar o registro?',
			buttons: {Nao: false, Sim: true},
			focus: 1,
			submit:function(v,m,f){
				if(!v) return true;
				else{
                                        $.ajax({
                                                url: 'altera.php',
                                                type: "POST",
                                                data: {
                                                        id: array[0],
                                                        nomeSolicitante: $("#nomeSolicitante").val(),
                                                        emailSolicitante: $("#emailSolicitante").val(),
                                                        dtNascSolicitante: $("#dtNascSolicitante").val(),
                                                        matriculaSolicitante: $("#matriculaSolicitante").val(),
                                                        nomeUsuario: $("#nomeUsuario").val(),
                                                        senhaUsuario: $("#senhaUsuario").val()
                                                },
                                                success: function (data) {
                                                        $("#acao").val("inserir"),
                                                        $("#botao").val("Salvar"),
                                                        $("#limpar").val("Limpar"),
                                                        limparValidacao();
                                                        load_grid(data);                                                        
                                                }
                                        });
					$.prompt.goToState('alterado');
                                }
				return false;
			}
		},
		alterado: {
			html:'Registro alterado com sucesso!',
			buttons: {Sair: 0},
			focus: 1,
			submit:function(v,m,f){
				if(v==0) {
                                    $("#nomeSolicitante").focus();
                                    retorno = 0;
                                    $.prompt.close()
                              }
			}
		}
};
                $.prompt(alteracao);

	}
}

function apagar(id){
        if( $("#acao").val()!="alterar" ){
                var apagar = {
		confirmacao: {
			html:'Deseja realmente excluir o registro?<input type="hidden" name="id" id="id" value="'+id+'">',
			buttons: {Nao: false, Sim: true},
			focus: 1,
			submit:function(v,m,f){
				if(!v) return true;
				else{
                                             $.ajax({
                                                url: 'apaga.php',
                                                type: "POST",
                                                data: {id: f.id},
                                                    success: function (data) {                                                   
                                                    load_grid(data);				
                                                    }
                                             });
					$.prompt.goToState('apagado');
                                }
				return false;
			}
		},
		apagado: {
			html:'Registro excluído com sucesso!',
			buttons: {Sair: 0},
			focus: 1,
			submit:function(v,m,f){
				if(v==0){
                                    $("#nomeSolicitante").focus();
                                    $.prompt.close()
                              }
			}
		}
        };
                $.prompt(apagar);
        }
        else
            $.prompt("Conclua ou cancele a alteração pendente!");
}

function editar(texto){

	if(navigator.appName=='Microsoft Internet Explorer'){
		array=texto.split("<TD>");
		texto=array.join("");
		array=texto.split("</TD>");

		array=texto.split('<TD style="DISPLAY: none">');
		texto=array.join('');
		array=texto.split('</TD>');
	}
	else if (/Firefox[\/\s](\d+\.\d+)/.test(navigator.userAgent)){
		var versaoFirefox=new Number(RegExp.$1)
		if(versaoFirefox>=4){
			array=texto.split("<td>");
			texto=array.join("");
			array=texto.split("</td>")

			array=texto.split('<td style="display: none">');
			texto=array.join('');
			array=texto.split('</td>');
		}else{
			array=texto.split("<td>");
			texto=array.join("");
			array=texto.split("</td>")

			array=texto.split('<td style="display: none;">');
			texto=array.join('');
			array=texto.split('</td>');
		}
	}else{
		array=texto.split("<td>");
		texto=array.join("");
		array=texto.split("</td>")

		array=texto.split('<td style="display: none;">');
		texto=array.join('');
		array=texto.split('</td>');

		array=texto.split('<td style="display: none">');
		texto=array.join('');
		array=texto.split('</td>');
	}
    if(retorno == 0){

		$("#nomeSolicitante").val(array[1]);
		$("#emailSolicitante").val(array[2]);
		$("#dtNascSolicitante").val(array[3]);
		$("#matriculaSolicitante").val(array[4]);
		$("#nomeUsuario").val(array[5]);
		$("#senhaUsuario").val(array[6]);


		$("#nomeSolicitante").attr("disabled", false);
		$("#emailSolicitante").attr("disabled", false);
		$("#dtNascSolicitante").attr("disabled", false);
		$("#matriculaSolicitante").attr("disabled", false);
		$("#nomeUsuario").attr("disabled", false);
		$("#senhaUsuario").attr("disabled", false);

		retorno++;

		$("#botao").show();
		$("#acao").val("alterar");
		$("#botao").val("Salvar");
		$("#limpar").val("Cancelar");
		$("#nomeSolicitante").focus();
        
		}else{
            $.prompt("Conclua ou cancele alteração pendente!");
        }
}

function detalhes(texto){

        if( $("#acao").val()!="alterar" ){
                    if(navigator.appName=='Microsoft Internet Explorer'){
                    array=texto.split("<TD>");
                    texto=array.join("");
                    array=texto.split("</TD>");

                    array=texto.split('<TD style="DISPLAY: none">');
                    texto=array.join('');
                    array=texto.split('</TD>');
            }

            else if (/Firefox[\/\s](\d+\.\d+)/.test(navigator.userAgent)){

            var versaofirefox=new Number(RegExp.$1)

                if(versaofirefox>=4){
                    array=texto.split("<td>");
                    texto=array.join("");
                    array=texto.split("</td>")

                    array=texto.split('<td style="display: none">');
                    texto=array.join('');
                    array=texto.split('</td>');
                }
                else{
                    array=texto.split("<td>");
                    texto=array.join("");
                    array=texto.split("</td>")

                    array=texto.split('<td style="display: none;">');
                    texto=array.join('');
                    array=texto.split('</td>');
                }
            }

            else{
                    array=texto.split("<td>");
                    texto=array.join("");
                    array=texto.split("</td>")

                    array=texto.split('<td style="display: none;">');
                    texto=array.join('');
                    array=texto.split('</td>');

                    array=texto.split('<td style="display: none">');
                    texto=array.join('');
                    array=texto.split('</td>');
            }

            $("#nomeSolicitante").val(array[1]);
            $("#emailSolicitante").val(array[2]);
            $("#dtNascSolicitante").val(array[3]);
            $("#matriculaSolicitante").val(array[4]);
            $("#nomeUsuario").val(array[5]);
            $("#senhaUsuario").val(array[6]);

            $("#nomeSolicitante").attr("disabled", true);
            $('#emailSolicitante').attr("disabled", true);
            $('#dtNascSolicitante').attr("disabled", true);
            $("#matriculaSolicitante").attr("disabled", true);
            $("#nomeUsuario").attr("disabled", true);
            $("#senhaUsuario").attr("disabled", true);

            $("#acao").val("detalhar");
            $("#botao").hide();
            $("#limpar").val("Sair");
        }
        else
            $.prompt("Conclua ou cancele a alteração pendente!");
}

function valida_form(){   
   
    var er = RegExp(/^[A-Za-z0-9_\-\.]+@[A-Za-z0-9_\-\.]{2,}\.[A-Za-z0-9]{2,}(\.[A-Za-z0-9])?/);
    
    if($("#nomeSolicitante").val().length<5){
        var erroNome = {
        erroNomeMenor: {
                    html:'Preencha o campo Solicitante corretamente!',
                    buttons: {Ok: 0},
                    focus: 1,
                    submit:function(v,m,f){
                            if(v==0){
                                $("#nomeSolicitante").focus();
                                $.prompt.close()
                            }
                            return false;
                    }
                }
            };
        $.prompt(erroNome);
        return false;
    }
 
    if($("#emailSolicitante").val().length!=0){
            if(er.test($("#emailSolicitante").val()) == false){
                    var emailInvalido = {
                    erroEmailInvalido: {
                            html:'Email inválido! Preencha um Email correto!',
                            buttons: {Ok: 0},
                            focus: 1,
                            submit:function(v,m,f){
                                    if(v==0){
                                        $("#emailSolicitante").focus();
                                        $.prompt.close()
                                    }
                                    return false;
                            }
                        }
                    };
                    $.prompt(emailInvalido);
                    return false;
            }
    }
    if($("#nomeUsuario").val().length<6){
        var UsuarioMenor = {
        erroUsuarioMenor: {
                    html:'Preencha o campo nome de usuário corretamente!',
                    buttons: {Ok: 0},
                    focus: 1,
                    submit:function(v,m,f){
                            if(v==0){
                                $("#nomeUsuario").focus();
                                $.prompt.close()
                            }
                            return false;
                    }
                }
            };
        $.prompt(UsuarioMenor);
        return false;
    }
    
        if($("#senhaUsuario").val().length < 6){
        var SenhaMenor = {
        SenhaMenorMsg: {
                    html:'Preencha o campo senha corretamente!',
                    buttons: {Ok: 0},
                    focus: 1,
                    submit:function(v,m,f){
                            if(v==0){
                                $("#senhaUsuario").focus();
                                $.prompt.close()
                            }
                            return false;
                    }
                }
            };
        $.prompt(SenhaMenor);
        return false;
    }

    if($("#dtNascSolicitante").val().length!=0 && $("#dtNascSolicitante").val().length<10){
        var dtNascInvalido = {
                    errodtNascInvalido: {
                            html:'Data de nascimento inválida! Preencha um data correta!',
                            buttons: {Ok: 0},
                            focus: 1,
                            submit:function(v,m,f){
                                    if(v==0){
                                        $("#dtNascSolicitante").focus();
                                        $.prompt.close()
                                    }
                                    return false;
                            }
                        }
                    };
            $.prompt(dtNascInvalido);
            return false;
    }


	enviar();
        return false;

}

function carregando(){	
         $.blockUI({ 
            message: ("<img style='background-color: #000;' src='../imagens/carregando.gif'> Processando..."),
            css: {border: 'none',padding: '15px',backgroundColor: '#000','-webkit-border-radius': '10px','-moz-border-radius': '10px', 
            opacity: .5, 
            color: '#fff' 
        }}); 	
          load_grid();
}

function imprime(xmldoc){
	$.unblockUI();        
	if(typeof(xmldoc) != "string")
	{
		var cabecalho = xmldoc.getElementsByTagName('cabecalho')[0];
		var campo = cabecalho.getElementsByTagName('campo');
		var tabela="<table border='0' class='tablesorter' cellspacing='1'><thead><tr>";
                
                
                tabela+="<td class='borda' colspan='6'>";
                tabela+="<label for='pesquisa'><b>Pesquisar:</b></label>";
                tabela+="<input id='pesquisar' type='text' name='pesquisar' maxlength='30' size='30'/>";
                tabela+="</td>";
                
                
                tabela+="</tr><tr>";
                
		//cabecalho da tabela
		for(i=0;i<campo.length;i++){
                    if(i==0 || i==4 || i==5 || i==6){
                        tabela+= "<th style='display: none'>"+campo[i].firstChild.data+"</th>";
                    }else if(i==1)
			tabela+="<th class='campogrande'>"+campo[i].firstChild.data+"</th>";
                    else if(i==2)
                        tabela+="<th class='campopequeno'>"+campo[i].firstChild.data+"</th>";
                    else if(i==3)
                        tabela+="<th class='campopequenofone'>"+campo[i].firstChild.data+"</th>";
		}
                
		tabela+="<td colspan='3' class='borda'><b>Controles</b></td>";
                tabela+="</tr></thead>";
		//rodape
		tabela+="<tfoot id='pager'>";
		tabela+="<tr class='pager' align='center'>";
		tabela+="<th class='pager1' colspan='6'>";
			tabela+="<img src='../imagens/first.png' alt='Primeira página' class='first'/>";
			tabela+="<img src='../imagens/prev.png' alt='Página anterior' class='prev'/>";
			tabela+="<input type='text' class='pagedisplay' Readonly/>";
			tabela+="<img src='../imagens/next.png' alt='Próxima página' class='next'/>";
			tabela+="<img src='../imagens/last.png' alt='Última página' class='last'/>";
			tabela+="<select class='pagesize'>";
				tabela+="<option selected='selected'  value='10'>10</option>";
				tabela+="<option value='20'>20</option>";
				tabela+="<option value='30'>30</option>";
				tabela+="<option  value='40'>40</option>";
			tabela+="</select>";
			tabela+="</th>";
        tabela+="</tr>";
		tabela+="</tfoot>";
		//corpo da tabela
        tabela+="<tbody>";
		var registros = xmldoc.getElementsByTagName('registro');                
		for(i=0;i<registros.length;i++){
			var itens = registros[i].getElementsByTagName('item');                        
			tabela+="<tr bgcolor='#F2F2F2' id=linha"+i+" style=\"cursor:default\" onMouseOver=\"javascript:this.style.backgroundColor='#1353B5'\" onMouseOut=\"javascript:this.style.backgroundColor='#F2F2F2'\">"
          		for(j=0;j<itens.length;j++){
				if(itens[j].firstChild==null){
					if(j==0 || j==4 || j==5 || j==6)
                                        tabela+="<td style= 'display: none'></td>";
                                        else
                                        tabela+="<td></td>";
                                }else{
                                    if(j==0 || j==4 || j==5 || j==6){
                                        tabela+= "<td style='display: none'>"+itens[j].firstChild.data+"</td>";
                                    }
                                    else
                                        tabela+="<td>"+itens[j].firstChild.data+"</td>";
                                }							
			}
                      
			tabela+="<td style='cursor: pointer' class='botoes'><img src='../imagens/detalhes.gif' alt='detalhes' onClick=\"detalhes($('#linha"+i+"').html());\")></td>";
			tabela+="<td style='cursor: pointer' class='botoes'><img src='../imagens/edit.gif' alt='alterar' onClick=\"editar($('#linha"+i+"').html());limparValidacao();\"></td>";
			tabela+="<td style='cursor: pointer' class='botoes'><img src='../imagens/delete.gif' alt='excluir' onClick=apagar(" + itens[0].firstChild.data + ")></td>";
			tabela+="</tr>";
		}
		tabela+="</tbody>";	
		tabela+="</table>";
		
        $("#resultado").html(tabela);
		tabela=null;
		$("table")
			.tablesorter({widthFixed: false})
			.tablesorterPager({container: $("#pager"), positionFixed: false })
                        .tablesorterFilter({ filterContainer: $("#pesquisar"),
                                filterClearContainer: $("#filterClearOne"),
                                filterColumns: [0, 1, 2, 3, 4, 5, 6],
                                filterCaseSensitive: false
                            });
            }
	else
		$("#resultado").html("Nenhum registro encontrado...");	
}
