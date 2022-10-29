<?php
    require("../resources/php/head.php");
?>

<?php
    $charmeleon = new Charmeleon("Char");
    $pikachu = new Pikachu("Pika");


    $pikachu->battle($pikachu->attacks[0],$charmeleon);
    $charmeleon->battle($charmeleon->attacks[1],$pikachu);

    echo(Pokemon::getPopulation());
?>
