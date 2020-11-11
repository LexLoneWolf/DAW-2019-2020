<?php 

    const FIL = 6;
    const COL = 9;

    $numAleat = 0;
    $numIntrod = [];
    $numeros = [[]];

    for ($i=0; $i < FIL; $i++) { 
        for ($j=0; $j < COL; $j++) { 
            $numAleat = rand(100,999);
            while (in_array($numAleat,$numIntrod)) {
                $numAleat = rand(100,900);
            }
            $numIntrod[] = $numAleat;
            $numeros[$i][$j] = $numAleat;
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <?php for ($i=0; $i < FIL; $i++) { ?>
            <tr>
                <?php for($j=0; $j < COL; $j++) {?>
                    <td><?= $numeros[$i][$j] ?></td>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>
</body>
</html>