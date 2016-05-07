<?php
header("Content-Type: application/json; charset=utf-8");

$t = new DateTime();
$data = file("http://linkdata.org/api/1/rdf1s1955i/soba_tsv.txt", FILE_IGNORE_NEW_LINES);
$json = array();
foreach ($data as $line) {
    if ( !preg_match('/^#/', $line) ) {
        $a = explode("\t", $line);
        $json[$a[0]] = array (
            'id'      => $a[0], // ID
            'name'    => $a[1], // 名称
            'address' => $a[3], // 住所
            'closed'  => $a[5], // 定休日
            'open'    => $a[6], // 営業時間
            'lat'     => $a[15], // 緯度
            'lng'     => $a[16]    // 経度
        );
    }
}

echo sprintf("soba(%s)",json_encode($json));
exit;
?>