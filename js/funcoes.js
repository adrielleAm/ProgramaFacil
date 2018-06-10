function enviarDados(id){
    window.open("atualizaProjeto.php?id="+id+'&adm=1','_blank');
}

function enviarCliente(){
    id = document.getElementById('clientes').value;
    window.open("atualizaCliente.php?id="+id+'&adm=1','_blank');
}

function enviarProgramador(){
    id = document.getElementById('programadores').value;
    window.open("atualizaProgramador.php?id="+id+'&adm=1','_blank');
}

function enviarProjetos(){
    id = document.getElementById('projetos').value;
    window.open("atualizaProjeto.php?id="+id+'&adm=1','_blank');
}
function carregaProjetos(){
    var cliente = document.getElementById('clientes').value;

    $.ajax({
        type: "POST",
        url: "coletor.php",
        dataType: "html",
        data: {
            'idCliente': cliente,
            'tipo': 'administrador'
        },

        success: function (data) {
            document.getElementById('ProjetosClasse').innerHTML = data;
        },

        error: function (data) {
        alert('Aconteceu algum erro') ;
        },

    });
}

function clienteProgramadorProjeto() {
    var programador = document.getElementById('programadores').value;
    // var cliente = document.getElementById('clientes').value;
    var projeto = document.getElementById('projetos').value;
    $.ajax({
        type: "POST",
        url: "coletor.php",
        dataType: "html",
        data: {
            'idProgramador': programador,
            'idProjeto': projeto,
            'tipo': 'programador',
            'acao': 'incluirProgramadorProjeto',
        },

        success: function (data) {
            alert('O programador faz parte do projeto');
        },
        
        error: function (data) {
            alert('Aconteceu algum erro') ;
        },

    });
}