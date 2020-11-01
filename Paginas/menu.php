<!-------------------------------------------------------------------------------
PROJETO DE EXPERIÊNCIA CRIATIVA 02:
SEA+
PUCPR
ENGENHARIA DE SOFTWARE

Equipe: Ana Schran, Gabriel Barboza, Lohan Akim e Victor Negrelli
---------------------------------------------------------------------------------->
	<!-- Top -->
	<div class="w3-top">

		<div class="w3-bar w3-theme w3-large" style="z-index:4;">
			<a class="w3-bar-item w3-button w3-left w3-hide-large w3-hover-blue w3-large w3-theme w3-padding-16" href="javascript:void(0)" onclick="w3_open()">☰</a>
			
		</div>
	</div>

	<!-- Sidebar -->
	<div class="w3-sidebar w3-bar-block w3-collapse w3-animate-left" style="z-index:3;width:270px" id="mySidebar">
		<div class="w3-bar w3-hide-large w3-large">
			<a href="javascript:void(0)" onclick="w3_show_nav('menuFuncionario')"
			class="w3-bar-item w3-button w3-theme w3-hover-blue w3-padding-16" style="width:50%">Auditorias</a>
		</div>
		<a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-right w3-xlarge w3-hide-large"
		   title="Close Menu">×</a>
		<div id="menuFuncionario" class="myMenu">
			<div class="w3-container">
				<h3>Auditorias</h3>
			</div>
			<a class="w3-bar-item w3-button" href="cadastrarAudi.php">Adicionar Auditoria</a>
			<a class="w3-bar-item w3-button" href="listarAudi.php">Auditorias</a>
			
		</div>
		
	</div>
