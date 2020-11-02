<!-------------------------------------------------------------------------------
PROJETO QUALIDADE DE SOFTWARE:
PUCPR
ENGENHARIA DE SOFTWARE

Equipe: Ana Schran, Gabriel Barboza e Lohan Akim
---------------------------------------------------------------------------------->
	
<!-- Top -->
	<div class="w3-top">

		<div class="w3-row w3-white w3-padding">

			<div class="w3-half" style="margin:4px 0 6px 0">
				<a href="."><img src='..\Imagens/logo.png' alt='QualityMap' width="89px" height="32px"></a>
			</div>

			<div class="w3-half w3-margin-top w3-wide w3-hide-medium w3-hide-small">
				<div class="w3-right"><a href="../entrar.php"><img src="../Imagens/sair.png" width="25" height="25" href="../entrar.php"></div>
			</div>
		</div>
		
	</div>

	<!-- Sidebar -->
	<div class="w3-sidebar w3-bar-block w3-collapse w3-animate-left" style="z-index:3;width:270px" id="mySidebar">
		<div class="w3-bar w3-hide-large w3-large">
			<a href="javascript:void(0)" onclick="w3_show_nav('menuAuditoria')"
			class="w3-bar-item w3-button w3-theme w3-hover-blue w3-padding-16" style="width:50%">Auditorias</a>
			
		</div>
		<a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-right w3-xlarge w3-hide-large"
		   title="Close Menu">×</a>
		<div id="menuA" class="myMenu">
			<div class="w3-container">
				<h3>Auditorias</h3>
			</div>
			<a class="w3-bar-item w3-button" href="cadastrarAudi.php">Adicionar Auditoria</a>
			<a class="w3-bar-item w3-button" href="listarAudi.php">Histórico de Auditorias</a>
		
			<a class="w3-bar-item w3-button" href='adicionarNC.php'>Adicionar Não Conformidade</a>
		
			<a class="w3-bar-item w3-button" href="checkAdd.php">Adicionar CheckList</a>
		</div>
	</div>
