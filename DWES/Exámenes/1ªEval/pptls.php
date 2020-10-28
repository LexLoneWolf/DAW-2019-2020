<?php 

    $jugadaPlayer = $_GET["jugadaPlayer"];
    $opciones = [
        'piedra',
        'papel',
        'tijera',
        'lagarto',
        'spock'
    ];
    $resultado = "";

    if (in_array($jugadaPlayer, $opciones)) {
        $jugadaPC = $opciones[mt_rand(0,count($opciones)-1)];

        if ($jugadaPlayer == "piedra" && ($jugadaPC == "lagarto" || $jugadaPC == "tijera")) {
            $resultado = "El jugador gana";
        } else if ($jugadaPlayer == "papel" && ($jugadaPC == "piedra" || $jugadaPC == "spock")) {
            $resultado = "El jugador gana";
        } else if ($jugadaPlayer == "tijera" && ($jugadaPC == "lagarto" || $jugadaPC == "papel")) {
            $resultado = "El jugador gana";
        } else if ($jugadaPlayer == "lagarto" && ($jugadaPC == "papel" || $jugadaPC == "spock")) {
            $resultado = "El jugador gana";
        } else if ($jugadaPlayer == "spock" && ($jugadaPC == "tijera" || $jugadaPC == "piedra")) {
            $resultado = "El jugador gana";
        } else if ($jugadaPlayer == $jugadaPC) {
            $resultado = "Empate";
        } else {
            $resultado = "Gana el PC";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pptls</title>
</head>
<body>
    <p>Opción del jugador: <?= $jugadaPlayer ?> | Opción del PC <?= $jugadaPC ?></p>
    <p><?= $resultado ?></p>
</body>
</html>