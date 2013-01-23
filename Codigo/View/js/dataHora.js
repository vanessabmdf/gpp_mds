function dataHora(){
    momento = new Date()
    var ano = momento.getYear()
    var diasemana = momento.getDay()
    var mes = momento.getMonth()
    var diadomes = momento.getDate()
                                
                               
    hora = momento.getHours()
    minuto = momento.getMinutes()
    segundo = momento.getSeconds()

    //Formatando a hora, transforma os min/segs/hora em string, se for menor igual a 1 ele acrescenta um 0
    string_segundo = new String (segundo)
    if (string_segundo.length == 1)
        segundo = "0" + segundo

    string_minuto = new String (minuto)
    if (string_minuto.length == 1)
        minuto = "0" + minuto

    string_hora = new String (hora)
    if (string_hora.length == 1)
        hora = "0" + hora

    //Formatando Data
    if (ano<2000)
        ano += (ano < 1900) ? 1900 : 0

    if (diadomes<10)
        diadomes="0"+diadomes

    var arrayDiadaSemana = new Array("Domingo","Segunda-feira","Terça-feira","Quarta-feira","Quinta-feira","Sexta-feira","Sábado")
    var arrayMes = new Array(" de Janeiro de "," de Fevereiro de "," de Março de ","de Abril de ","de Maio de ","de Junho de","de Julho de ","de Agosto de ","de Setembro de "," de Outubro de "," de Novembro de "," de Dezembro de ")

    //Imprimindo a hora
    Imprimir = arrayDiadaSemana[diasemana]+ ", "+ diadomes +" "+arrayMes[mes]+ano + " - " +hora + ":" + minuto + ":" +segundo;
    document.form_relogio.relogio.value = Imprimir

    setTimeout("dataHora()",1000)
}