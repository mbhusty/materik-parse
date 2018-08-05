<?php
/* url для парсинга
https://petrovich.ru/catalog/1447/106958/
http://spbstroy.ru/catalog/suhie_stroitel_nye_smesi_i_grunty/knauf/knauf_smesi_gipsovye/shtukaturka_knauf_rotband_30_0_kg_40_sht_na_poddone
https://www.maxidom.ru/catalog/shtukaturka-gipsovaja/9011800178/
https://spb.leroymerlin.ru/product/shtukaturka-gipsovaya-knauf-rotband-10073940/
*/
require 'phpQuery-onefile.php';
header('Content-type: text/html; charset=utf-8');


$url_petrovich = 'https://petrovich.ru/catalog/1447/106958/';
$url_spbstroy = 'http://spbstroy.ru/catalog/suhie_stroitel_nye_smesi_i_grunty/knauf/knauf_smesi_gipsovye/shtukaturka_knauf_rotband_30_0_kg_40_sht_na_poddone';
$url_maxidom = 'https://www.maxidom.ru/catalog/shtukaturka-gipsovaja/9011800178/';
$url_leroymerlin = 'https://spb.leroymerlin.ru/product/shtukaturka-gipsovaya-knauf-rotband-10073940/';

$file_petrovich = file_get_contents($url_petrovich);
$file_spbstroy = file_get_contents($url_spbstroy);
$file_maxidom = file_get_contents($url_maxidom);
$file_leroymerlin = file_get_contents($url_leroymerlin);
/*
$pattern = '#<span class="goldPrice.+?</span>#s';


preg_match($pattern, $file, $matches);

print_r ($matches);
*/

//echo htmlspecialchars ($file);

$doc_petrovich = phpQuery::newDocument($file_petrovich);
$doc_spbstroy = phpQuery::newDocument($file_spbstroy);
$doc_maxidom = phpQuery::newDocument($file_maxidom);
$doc_leroymerlin = phpQuery::newDocument($file_leroymerlin);
//var_dump($doc);

$cls_petrovich = $doc_petrovich -> find('.retailPrice') -> text();
$cls_spbstroy = $doc_spbstroy -> find('.item_current_price') -> text();
$cls_maxidom = $doc_maxidom -> find('#once_item_price') -> text();
$cls_leroymerlin = $doc_leroymerlin -> find('.product__price') -> text();



/*
echo "Петрович: ".$cls;
echo "Снабстрой: ".$cls1;
echo "Максидом: ".$cls2;
echo "Леруа: ".$cls3;
*/

?>
<!DOCTYPE html>
<html>
<head>
	<title>Парсинг сайтов</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<table>
    <tr>
        <th>Магазин</th>
        <th>Цена</th>
    </tr>
    <tr>
        <td>Петрович</td>
        <td><?php echo $cls_petrovich;?></td>
    </tr>
    <tr>
        <td>Снабстрой</td>
        <td><?php echo $cls_spbstroy;?></td>
    </tr>
    <tr>
        <td>Максидом</td>
        <td><?php echo $cls_maxidom;?></td>
    </tr>
    <tr>
        <td>Леруа</td>
        <td><?php echo $cls_leroymerlin;?></td>
    </tr>
</table>

</body>
</html>
