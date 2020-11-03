<!-------------------------------------------------------------------------------
PROJETO QUALIDADE DE SOFTWARE:
PUCPR
ENGENHARIA DE SOFTWARE

Equipe: Ana Schran, Gabriel Barboza e Lohan Akim
---------------------------------------------------------------------------------->
<html>
<head>
    <title>Adicionar NC</title>
    <link rel="icon" type="image/png" href="../imagens/logoIcone.ico"/>
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
        input[type=submit]{
            background-color: royalblue;
            border-style: 0.1px solid;
            border-color: royalblue;
            color: white;
            padding-top: 2.7px;
            padding-bottom: 2.7px;
        }
        input[type=submit]:hover{
            background-color: lightblue;
            border-color: lightblue;
            cursor: pointer;
        }
        input[type=text]{
            border-style: 0.1px solid;
            border-color: royalblue;
            padding: 3px;
            padding-left: 2%;
        }     
    </style>
</head>
<body onload="w3_show_nav('menuA')">
<!-- Inclui MENU.PHP  -->
<?php require 'menu.php'; ?>

<!-- Conteúdo Principal: deslocado para direita em 270 pixels quando a sidebar é visível -->
<div class="w3-main w3-container" style="margin-left:270px;margin-top:117px;">

    <div class="w3-panel w3-padding-large w3-card-4 w3-light-grey">
        <h1 class="w3-xxlarge">Inserir Não Conformidade (NC)</h1>

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
                
                // Cria conexão
                $conn = mysqli_connect($servername, $username, $password, $database);

                // Verifica conexão
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // Configura para trabalhar com caracteres acentuados do português
                mysqli_query($conn,"SET NAMES 'utf8'");
                mysqli_query($conn,"SET NAMES 'utf8'");
                mysqli_query($conn,'SET character_set_connection=utf8');
                mysqli_query($conn,'SET character_set_client=utf8');
                mysqli_query($conn,'SET character_set_results=utf8');
                
                echo "<div class='w3-responsive w3-card-4'>";?>
                <!--Inicio form-->
                <div class="w3-responsive w3-card-4">
                    <div class="w3-container w3-theme">
                        <h2>Informe os dados da NC</h2>
                    </div>
                    <form class="w3-container" action="adicionarNcBD.php" method="post" onsubmit="return check(this.form)">
                        <input type="hidden" id="acaoForm" name="acaoForm" value="Cada">
                        <!--Dá para fazer o ID ser automático
                            Auto Increment não é uma boa ideia pois o id faz o increment com base no anterior
                            Talvez tentar criar IDs numéricos aleatórios seja melhor
                            Por enquanto, para testes, está o auto_increment
                        -->
                        <p>
                        <label class="w3-text-deep-purple"><b>Não conformidade</b></label>
                        <input class="w3-input w3-border w3-light-grey" name="nc" type="text" pattern="[a-zA-Z0-9\u00C0-\u00FF ]{1,100}$" title="Indique qual foi a NC encontrada." required></p>
                        <p>
                        <label class="w3-text-deep-purple"><b>Ação Corretiva indicada</b></label>
                        <input class="w3-input w3-border w3-light-grey" name="aCorretiva" type="text" pattern="[a-zA-Z0-9\u00C0-\u00FF ]{1,100}$" title="Indique qual Ação Corretiva é a mais indicada para ser tomada." required></p>
                        <p>
                        <label class="w3-text-deep-purple"><b>Responsável</b></label>
                        <input class="w3-input w3-border w3-light-grey" name="resp" type="text" pattern="[a-zA-Z0-9\u00C0-\u00FF ]{1,100}$" title="Indique o responsável por essa NC." required></p>
                        <p>
                        <label class="w3-text-deep-purple"><b>Classificação da NC</b></label>
                        <br>
                        <?php
                        // Por algum motivo quando só tem 1 auditoria, isso não funciona
                        // Se criar outra e apagar funciona
                        // Não sei se é só para mim que isso acontece
                            $sql = "SELECT * FROM classificacao";
                            echo "<select class='w3-input w3-border w3-light-grey' name='class' style='width:40%; height:4.5%; padding:0%; padding-left:8px' title='Selecione a Classificação da NC.'>";
                            if ($result = mysqli_query($conn, $sql)) {
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "";
                                        echo "<option value=";
                                        echo $row['class'];
                                        echo "|";
                                        echo $row['tempo'];
                                        echo ">";
                                        echo $row['class'];
                                        echo "</option>";
                                        }
                                    }
                                }
                            echo "</select>";
                        ?>
                        </p>
                        <p>
                        <label class="w3-text-deep-purple"><b>Informações do Checklist</b></label>
                        <br>
                        <?php
                            $sql = "SELECT * FROM checkList";
                            echo "<select class='w3-input w3-border w3-light-grey' name='iCheck' style='width:40%; height:4.5%; padding:0%; padding-left:8px' title='Selecione o Checklist de referência.'>";
                            if ($result = mysqli_query($conn, $sql)) {
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "";
                                        echo "<option value=";
                                        echo $row["idAvaliacao"];
                                        echo ">";
                                        echo $row['nomeCheck'];
                                        echo "</option>";
                                        }
                                    }
                                }
                            echo "</select>";
                        ?>
                        </p>
                        <p>
                        <label class="w3-text-deep-purple"><b>Salvar na Auditoria</b></label>
                        <!--Salvar na auditoria está certo?-->
                        <br>
                        <?php
                            $sql = "SELECT * FROM auditoria";
                            echo "<select class='w3-input w3-border w3-light-grey' name='sAuditoria' style='width:40%; height:4.5%; padding:0%; padding-left:8px' title='Selecione a Auditoria em que foi identificada a NC.'>";
                            if ($result = mysqli_query($conn, $sql)) {
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "";
                                        echo "<option value=";
                                        echo $row["idAuditoria"];
                                        echo ">";
                                        echo $row['titulo'];
                                        echo "</option>";
                                        }
                                    }
                                }
                            echo "</select>";
                        ?>
                        </p>                        
                        <p>
                        <input type="submit" value="Registrar" class="w3-btn w3-green" >
                        <input type="button" value="Cancelar" class="w3-btn w3-red" onclick="window.location.href='../index.php'"></p>
                    </form>
                </div>

            </div>
        </p>
    </div>
    <footer class="w3-panel w3-padding-32 w3-card-4 w3-light-grey w3-center w3-opacity">
    <p>
        <nav>
            <a class="w3-button w3-theme w3-hover-blue"
               onclick="document.getElementById('id01').style.display='block'">Sobre</a>
        </nav>
    </p>
    </footer>

</div>

<!-- Inclui RODAPE.PHP -->
<?php require 'rodape.php';?>
</body>
</html>