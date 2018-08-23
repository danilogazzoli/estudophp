<html>
 <head>
  <title>Exercicio 01</title>
 </head>
 <body>
    <?php

    include_once('exercicio01class.php');

    ob_start();
    phpinfo();
    $phpinfoAsString = ob_get_contents();
    ob_get_clean();

    //echo $phpinfoAsString

    $phpInfo = new gazzoli\PHPInfo\PHPInfoParser();

    $arr = $phpInfo->parse_phpinfo(); // Muito avançado
  
    # Inicie por algo mais simples como 
    # https://secure.php.net/manual/en/control-structures.foreach.php

    # Tal como fez abaixo... 
    # Só que o array seria um array de valores
    # E não o resultado desta classe
    echo '<ol>'; // Dica: https://stackoverflow.com/questions/1222244/loop-through-get-results
  
    # Itere $_SERVER ao onvés de $arr
    # Mas a dica é que a sintaxe do foreach muda...
    foreach ($arr as &$value) {
      echo $value;
      //echo "<li>"$value"</li>"
    }
    echo "</ol>";
    ?>

</body>
</html>
