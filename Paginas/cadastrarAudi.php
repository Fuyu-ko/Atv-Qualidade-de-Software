<!-------------------------------------------------------------------------------
PROJETO QUALIDADE DE SOFTWARE:
PUCPR
ENGENHARIA DE SOFTWARE

Equipe: Ana Schran, Gabriel Barboza e Lohan Akim
---------------------------------------------------------------------------------->
<html>
<head>
    <title>Adicionar Auditoria</title>
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
<?php require 'menu.php';?>

<!-- Conteúdo Principal: deslocado paa direita em 270 pixels quando a sidebar é visível -->
<div class="w3-main w3-container" style="margin-left:270px;margin-top:117px;">

    <div class="w3-panel w3-padding-large w3-card-4 w3-light-grey">
        <h1 class="w3-xxlarge">Adicionar Auditoria</h1>

        <p class="w3-large">
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

                <div class="w3-responsive w3-card-4">
                    <div class="w3-container w3-theme">
                        <h2>Informe os dados da Nova Auditoria</h2>
                    </div>
                    <form class="w3-container" action="cadastrarAudiBD.php" method="post" onsubmit="return check(this.form)">
						<input type="hidden" id="acaoForm" name="acaoForm" value="Cada">
						<p>
                        <label class="w3-text-deep-purple"><b>Titulo</b></label>
                        <input class="w3-input w3-border w3-light-grey" name="titulo" type="text" title="Titulo da Auditoria." required></p>
                        <p>
						<label class="w3-text-deep-purple"><b>Descricao</b></label>
                        <input class="w3-input w3-border w3-light-grey" name="descricao" type="text" title="Descricao da Auditoria." required></p>
                        <p>
                        <label class="w3-text-deep-purple"><b>Auditor</b></label>
                        <input class="w3-input w3-border w3-light-grey" name="auditor" type="text" title="Nome do Auditor." required></p>
                        <p>
                        <label class="w3-text-deep-purple"><b>Data</b></label>
                        <?php
                        $date = date("Y-m-d");
                        ?>
                        <input class="w3-input w3-border w3-light-grey" name="data" type="text" title="Data da Auditoria." 
                        value="<?php echo $date ?>" required></p>
                        <p>
						<input type="submit" value="Cadastrar" class="w3-btn w3-green" >
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

<!-- FIM PRINCIPAL -->
</div>

<!-- Inclui RODAPE.PHP  -->
<?php require 'rodape.php';?>
</body>
</html>