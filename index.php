<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>PrjUsuarios</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.css">

    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.js"></script>
    <style>
        #divForm {
            margin: 20px;
        }

        #divForm div {
            margin: 5px;
        }

        #divForm input {
            margin-right: 10px;
        }
    </style>
</head>
<body>
<div id="divForm">
    <form id="frmNovoUsuario" method="POST" action="adicionar.php">
        <div>
            <label for="nome">Nome:</label>
            <input id="nome" name="nome" type="text" required>
        </div>
        <div>
            <label for="senha">Senha:</label>
            <input id="senha" name="senha" type="text" required>
        </div>
        <div>
            <label for="birthday">Birthday:</label>
            <input id="birthday" name="birthday" type="date" required>
        </div>
        <div>
            <label for="cpf">CPF:</label>
            <input id="cpf" name="cpf" type="text" required>
        </div>
        <div>
            <label for="sexo">Sexo:</label>
            <input id="sexo" name="sexo" type="text" required>
        </div>
        <div>
            <label for="acesso">T. de acesso:</label>
            <input id="acesso" name="acesso" type="number" required>
        </div>
        <button id="btnEnviar" type="submit">Enviar</button>
    </form>
</div>
<br>
<hr>
<br>
<div style="width: 80%;margin-left: 50px">
    <table id="table_id" class="display" style="    width: 100%;clear: both;
    margin-bottom: 6px !important;
    max-width: none !important;border: 1px solid #ddd;    background-color: transparent;border-spacing: 0;
    border-collapse: collapse;box-sizing: border-box;display: table;">
        <thead>
        <tr>
            <td>ID</td>
            <td>Nome</td>
            <td>Senha</td>
            <td>Nascimento</td>
            <td>CPF</td>
            <td>Sexo</td>
            <td>T. de acesso</td>
            <td></td>
        </tr>
        </thead>
    </table>
</div>


<script>
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


</script>

</body>
</html>