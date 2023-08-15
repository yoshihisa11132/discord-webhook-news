<?php
$CURLERR = NULL;

    $data = array(
        'content' => $_POST["content"] . " by " . $_POST["name"],
    );

    $url = 'ここにURL';

    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_POST, TRUE);                            //POSTで送信
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));    //データをセット
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);                    //受け取ったデータを変数に
    $html = curl_exec($ch);

    if(curl_errno($ch)){        //curlでエラー発生
        $CURLERR .= 'curl_errno：' . curl_errno($ch) . "\n";
        $CURLERR .= 'curl_error：' . curl_error($ch) . "\n";
        $CURLERR .= '▼curl_getinfo' . "\n";
        foreach(curl_getinfo($ch) as $key => $val){
            $CURLERR .= '■' . $key . '：' . $val . "\n";
        }
        echo nl2br($CURLERR);
    }
    curl_close($ch);
    echo 送信しました。;
?>
