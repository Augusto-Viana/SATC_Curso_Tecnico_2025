// Atribui uma função ao form. Para botões, trocar o "submit" por 'click".
document.getElementById("search-form").addEventListener("submit", function(event){
    event.preventDefault();

    // Pega o que foi digitado na tela
    const form = event.target;
    const pokemonName = form.elements['pokemon_name'].value;

    // Busca os campos que vão ser alterados
    const pokemonImage = document.getElementById('pokemon-image');
    const pokemonNameElement = document.getElementById('pokemon-name');
    const pokemonIdElement = document.getElementById('pokemon-id');
    const pokemonTypeElement = document.getElementById('pokemon-type');
    const pokemonDescriptionElement = document.getElementById('pokemon-description');

    pokemonImage.src = "https://i.ytimg.com/vi/6-Ekj41gMII/hqdefault.jpg";
    pokemonNameElement.textContent = "";
    pokemonIdElement.textContent = "";
    pokemonTypeElement.textContent = "";
    pokemonDescriptionElement.textContent = "";

    // Conecta ao PHP, mandando a variável pokemonName. Dentro do PHP, essa variável vai ser usada como pokemon_name
    fetch(`buscar.php?pokemon_name=${pokemonName}`)
                    .then(response => response.json())
                    .then(data => {
                        // Vai entrar aqui se der certo a comunicação 
                        pokemonImage.src = data.image;
                        pokemonNameElement.textContent = data.name;
                        pokemonIdElement.textContent = data.id;
                        pokemonTypeElement.textContent = data.type;
                        pokemonDescriptionElement.textContent = data.description;
                    })
                    .catch(error => {
                        // Vai entrar aqui se der errado a comunicação 
                        console.log(error);
                    });
 
});