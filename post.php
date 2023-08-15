<?php
$CURLERR = NULL;

    $data = array(
        'content' => $_POST["content"] . " by " . $_POST["name"],
    );

    $url = 'https://discord.com/api/webhooks/1131585974044991598/e0o80xlvJgWyU--MEo18MFNm74PaC5CFLc_vNaPe2hxVOrG1THE45tHdTwEXkgc-ke9b';
    $url = 'https://discord.com/api/webhooks/1132441094848782417/GrLGyge0Q7d1UZpP20s106wFjru2BcG3r7mlN9GrRK9FwVsM8j-_EbI5CwAZtEQXK-za';

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
