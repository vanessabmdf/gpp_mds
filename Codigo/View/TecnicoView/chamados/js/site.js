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
}

function carregando(){	
    $.blockUI({ 
        message: ("<img style='background-color: #000;' src='../../imagens/carregando.gif'> Processando..."),
        css: {border: 'none',padding: '15px',backgroundColor: '#000','-webkit-border-radius': '10px','-moz-border-radius': '10px', 
            opacity: .5, 
            color: '#fff' 
        }}); 	
    load_grid();
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
                        $("#status").focus();
                        retorno=0;
                        $.prompt.close()
                    }		
                }
            }
        };    
        $.prompt(cancelar);
    }
    else{
        
        $("#botao").val("Salvar");
        $("#limpar").val("Limpar");
        $("#status").val("");

        $("#botao").show();
        $("#status").attr("disabled", false);
    }
}


function enviar(){
   if($("#acao").val()=="alterar"){
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
                                status: $("#status").val()
                            },
                            success: function (data) {
                                $("#acao").val("inserir"),
                                $("#botao").val("Salvar"),
                                
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
                        $("#status").focus();
                        retorno = 0;
                        $.prompt.close()
                    }
                }
            }
        };
        $.prompt(alteracao);

    } 
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

        $("#codigo").val(array[0]);
        $("#data").val(array[2]);
        $("#descricao").val(array[4]);
        $("#solicitante").val(array[5]);
        $("#tipo").val(array[7]);
        $("#local").val(array[9]);
        $("#patrimonio").val(array[8]);
        $("#status").val();

        $("#codigo").attr("disabled", true);
        $("#data").attr("disabled", true);
        $("#descricao").attr("disabled", true);
        $("#solicitante").attr("disabled", true);
        $("#tipo").attr("disabled", true);
        $("#local").attr("disabled", true);
        $("#patrimonio").attr("disabled", true);
        $("#status").attr("disabled", false);

        retorno++;

        $("#botao").show();
        $("#acao").val("alterar");
        $("#botao").val("Salvar");
        
    }else{
        $.prompt("Conclua ou cancele alteração pendente!");
    }    
}

function imprime(xmldoc){
    $.unblockUI();
    if(typeof(xmldoc) != "string")
    {
        var cabecalho = xmldoc.getElementsByTagName('cabecalho')[0];
        var campo = cabecalho.getElementsByTagName('campo');
        var tabela="<table border='0' class='tablesorter' cellspacing='1'><thead><tr>";
                
                
        tabela+="<td class='borda' colspan='8'>";
        tabela+="<label for='pesquisa'><b>Pesquisar:</b></label>";
        tabela+="<input id='pesquisar' type='text' name='pesquisar' maxlength='30' size='30'/>";
        tabela+="</td>";
                
                
        tabela+="</tr><tr>";
                
        //cabecalho da tabela
        for(i=0;i<campo.length;i++){
            if(i==0){
                tabela+= "<th style='display: none'>"+campo[i].firstChild.data+"</th>";
            }else if(i==1)
                tabela+="<th class='campogrande'>"+campo[i].firstChild.data+"</th>";
            else if(i==2)
                tabela+="<th class='campopequeno'>"+campo[i].firstChild.data+"</th>";
            else
                tabela+="<th class='campopequenofone'>"+campo[i].firstChild.data+"</th>";
        }
        tabela+="<td colspan='5' class='borda'><b>Controles</b></td>";
        tabela+="</tr></thead>";
        //rodape
        tabela+="<tfoot id='pager'>";
        tabela+="<tr class='pager' align='center'>";
        tabela+="<th class='pager1' colspan='8'>";
        tabela+="<img src='../../imagens/first.png' alt='Primeira página' class='first'/>";
        tabela+="<img src='../../imagens/prev.png' alt='Página anterior' class='prev'/>";
        tabela+="<input type='text' class='pagedisplay' Readonly/>";
        tabela+="<img src='../../imagens/next.png' alt='Próxima página' class='next'/>";
        tabela+="<img src='../../imagens/last.png' alt='Última página' class='last'/>";
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
                    if(j==0)
                        tabela+="<td style= 'display: none'></td>";
                    else
                        tabela+="<td></td>";
                }else{
                    if(j==0){
                        tabela+= "<td style='display: none'>"+itens[j].firstChild.data+"</td>";
                    }else{                                            
                        tabela+="<td>"+itens[j].firstChild.data+"</td>";                                       
                    }                                                        
                }							
            }
            
            tabela+="<td style='cursor: pointer' class='botoes'><img src='../../imagens/edit.gif' alt='alterar' onClick=\"editar($('#linha"+i+"').html());\"></td>";            
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
