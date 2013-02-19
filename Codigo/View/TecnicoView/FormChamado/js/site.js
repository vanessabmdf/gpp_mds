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
            tabela+="<td style='cursor: pointer' class='botoes'><img src='../../imagens/detalhes.gif' alt='detalhes' onClick=\"detalhes($('#linha"+i+"').html());\")></td>";
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