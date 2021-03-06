<!-------------------------------------------------------------------------------
PROJETO QUALIDADE DE SOFTWARE:
PUCPR
ENGENHARIA DE SOFTWARE

Equipe: Ana Schran, Gabriel Barboza e Lohan Akim
---------------------------------------------------------------------------------->
	
<!-- Top -->
	<div class="w3-top">
		<div class="w3-row w3-blue w3-padding">
			<div class="w3-half" style="margin:4px 0 3px 0">
				<a href="../index.php"><img src='..\Imagens/IconeNovo.png' alt='QualityMap' width="190px" height="55px"></a>
			</div>
			
		</div>
		<div class="w3-bar w3-light-grey w3-large" style="z-index:4;">
			<a class="w3-bar-item w3-button w3-left w3-hide-large w3-hover-blue w3-large w3-light-grey w3-padding-16" 
			href="javascript:void(0)" onclick="w3_open()">☰</a>
			<a class="w3-bar-item w3-hide-medium w3-hide-small w3-padding-16 w3-text-light-gray">*-*</a>
		</div>
	</div>

	<!-- Sidebar -->
	<div class="w3-sidebar w3-bar-block w3-collapse w3-animate-left w3-light-grey" style="z-index:3;width:270px" id="mySidebar">
		<a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-right w3-xlarge w3-hide-large"
		   title="Close Menu">×</a>
		<div id="menuA" class="myMenu">
			<div class="w3-container">
				<h3>Auditorias</h3>
			</div>
			<a class="w3-bar-item w3-button" href="cadastrarAudi.php">Adicionar Auditoria</a>
			<a class="w3-bar-item w3-button" href="listarAudi.php">Histórico de Auditorias</a>
			<a class="w3-bar-item w3-button" href='acompanharNC.php'>Acompanhar Não Conformidades</a>
		</div>

	</div>
