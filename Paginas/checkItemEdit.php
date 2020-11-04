<!-------------------------------------------------------------------------------
PROJETO QUALIDADE DE SOFTWARE:
PUCPR
ENGENHARIA DE SOFTWARE

Equipe: Ana Schran, Gabriel Barboza e Lohan Akim
---------------------------------------------------------------------------------->

<html>
<head>
    <title>Editar Item de Checklist</title>
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
<body onload="w3_show_nav('menuA')">
<!-- Inclui MENU.PHP  -->
<?php require 'menu.php'; ?>

<!-- Conteúdo Principal: deslocado para direita em 270 pixels quando a sidebar é visível -->
<div class="w3-main w3-container" style="margin-left:270px;margin-top:117px;">

    <div class="w3-panel w3-padding-large w3-card-4 w3-light-grey">
        <h1 class="w3-xxlarge">Editar Item de Checklist</h1>

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
                $id=$_GET['id'];
                
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
                

                // Faz Select na Base de Dados
                $sql = "SELECT * FROM itemCheck WHERE idItem = $id";
                echo "<div class='w3-responsive w3-card-4'>"; //Inicio form
                 if ($result = mysqli_query($conn, $sql)) {
                        if (mysqli_num_rows($result) > 0) {


                        // Apresenta cada linha da tabela:
                            while ($row = mysqli_fetch_assoc($result)) {
                ?>              

                            <!--Inicio form-->
                            <div class="w3-responsive w3-card-4">
                                <div class="w3-container w3-theme">
                                    <h2>Informe a Pergunta</h2>
                                </div>
                                <form class="w3-container" action="checkItemEditBD.php" method="post" onsubmit="return check(this.form)">
                                    <input type="hidden" id="acaoForm" name="acaoForm" value="Cada">
                                    <input type="hidden" id="Id" name="id" value="<?php echo $row['idItem']; ?>">
                                    <p>
                                    <label class="w3-text-deep-purple"><b>Pergunta</b></label>
                                    <input class="w3-input w3-border w3-light-grey" name="pergunta" type="text" 
                                    value="<?php echo $row['pergunta']; ?>"
                                    title="Indique a pergunta a ser respondida." required></p>
                                    <p>
                                    <label class="w3-text-deep-purple"><b>Check</b></label><br>
                                    <?php $selecionado = $row['checkagem'];?>
                                    <input type="radio" id="Sim" name="check" value="Sim" 
                                    <?php echo $selecionado=='Sim'?'checked':'';?>>
                                    <label for="Sim">Sim</label><br>
                                    <input type="radio" id="Não" name="check" value="Não" 
                                    <?php echo $selecionado=='Não'?'checked':'';?>>
                                    <label for="Não">Não</label><br>
                                    <input type="radio" id="Não aplicável" name="check" value="Não aplicável"  
                                    <?php echo $selecionado=='Não aplicável'?'checked':'';?>>
                                    <label for="Não aplicável">Não aplicável</label><br>
                                    </p>
                                    <p>
                                    <label class="w3-text-deep-purple"><b>Item</b></label>
                                    <input class="w3-input w3-border w3-light-grey" name="item" type="text" 
                                    value="<?php echo $row['item']; ?>"
                                    title="Indique o Item avaliado." required></p>
                                    <p>
                                    <label class="w3-text-deep-purple"><b>Observações</b></label>
                                    <input class="w3-input w3-border w3-light-grey" name="obs" type="text" 
                                    value="<?php echo $row['obs']; ?>"
                                    title="Escreva as Observações."></p>
                                    <p>
                                    <input type="submit" value="Registrar" class="w3-btn w3-green" >
                                    <input type="button" value="Cancelar" class="w3-btn w3-red" 
                                    onclick="window.location.href='check.php'">
                                    </p>
                                </form>
            <?php 
                            }
                        }
                }
                else {
                    echo "Erro executando UPDATE: " . mysqli_error($conn);
                }
                echo "</div>"; //Fim form
                mysqli_close($conn);  //Encerra conexao com o BD

            ?>

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

<!-- FIM DIV PRINCIPAL -->
</div>
<!-- Inclui RODAPE.PHP  -->
<?php require 'rodape.php';?>

</body>
</html>
