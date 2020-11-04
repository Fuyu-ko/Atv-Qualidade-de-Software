<!-------------------------------------------------------------------------------
PROJETO QUALIDADE DE SOFTWARE:
PUCPR
ENGENHARIA DE SOFTWARE

Equipe: Ana Schran, Gabriel Barboza e Lohan Akim
---------------------------------------------------------------------------------->
<html>
<head>
    <title>Editar NC</title>
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
        <h1 class="w3-xxlarge">Editar Não Conformidade (NC)</h1>

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
                $id = $_GET['id'];
                
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
                
                echo "<div class='w3-responsive w3-card-4'>";

                $sql = "SELECT*FROM (nConformidades JOIN (checkList JOIN itemCheck ON idAvaliacao = idCheck) 
                ON idAvaliacaoNc = idAvaliacao)
                JOIN auditoria ON idAuditoriaNc = idAuditoria
                WHERE idNC = $id";
                echo "<div class='w3-responsive w3-card-4'>"; //Inicio form
                 if ($result = mysqli_query($conn, $sql)) {
                        if (mysqli_num_rows($result) > 0) {


                        // Apresenta cada linha da tabela:
                            while ($row = mysqli_fetch_assoc($result)) {
                ?>              
                <!--Inicio form-->
                <div class="w3-responsive w3-card-4">
                    <div class="w3-container w3-theme">
                        <h2>Informe os dados da NC</h2>
                    </div>
                    <form class="w3-container" action="editarNcBD.php" method="post" onsubmit="return check(this.form)">
                        <input type="hidden" id="acaoForm" name="acaoForm" value="Cada">
                        <input type="hidden" id="Id" name="id" value="<?php echo $row['idNC']; ?>">
                        <p>
                        <label class="w3-text-deep-purple"><b>Não conformidade</b></label>
                        <input class="w3-input w3-border w3-light-grey" name="nc" type="text" pattern="[a-zA-Z0-9\u00C0-\u00FF ]{1,100}$"
                        title="NC encontrada. (Não é possível alterar)" 
                        value="<?php echo $row['NcEncontradas']?>" required readonly></p>
                        <p>
                        <label class="w3-text-deep-purple"><b>Ação Corretiva indicada</b></label>
                        <input class="w3-input w3-border w3-light-grey" name="aCorretiva" type="text" pattern="[a-zA-Z0-9\u00C0-\u00FF ]{1,100}$" title="Indique qual Ação Corretiva é a mais indicada para ser tomada."
                        value="<?php echo $row['acaoCorretiva']?>" required></p>
                        <p>
                        <label class="w3-text-deep-purple"><b>Responsável</b></label>
                        <input class="w3-input w3-border w3-light-grey" name="resp" type="text" pattern="[a-zA-Z0-9\u00C0-\u00FF ]{1,100}$" title="Responsável por essa NC. (Não é possível alterar)" value="<?php echo $row['responsavel']?>"
                        required readonly></p>
                        <p>
                        <label class="w3-text-deep-purple"><b>Classificação da NC e Prazo recomendado</b></label><br>
                        <?php $selecionado = $row['classNC'];?>
                        <input id="a" type="radio" name="class" value="Advertência (Não se Aplica)"
                        <?php echo $selecionado=='Advertência (Não se Aplica)'?'checked':'';?>>
                        <label for="a">Advertência (Não se Aplica)</label><br>
                        <input id="bs" type="radio" name="class" value="Baixa-Simples"
                        <?php echo $selecionado=='Baixa-Simples'?'checked':'';?>>
                        <label for="bs">Baixa-Simples > Recomendado 4 dias</label><br>
                        <input id="bc"type="radio" name="class" value="Baixa-Complexa"
                        <?php echo $selecionado=='Baixa-Complexa'?'checked':'';?>>
                        <label for="bc">Baixa-Complexa > Recomendado 5 dias</label><br>
                        <input id="ms" type="radio" name="class" value="Média-Simples"
                        <?php echo $selecionado=='Média-Simples'?'checked':'';?>>
                        <label for="ms">Média-Simples > Recomendado 3 dias</label><br>
                        <input id="mc" type="radio" name="class" value="Média-Complexa"
                        <?php echo $selecionado=='Média-Complexa'?'checked':'';?>>
                        <label for="mc">Média-Complexa > Recomendado 4 dias</label><br>
                        <input id="as" type="radio" name="class" value="Alta-Simples"
                        <?php echo $selecionado=='Alta-Simples'?'checked':'';?>>
                        <label for="as">Alta-Simples > Recomendado 2 dias</label><br>
                        <input id="ac" type="radio" name="class" value="Alta-Complexa"
                        <?php echo $selecionado=='Alta-Complexa'?'checked':'';?>>
                        <label for="ac">Alta-Complexa > Recomendado 3 dias</label><br>
                        <input id="us" type="radio" name="class" value="Urgente-Simples"
                        <?php echo $selecionado=='Urgente-Simples'?'checked':'';?>>
                        <label for="us">Urgente-Simples > Recomendado 1 dia</label><br>
                        <input id="uc" type="radio" name="class" value="Urgente-Complexa"
                        <?php echo $selecionado=='Urgente-Complexa'?'checked':'';?>>
                        <label for="uc">Urgente-Complexa > Recomendado 2 dias</label><br>
                        </p>
                        <p>
                        <?php
                            $date = date("Y-m-d");
                        ?>
                        <label class="w3-text-deep-purple"><b>Data de Notificação</b></label>
                        <input class="w3-input w3-border w3-light-grey" name="emissao" type="date" pattern="[a-zA-Z0-9\u00C0-\u00FF ]{1,100}$" title="Data em que a NC está sendo emitida." value="<?php echo $date; ?>" required readonly="">
                        <label class="w3-text-deep-purple"><b>Prazo inicial</b></label>
                        <input class="w3-input w3-border w3-light-grey" name="prazo" type="date" pattern="[a-zA-Z0-9\u00C0-\u00FF ]{1,100}$" title="Data para conclusão da correção da NC. (Não é possível alterar)" 
                        value="<?php echo $row['prazo']; ?>" required readonly>
                        <label class="w3-text-deep-purple"><b>Novo Prazo</b></label>
                        <input class="w3-input w3-border w3-light-grey" name="nPrazo" type="date" pattern="[a-zA-Z0-9\u00C0-\u00FF ]{1,100}$" title="Nova data para conclusão da correção da NC." 
                        value="<?php echo $row['prazo']; ?>" required>
                        <label class="w3-text-deep-purple"><b>Data para reavaliação</b></label>
                        <input class="w3-input w3-border w3-light-grey" name="reav" type="date" pattern="[a-zA-Z0-9\u00C0-\u00FF ]{1,100}$" title="Data para reavaliação da correção da NC."></p>
                        <p>
                        <label class="w3-text-deep-purple"><b>Informações do Checklist</b></label>
                        <br>
                        <?php
                            echo "<select class='w3-input w3-border w3-light-grey' name='iCheck' style='width:40%; height:4.5%; padding:0%; padding-left:8px' title='Checklist de referência. (Não é possível alterar)' disabled='disabled'>";
                            echo $idC = $row['idAvaliacao'];
                            if ($result = mysqli_query($conn, $sql)) {
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "";
                                        echo "<option value=";
                                        echo $row["idAvaliacao"];
                                        echo "<?php echo $idC=='";
                                        echo $row["idAvaliacao"];
                                        echo "'?'selected':'';?>";
                                        echo $row['nomeCheck'];
                                        echo "</option>";
                                        }
                                    }
                                }
                            echo "</select>";
                        ?>
                        </p>
                        <p>
                        <label class="w3-text-deep-purple"><b>Item avaliado</b></label>
                        <br>
                        <?php
                            $sql2 = "SELECT DISTINCT item FROM (itemCheck JOIN checkList ON idAvaliacao = idCheck)
                            JOIN nConformidades ON idAvaliacao = idAvaliacaoNc WHERE idNC = $id";
                            echo "<select class='w3-input w3-border w3-light-grey' name='itens' style='width:40%; height:4.5%; padding:0%; padding-left:8px' title='Checklist de referência. (Não é possível alterar)'>";
                            if ($result = mysqli_query($conn, $sql2)) {
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "";
                                        echo "<option value=";
                                        echo $row["item"];
                                        echo ">";
                                        echo $row['item'];
                                        echo "</option>";
                                        }
                                    }
                                }
                            echo "</select>";
                        ?>
                        </p>
                        <p>
                        <label class="w3-text-deep-purple"><b>Salvar na Auditoria</b></label>
                        <br>
                        <?php
                            echo "<select class='w3-input w3-border w3-light-grey' name='sAuditoria' style='width:40%; height:4.5%; padding:0%; padding-left:8px' title='Auditoria em que foi identificada a NC. (Não é possível alterar)' disabled='disabled'>";
                            echo $idA = $row['idAuditoria'];
                            if ($result = mysqli_query($conn, $sql)) {
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "";
                                        echo "<option value=";
                                        echo $row["idAuditoria"];
                                        echo "<?php echo $idA=='";
                                        echo $row["idAuditoria"];
                                        echo "'?'selected':'';?>";
                                        echo $row['titulo'];
                                        echo "</option>";
                                        }
                                    }
                                }
                            echo "</select>";
                        ?>
                        </p>
                        <p>
                        <label class="w3-text-deep-purple"><b>Escalonado</b></label><br>
                        <input id="n" type="radio" name="esc" value="Não" checked>
                        <label for="n">Não</label><br>
                        <input id="s" type="radio" name="esc" value="Sim">
                        <label for="s">Sim</label><br>
                        </p>
                        <p>
                        <label class="w3-text-deep-purple"><b>Data Resolução</b></label>
                        <input class="w3-input w3-border w3-light-grey" name="dRes" type="date" pattern="[a-zA-Z0-9\u00C0-\u00FF ]{1,100}$" title="Nova data para conclusão da correção da NC."></p>
                        <p>
                        <input type="submit" value="Confirmar" class="w3-btn w3-green" >
                        <input type="button" value="Cancelar" class="w3-btn w3-red" 
                        onclick="window.location.href='acompanharNC.php'"></p>
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