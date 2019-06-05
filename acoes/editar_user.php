<?php
    include_once './../conexao.php';

    // Obtém o ID via GET
    $id = $_SESSION["id_user"];

    $nome = $_POST['nome'];
    $foto = $_POST['foto'];
    $especialidade = $_POST['especialidade'];
    $local = $_POST['local'];
    $dia = $_POST['dia'];
    $mes = $_POST['mes'];
    $ano = $_POST['ano'];

    if($nome == "" || $especialidade == "" || $dia == "" || $mes == "" || $ano == ""){
        echo "<script>
                alert('Preencha os campos obrigatórios!');
            </script>";
    } else {
        $sql = "UPDATE user SET name='$nome', photo='$foto', especi_hum='$especialidade',
        local_nasc='$local', dia_nasc='$dia', mes_nasc='$mes', ano_nasc='$ano' WHERE id_user='$id'";
    
        $retorno = $conexao->query($sql);
        if($retorno){
            echo "<script>
                    document.location.href ='./../painel.php';
                    alert('Dados atualizados com sucesso!');
                </script>";
        } else {
            echo "<script>
                    document.location.href ='./../painel.php';
                    alert('Erro ao atualizar os dados!');
                </script>";
        }

    }


?>