<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PrjUsuarios</title>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="client/css/index.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
          integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="client/css/bootstrap/bootstrap.min.css" >
    <link rel="stylesheet" href="client/css/bootstrap/bootstrap.css" >
</head>
<body>
<div class="container">
    <header>
        <h3 class="text-center">Cadastro de usuários</h3>
    </header>
    <div id="divForm">
        <form id="frmNovoUsuario" class="" method="POST" action="adicionar.php">
            <div class="form-group">
                <label for="nome" class="col-sm-2 control-label">Nome:</label>
                <input id="nome" class="col-sm-2" name="nome" type="text" required>
            </div>
            <div class="form-group">
                <label for="senha" class="col-sm-2">Senha:</label>
                <input id="senha" class="col-sm-2" name="senha" type="text" required>
            </div>
            <div class="form-group">
                <label for="birthday" class="col-sm-2">Birthday:</label>
                <input id="birthday" class="col-sm-2 date" name="birthday" type="date" required>
            </div>
            <div class="form-group">
                <label for="cpf" class="col-sm-2">CPF:</label>
                <input id="cpf" class="col-sm-2" name="cpf" type="text" required>
            </div>
            <div class="form-group">
                <label for="sexo" class="col-sm-2">Sexo:</label>
                <input id="sexo" class="col-sm-2" name="sexo" type="text" required>
            </div>
            <div class="form-group">
                <label for="acesso" class="col-sm-2">T. de acesso:</label>
                <input id="acesso" class="col-sm-2" name="acesso" type="number" required>
            </div>
            <div class="col-sm-2"></div>
            <button id="btnEnviar" class="btn btn-primary col-sm-2" type="submit">Enviar</button>
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
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
        integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
        crossorigin="anonymous"></script>

<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.js"></script>


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
            {"width": "5%", "targets": [0, 6, 7]}
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

    $('#table_id tbody').on('click', '.excluir', function () {
        id = dtable.row(this.closest('tr')).data()['id'];
        xmlhttp = new XMLHttpRequest();
        fd = new FormData();
        fd.append("id", id);
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4) {
                if (xmlhttp.status == 200 && xmlhttp.responseText == "1") {
                    dtable.ajax.reload();
                    alert('Excluído!');
                } else {
                    alert(xmlhttp.responseText);
                }
            }
        };
        xmlhttp.open("POST", "excluir.php", true);
        xmlhttp.send(fd);
    });


</script>

</body>
</html>