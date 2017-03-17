<?php
    $text = $_POST["text"];
    $array = explode(" ", $text);
    $count = count($array);
    $frequencies = array();

    for ($i = 0; $i < $count; $i++) {
        if (array_key_exists($array[$i], $frequencies)) {
            $frequencies[$array[$i]]++;
        } else {
            $frequencies[$array[$i]] = 1;
        }
    }

    $count = count($frequencies);
    foreach($frequencies as $key => $value) {
        echo "{$key} used {$value} time(s);<br/>\n";
    }
?>