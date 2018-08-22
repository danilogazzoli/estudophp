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

    $arr = $phpInfo->parse_phpinfo();

    echo '<ol>';
    foreach ($arr as &$value) {
      echo $value;
      //echo "<li>"$value"</li>"
    }
    echo "</ol>";

    ?>

</body>
</html>