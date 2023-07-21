const slider = ["pic1.jpg", "pic2.jpg", "pic3.jpg", "pic4.jpg"];
let numero = 0;


function ChangeSlide(sens) {
  numero = numero + sens;
  if (numero > 3)
      numero = 0;
  if (numero < 0)
      numero = 3;
  document.getElementById("slide").src = "slider/" + slider[numero];
}

setInterval("ChangeSlide(1)", 8000);

/*API*/
// URL de l'API
/*const apiUrl = 'https://api.deezer.com/version/service/id/method/?parameters';


// Fonction pour effectuer la requête GET à l'API
async function fetchArtists() {
  try {
    const response = await fetch(apiUrl);
    const data = await response.text();

    // Votre traitement des données ici (en fonction du format de la réponse)
    console.log(data);
  } catch (error) {
    console.error('Erreur lors de la requête :', error);
  }
}
/*API 2*/
// Appel de la fonction pour récupérer les artistes
/*fetchArtists();
const express = require('express');
const fetch = require('node-fetch');

const app = express();

// Fonction pour effectuer la requête GET à l'API Deezer
async function fetchArtists() {
  try {
    const apiUrl = 'https://api.deezer.com/version/service/id/method/?parameters';
    const response = await fetch(apiUrl);
    const data = await response.json();
    // Votre traitement des données ici (en fonction du format de la réponse)
    console.log(data);
  } catch (error) {
    console.error('Erreur lors de la requête :', error);
  }
}

// Appel de la fonction pour récupérer les artistes
fetchArtists();

// Endpoint pour la recherche d'artistes avec les paramètres donnés
app.get('/search/artist', async (req, res) => {
  try {
    const apiUrl = 'https://api.deezer.com/album/302127'; // Remplacez cet URL par l'URL de recherche réelle
    const response = await fetch(apiUrl);
    const data = await response.json();
    res.send(data);
  } catch (error) {
    console.error('Erreur lors de la requête :', error);
    res.status(500).send('Erreur lors de la requête à l\'API Deezer.');
  }
});

const port = 3000;
app.listen(port, () => {
  console.log(`Serveur en cours d'exécution sur http://localhost:${port}`);
});*/

fetch("https://api.deezer.com/album/302127")
      .then(reponse => reponse.json())
      .then(reponse => console.table(reponse2))
    

