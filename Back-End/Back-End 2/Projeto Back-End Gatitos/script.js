document.getElementById("cat-button").addEventListener("click", () => {
    fetch("search.php")
    .then(awnser => awnser.json())
    .then(data => {
        document.getElementById("cat-image").src = data.url;
    })
    .catch(error => console.error("Erro ao tentar buscar a imagem do gato: ", error));
})