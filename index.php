<?php

$string = (@$_POST["name"]);

function strigToBinary($string)
{
    $characters = str_split($string); //splita oq foi digitado em um array
    // var_dump($characters);
 
    $binary = [];
    foreach ($characters as $character) {
        $data = unpack('H*', $character);
        // var_dump($data);
        $binary[] = base_convert($data[1], 16, 2); // convert for base 16bits
        // var_dump(json_encode($binary));
    }
 
    return implode(' ', $binary);    
}
 
function binaryToString($binary)
{
    $binaries = explode(' ', $binary);
 
    $string = null;
    foreach ($binaries as $binary) {
        $string .= pack('H*', dechex(bindec($binary)));
    }
 
    return $string;    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>String Numeric for Binario</title>

    <style>
        body{
            background-color: #444444;
            color: #fff;
        }
    </style>

</head>
<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
    VALUE: <input type="text" name="name" value="<?php echo $string;?>">
    <button type="submit">CONVERT</button>
</form>

</body>
</html>


<?php
echo '<br>Entered Value: '.$string.PHP_EOL; //transforma string em binario
echo '<br><br>Transform string to BINARY: '.$binary = strigToBinary($string).PHP_EOL; //transforma string em binario
echo '<br><br>Transform binary for STRING: '.binaryToString($binary).PHP_EOL; //transforma binario para string
?>