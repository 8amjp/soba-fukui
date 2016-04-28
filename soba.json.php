<?php
header("Content-Type: application/json; charset=utf-8");

$t = new DateTime();
$lines = file('./soba_tsv.txt', FILE_IGNORE_NEW_LINES);
$json = array();
foreach ($lines as $line) {
  if ( !preg_match('/^#/', $line) ) {
    $a = explode("\t", $line);
//#property    店舗名    郵便番号    住所    電話番号    定休日    営業時間    営業時間の備考    おすすめ1    おすすめ1（価格）    おすすめ2    おすすめ2（価格）    おすすめ3    おすすめ3（価格）    店主のひとこと    緯度    経度
    $json[$a[0]] = array (
      'id'             => $a[0], // ID
      'name'           => $a[1], // 名称
      'address'        => $a[3], // 住所
      'closed'         => $a[5], // 定休日
      'open'           => $a[6], // 営業時間
      'lat'            => $a[15], // 緯度
      'lng'            => $a[16]  // 経度
    );
  }
}

echo sprintf("soba(%s)",json_encode($json));
exit;
?>