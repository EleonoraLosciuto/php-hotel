<?php

$hotels = [

  [
    'name' => 'Hotel Belvedere',
    'description' => 'Hotel Belvedere Descrizione',
    'parking' => true,
    'vote' => 4,
    'distance_to_center' => 10.4
  ],
  [
    'name' => 'Hotel Futuro',
    'description' => 'Hotel Futuro Descrizione',
    'parking' => true,
    'vote' => 2,
    'distance_to_center' => 2
  ],
  [
    'name' => 'Hotel Rivamare',
    'description' => 'Hotel Rivamare Descrizione',
    'parking' => false,
    'vote' => 1,
    'distance_to_center' => 1
  ],
  [
    'name' => 'Hotel Bellavista',
    'description' => 'Hotel Bellavista Descrizione',
    'parking' => false,
    'vote' => 5,
    'distance_to_center' => 5.5
  ],
  [
    'name' => 'Hotel Milano',
    'description' => 'Hotel Milano Descrizione',
    'parking' => true,
    'vote' => 2,
    'distance_to_center' => 50
  ],

];

// variable parking_requested to skip iterations in loop
$parking_requested = false;

if (isset($_GET['parking']) && $_GET['parking'] == 'on')
  {
    $parking_requested = true;
  }

  // variable vote_filter_active to skip iterations in loop
$vote_filter_active = false;

if (isset($_GET['vote']) && ($_GET['vote'] > 0) && ($_GET['vote'] <= 5)) {
  $vote_filter_active = true;
  $vote_filter = (int)$_GET['vote']; // I set vote_filter varible to filter results
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe" crossorigin="anonymous">
    <script defer type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL" crossorigin="anonymous"></script>
</head>

<body>

<h1>I Nostri Hotel </h1>
<hr class="mt-1 mb-5">

<!-- Aggiungere un form ad inizio pagina che tramite una richiesta GET permetta di filtrare gli hotel che hanno un parcheggio. -->
<!-- 
Aggiungere un secondo campo al form che permetta di filtrare gli hotel per voto (es. inserisco 3 ed ottengo tutti gli hotel che hanno un voto di tre stelle o superiore) -->

<h3 class="mb-5">Filtra gli hotel desiderati</h3>
<form method="GET" action="">
    <div class="d-flex">
      <div class="form-control">
        <input type="checkbox" name="parking" id="parking">
        <label for="parking" class="ml-5">Parcheggio</label>
      </div>
      <div class="form-control">
        <label for="vote">Voto minimo:</label>
        <input type="number" name="vote" id="vote" min="1" max="5">
      </div>
    </div>

  <button type="submit" class="mt-5">Filtra</button>
</form>

<hr class="mt-1 mb-5">

<!-- Stampare una tabella con tutti gli hotel e i relativi dati disponibili. -->

<table class="table table-striped table-hover">
  <thead>
    <?php
     
    foreach ($hotels[0] as $key => $value) {
            echo "<th scope='col' class='text-uppercase'>$key</th>";
        }

    ?>
  </thead>
  <tbody>

      <?php

       foreach ($hotels as $hotel) {

       if ($parking_requested) {
        if(!$hotel['parking']) {
          continue;
        };
       }


       if ($vote_filter_active) {
        if($hotel['vote'] < $vote_filter){
          continue;
        };
       }



      ?>

         <tr>
          <td><?php echo $hotel['name'] ?></td>
          <td><?php echo $hotel['description'] ?></td>
          <td><?php 
          echo $hotel['parking'] ?
          "vero"
          : "falso";
          ?>
          </td>
          <td><?php echo $hotel['vote']?></td>
          <td><?php echo $hotel['distance_to_center']?></td>
        </tr>

       <?php

       }

      ?>
  </tbody>
</table>
    
</body>
</html>