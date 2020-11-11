<?php 
    $tam = $_GET["tam"];

    $vocales = ["A","E","I","O","U"];
    $consonantes = ["B","C","D","F","G","H","J","K","L","M","N","P","Q","R","S","T","V","X","Y","Z"];
    $sopa = [];
    for ($i=0; $i < $tam; $i++) { 
        for ($j=0; $j < $tam; $j++) { 
            if (($i % 2 == 0 && $j %2 == 0) || ($i % 2 != 0 && $j % 2 != 0)) {
                $sopa[$i][$j] = $vocales[mt_rand(0,count($vocales)-1)];
            } else {
                $sopa[$i][$j] = $consonantes[mt_rand(0, count($consonantes)-1)];
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sopaLetras</title>
</head>
<body>
    <table>
        <?php 
        for ($i=0; $i < $tam; $i++) { ?>
            <tr>
                <?php 
                for ($j=0; $j < $tam; $j++) { ?>
                    <td><?= $sopa[$i][$j] ?></td>
                <?php 
                } ?>
            </tr>
    <?php
        } ?>
    </table>
</body>
</html>