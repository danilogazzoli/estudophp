<?php
  phpinfo();
  echo '-------------------';
  echo($_SERVER['USER']);
  echo '-------------------';
  echo $XXX; // Só não foi declarada antes
  echo $XXX; // Neste caso o PHP vai reclamar ao interpretar
  echo $SERVER_PROTOCOL."<br>";
  //print_r($_SERVER)

?>
