<!-------------------------------------------------------------------------------
PROJETO QUALIDADE DE SOFTWARE:
PUCPR
ENGENHARIA DE SOFTWARE

Equipe: Ana Schran, Gabriel Barboza e Lohan Akim
---------------------------------------------------------------------------------->

 <!-- Sobre -->

    <div id="id01" class="w3-modal w3-animate-opacity">
        <div class="w3-modal-content">
            <header class="w3-container w3-theme">
                <span onclick="document.getElementById('id01').style.display='none'"
                      class="w3-button w3-display-topright">&times;</span>
                <h2>PROJETO DE QUALIDADE DE SOFTWARE</h2>
            </header>
            <div class="w3-container">
                <p>QUALITY MAP: <b>Atividade Somativa de Qualidade de Software</b></p>
                <p class="w3-small">Ana Schran, Gabriel Barboza e Lohan Akim</p>
                <p class="w3-small">Professora: Kelly Bettio</p>
            </div>
            <footer class="w3-container w3-theme ">
                <p>CURITIBA 2020 (PUCPR) </p>
            </footer>
        </div>
    </div>

    <script>
        // Script para abrir e fechar o sidebar
        function w3_open() {
            document.getElementById("mySidebar").style.display = "block";
            document.getElementById("myOverlay").style.display = "block";
        }

        function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
            document.getElementById("myOverlay").style.display = "none";
        }

        function w3_show_nav(name) {
            document.getElementById("menuAuditoria").style.display = "none";
            document.getElementById(name).style.display = "block";
        }
    </script>

