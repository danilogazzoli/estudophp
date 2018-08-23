<?php
 /* Uso muito avançado no entanto recorrer a documentação 
 necessária para compreender este código pode ser uma boa ideia */

namespace gazzoli\PHPInfo;

class PHPInfoParser
{
public function parse_phpinfo() {
    ob_start(); phpinfo(INFO_MODULES); $s = ob_get_contents(); ob_end_clean();
    $s = strip_tags($s, '<h2><th><td>');
    $s = preg_replace('/<th[^>]*>([^<]+)<\/th>/', '<info>\1</info>', $s);
    $s = preg_replace('/<td[^>]*>([^<]+)<\/td>/', '<info>\1</info>', $s);
    $t = preg_split('/(<h2[^>]*>[^<]+<\/h2>)/', $s, -1, PREG_SPLIT_DELIM_CAPTURE);
    $r = array(); $count = count($t);
    $p1 = '<info>([^<]+)<\/info>';
    $p2 = '/'.$p1.'\s*'.$p1.'\s*'.$p1.'/';
    $p3 = '/'.$p1.'\s*'.$p1.'/';
    for ($i = 1; $i < $count; $i++) {
        if (preg_match('/<h2[^>]*>([^<]+)<\/h2>/', $t[$i], $matchs)) {
            $name = trim($matchs[1]);
            $vals = explode("\n", $t[$i + 1]);
            foreach ($vals AS $val) {
                if (preg_match($p2, $val, $matchs)) { // 3cols
                    $r[$name][trim($matchs[1])] = array(trim($matchs[2]), trim($matchs[3]));
                } elseif (preg_match($p3, $val, $matchs)) { // 2cols
                    $r[$name][trim($matchs[1])] = trim($matchs[2]);
                }
            }
        }
    }
    return $r;
}

}

?>
