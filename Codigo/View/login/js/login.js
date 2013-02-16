$(function(){
                
    //EFEITO DE SLIDE PARA FECHAR O CADASTRO
    $("#cancela-cadastro").click(function(){
        $("#cadastro").hide("fast");
        $(".hideCadastro").show("fast");
    });

    //EFEITO DE SLIDE PARA ABRIR O CADASTRO
    $("#for-cadastro").click(function(){
        $("#cadastro").show("fast");
        $(".hideCadastro").hide("fast"); 
    });
    
    $("#fecha-cadastro").click(function(){
        $("#cadastro").hide("fast");
        $(".hideCadastro").show("fast");
    });
    
    
    
   
    
        
    
});




