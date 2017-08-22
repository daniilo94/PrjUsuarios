/**
 * Created by danilo.silva on 22/08/2017.
 */
var dtable = $('#table_id').DataTable({
    "ajax": {
        "method": "POST",
        "url": "carregar-usuarios.php"
    },
    "columns": [
        {"data": "id"},
        {"data": "nome"},
        {"data": "senha"},
        {"data": "birthday"},
        {"data": "cpf"},
        {"data": "sexo"},
        {"data": "acesso"},
        {"data": "botao"}
    ],
    "language": {
        "lengthMenu": "Mostrar _MENU_ registros por página",
        "zeroRecords": "Não foram encontrados registros",
        "info": "Página _PAGE_ de _PAGES_",
        "infoEmpty": "Nenhum registro disponível",
        "infoFiltered": "(filtered from _MAX_ total records)"
    },
    "columnDefs": [
        { "width": "5%", "targets": [0,6,7] }
    ],
    responsive: true
});

function objectifyForm(formArray) {//serialize data function

    var returnArray = {};
    for (var i = 0; i < formArray.length; i++) {
        returnArray[formArray[i]['name']] = formArray[i]['value'];
    }
    return returnArray;
}


$("#frmNovoUsuario").submit(function () {
    var teste = objectifyForm(this);
    var myJsonString = JSON.stringify(teste);
//        alert(myJsonString);
    novoUsuario();
    return false;
});

function novoUsuario() {
    xmlhttp = new XMLHttpRequest();
    fd = new FormData($("#frmNovoUsuario")[0]);
    $("#usuarios").html('Carregando...');
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4) {
            if (xmlhttp.status === 200) {
                $('#frmNovoUsuario')[0].reset();
                dtable.ajax.reload();
            } else {
                alert('Houve um erro.\n Código do erro: ' + xmlhttp.status);
            }
        }
    }
    xmlhttp.open("POST", "adicionar.php", true);
    xmlhttp.send(fd);
}

$('#table_id tbody').on( 'click', '.excluir', function () {
    id = dtable.row( this.closest('tr') ).data()['id'];
    xmlhttp = new XMLHttpRequest();
    fd = new FormData();
    fd.append("id", id);
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4){
            if (xmlhttp.status == 200 && xmlhttp.responseText == "1"){
                dtable.ajax.reload();
                alert('Excluído!');
            } else {
                alert(xmlhttp.responseText);
            }
        }
    };
    xmlhttp.open("POST", "excluir.php", true);
    xmlhttp.send(fd);
} );