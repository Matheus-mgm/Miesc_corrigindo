	window.onload = function() {
    // Função para carregar as fotos existentes do banco de dados e exibi-las na página
    function carregarFotos() {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var fotos = JSON.parse(xhr.responseText);
                var fotosDiv = document.getElementById("fotos");
                fotosDiv.innerHTML = "";

                fotos.forEach(function(foto) {
                    var img = document.createElement("img");
                    img.src = "/Site mercury home e about/events/php/sarau e paulo freire/Paulo Freire/postagens/" + foto.nome_arquivo; // Certifique-se de que o caminho esteja correto
                    img.alt = foto.nome_arquivo;
                    fotosDiv.appendChild(img);
                });
            }
        };

        xhr.open("GET", "carregar_fotos.php", true); // Certifique-se de que o caminho esteja correto
        xhr.send();
    }

    carregarFotos();
};