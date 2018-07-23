<meta charset='utf-8'>
<?php
//http://www.coinwarz.com/v1/api/profitability/?apikey=7e978013066f429584b7b98ac73b691d&algo=all
//http://www.coinwarz.com/v1/api/profitability/?apikey=d20cbef2d88b47808d7701c6d22e859c&algo=all
$file = 'last_update.php';
$lu = file_get_contents($file);
if (date('gj')!=$lu){
    $json_update = file_get_contents('https://whattomine.com/coins.json');
    $fp = fopen('json_test.json', 'w');
    fwrite($fp, $json_update);
    fclose($fp);
    file_put_contents($file, date('gj'));
}
?>
