<!-------------------------------------------------------------------------------
PROJETO QUALIDADE DE SOFTWARE:
PUCPR
ENGENHARIA DE SOFTWARE

Equipe: Ana Schran, Gabriel Barboza e Lohan Akim
---------------------------------------------------------------------------------->

<html>
<head>
    <title>Checklists</title>
    <link rel="icon" type="image/png" href="../Imagens/IconeNovoAzul.ico"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        .w3-theme {
            color: #ffff !important;
            background-color: royalblue !important
        }

        .w3-code {
            border-left: 4px solid royalblue
        }

        .myMenu {
            margin-bottom: 150px
        }
    </style>
</head>
<body onload="w3_show_nav('menuEstoque')">
<!-- Inclui MENU.PHP  -->
<?php require 'menu.php'; ?>

<!-- Conteúdo Principal: deslocado para direita em 270 pixels quando a sidebar é visível -->
<div class="w3-main w3-container" style="margin-left:270px;margin-top:117px;">

    <div class="w3-panel w3-padding-large w3-card-4 w3-light-grey">
        <h1 class="w3-xxlarge">CheckList</h1>

        <p class="w3-large">
        <p>
        <div class="w3-code cssHigh notranslate">
            <!-- Acesso em:-->
            <?php

            date_default_timezone_set("America/Sao_Paulo");
            $data = date("d/m/Y H:i:s", time());
            echo "<p class='w3-small' > ";
            echo "Acesso em: ";
            echo $data;
            echo "</p> "
            ?>

            <!-- Acesso ao BD-->
            <?php
            $servername = "localhost:3306";
            $username = "root";
            $password = "";
            $database = "lista";
            
            // Verifica conexão
            $conn = mysqli_connect($servername, $username, $password, $database);
            
            // Verifica conexão 
            if (!$conn) {
                echo "</table>";
                echo "</div>";
                die("Falha na conexão com o Banco de Dados: " . mysqli_connect_error());
            }
            
            // Configura para trabalhar com caracteres acentuados do português
            mysqli_query($conn,"SET NAMES 'utf8'");
            mysqli_query($conn,"SET NAMES 'utf8'");
            mysqli_query($conn,'SET character_set_connection=utf8');
            mysqli_query($conn,'SET character_set_client=utf8');
            mysqli_query($conn,'SET character_set_results=utf8');

            // Faz Select na Base de Dados
            $sql = "SELECT * FROM checklist JOIN auditoria WHERE idAuditoriaC = idAuditoria";
            echo "<div class='w3-responsive w3-card-4'>";
            if ($result = mysqli_query($conn, $sql)) {
                //NÃO CONSIGO CENTRALIZAR ISSO
                echo "<table class='w3-table-all'>";
                echo "  <tr>";
                echo "    <th width='10%'>Id</th>";
                echo "    <th width='25%'>Nome do CheckList</th>";
                echo "    <th width='40%'>Auditoria</th>";
                echo "    <th width='15%'>Artefato</th>";
                echo "    <th width='10%'>Acessar</th>";
                echo "  </tr>";

                if (mysqli_num_rows($result) > 0) {
                    $idFalso = 1;
                        // Apresenta cada linha da tabela
                        while ($row = mysqli_fetch_assoc($result)) {
                            $cod = $row["idAvaliacao"];
                            echo "<tr>";
                            echo "<td>";
                            echo $idFalso;
                            echo "</td><td>";
                            echo $row["nomeCheck"];
                            echo "</td><td>";
                            echo $row["titulo"];
                            echo "</td><td>";
                            echo $row["artefato"];
                            echo "</td><td>";

                            $idFalso = $idFalso + 1;
                ?>
                            <a href='checkItem.php?id=<?php echo $cod; ?>'><img src='../Imagens/Selecionar.png' title='Acessar perguntas do CheckList' width='32'></a>
                            </td>

                 <?php
                    }
                }
                echo "</table>";
                echo "</div>";
            } else {
                echo "Erro executando SELECT: " . mysqli_error($conn);
            }

            mysqli_close($conn);  //Encerra conexao com o BD

            ?>
            <p>
                <input type="button" value="Adicionar CheckList" class="w3-btn w3-blue" 
                onclick="window.location.href='../Paginas/checkAdd.php'">
                <input type="button" value="Voltar" class="w3-btn w3-blue" 
                onclick="window.location.href='../Paginas/listarAudi.php'">
            </p>
        </div>
    </div>


    <footer class="w3-panel w3-padding-32 w3-card-4 w3-light-grey w3-center w3-opacity">
        <p>
            <nav>
                <a class="w3-button w3-theme w3-hover-blue"
                   onclick="document.getElementById('id01').style.display='block'">Sobre</a>
            </nav>
        </p>
    </footer>

<!-- FIM PRINCIPAL -->
</div>
<!-- Inclui RODAPE.PHP  -->
<?php require 'rodape.php';?>
</body>
</html>