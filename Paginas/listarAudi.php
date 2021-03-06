<!-------------------------------------------------------------------------------
PROJETO QUALIDADE DE SOFTWARE:
PUCPR
ENGENHARIA DE SOFTWARE

Equipe: Ana Schran, Gabriel Barboza e Lohan Akim
---------------------------------------------------------------------------------->

<html>
<head>
    <title>Histórico de Auditorias</title>
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
        <h1 class="w3-xxlarge">Histórico de Auditorias</h1>

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
            $sql = "SELECT * FROM auditoria";
            echo "<div class='w3-responsive w3-card-4'>";
            if ($result = mysqli_query($conn, $sql)) {
                //NÃO CONSIGO CENTRALIZAR ISSO
                echo "<table class='w3-table-all'>";
                echo "  <tr>";
                echo "    <th width='5%'>Id</th>";
                echo "    <th width='20%'>Título</th>";
                echo "    <th width='45%'>Descricao</th>";
                echo "    <th width='15%'>Auditor</th>";
                echo "    <th width='15%'>Data</th>";
                echo "  </tr>";

                if (mysqli_num_rows($result) > 0) {
                    $idFalso = 1;
                        // Apresenta cada linha da tabela
                        while ($row = mysqli_fetch_assoc($result)) {
                            $cod = $row["idAuditoria"];
                            echo "<tr>";
                            echo "<td>";
                            echo $idFalso;
                            echo "</td><td>";
                            echo $row["titulo"];
                            echo "</td><td>";
                            echo $row["descricaoAvaliacao"];
                            echo "</td><td>";
                            echo $row["auditor"];
                            echo "</td><td>";
                            echo $row["dataAuditoria"];
                            echo "</td>";

                            $idFalso = $idFalso + 1;
                        
                ?>
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
                <input type="button" value="Visualizar CheckLists" class="w3-btn w3-blue" 
                onclick="window.location.href='check.php'">
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