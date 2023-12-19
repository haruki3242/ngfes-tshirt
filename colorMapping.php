<?php
//カラーとカラーコードの対応をまとめています
//これを変更するとreserve.php以外対応が変更されます
//reserve.phpだけは手作業で変更してください
$colorMapping = array(
    'a' => 'ホワイト',
    'b' => 'ベビーピンク',
    'c' => 'ライトブルー',
    'd' => 'ロイヤルブルー',
    'e' => 'ブラック',
    //'f' => ''
    //カラーを追加する場合「'e' => 'ブラック'」を「'e' => 'ブラック',」に「//'f' => ''」を「'f' => ''」にする！
);

//管理者ページ（集計）で使います
//$sizesOrderは、あるサイズを並べる配列です
$sizesOrder = array('S', 'M', 'L', 'XL', 'XXL');
//$colorsOrderは上の$colorMappingで使うアルファベットを並べる配列です
$colorsOrder = array('a', 'b', 'c', 'd', 'e');
?>
