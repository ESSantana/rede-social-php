<div class="w3-row-padding publisharea">
    <div class="w3-col m12">
        <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding publishcontainer">
                <!-- FORMULARIO PARA POSTAR ALGO, CHAMA O CÓDIGO PUBLICAR_ACTION.PHP -->
                <form method="POST" action="./acoes/publicar_action.php">
                    <!-- AREA DO TEXTO DA PUBLICAÇÃO -->
                    <textarea class="w3-border w3-padding" type="text" placeholder="O que você está pensando?" name="publish" rows="3" required></textarea>
                    <!-- AREA PRO LINK DA IMAGEM DA PUBLICACAO CASO HOUVER -->
                    <input class="w3-border w3-padding" type="text" placeholder="O que você quer mostrar? (URL)" name="image">
                    <button type="submit" class="w3-button w3-theme w3-hover-red"><i class="fa fa-pencil"></i> Publicar</button> 
                </form>
           </div>
        </div>
    </div>
</div>