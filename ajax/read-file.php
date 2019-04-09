<?php
    $hasHeader = true;
    if (($handle = fopen("test.csv", "r")) !== FALSE) {
        $row = 0;
        while (($data = fgetcsv($handle, 0, ";")) !== FALSE) {
            if ($hasHeader === true && $row === 0) {
                $row++;
                continue;
            }
            $num = count($data);
            var_dump($data[0], $data[1], $data[2]);
            echo "<hr>";
            $row++;
        }
        fclose($handle);
    }