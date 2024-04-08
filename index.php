<?php
const API_URL = "https://whenisthenextmcufilm.com/api";
//* 1ro lo inicializamos
// * Inicializar una nueva sesión de cURL ; ch = cURL handle
$ch = curl_init(API_URL);
// * Indicar k queremos el resultado de la petición y
// * no mostrarla en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
/*
* Ejecutar la petición
! y guardar el resultado
*/
$result  = curl_exec($ch);
//* una alternativa sería utilizar file_get_contents
//* $result = file_get_contents(API_URL); //only get de una API
// con funciona de 1 tendria el resultado mucho más facil pero con curl puedes hacer :get,put,etc. Ver mucho más facil tambien los estatus code

$data  = json_decode($result, true);
//* le damos true k en vez de k nos lo de en un string, mejor un ARRAY ASOCIATIVO
curl_close($ch);
// cerramos curl xk muchas veces PHP deja las cosas abiertas y tal
// var_dump($data);

?>

<head>
  <meta charset="UTF-8">
  <title>La próxima película de Marvel</title>
  <meta name="description" content="La próxima película de Marvel">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Centered viewport -->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
  />
</head>

<main>
  <section>
    <img src="<?= $data["poster_url"]; ?>" alt="Poster de <?= $data["title"]; ?>" width="200" style="border-radius: 16px">
  </section>
  <hgroup>
    <h3> <?= $data["title"]; ?> se estrena en <?= $data["days_until"]; ?> días</h3>
    <p>Fecha de estreno:  <?= $data["release_date"]; ?></p>
    <p>La siguiente es:  <?= $data["following_production"]["title"]; ?></p>
  </hgroup>
  <!-- <h2>La próxima película de Marvel</h2> -->
</main>

<style>
  :root {
    color-scheme: light dark;
    font-family: Calibri;
  }
  body {
    display: grid;
    place-content: center;
  }
  section{
    display: flex;
    justify-content: center;
    text-align: center;
  }
  hgroup{
    display: flex;
    flex-direction: column;
    justify-content: center;
    text-align: center;
  }
  img{
    margin: 0 auto;
  }
</style>
