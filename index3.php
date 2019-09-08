<?php
include "Json.php";

$json = new Json("data.json");
?>
<style>
    table, tr, th, td {
        width: 1000px;
        border: 3px solid royalblue;
        border-radius: 20px;
        font-size: 20px;
        margin: auto;
        background: bisque;
    }

    input {
        border: 3px solid royalblue;
        border-radius: 20px;
        font-size: 16px;
        padding: 12px 16px;
        background: red;
    }

</style>
<h1 align="center">Danh sách khách hàng</h1>
<table>
    <tr>
        <th>STT</th>
        <th>Name</th>
        <th>Age</th>
        <th>Phone</th>
    </tr>
    <?php


    $array = $json->readDatatoJson();

    foreach ($array as $key => $value) {

        ?>
        <tr align="center">
            <td><?php echo $key + 1; ?></td>
            <td><?php echo $value["name"] ?></td>
            <td><?php echo $value["age"] ?></td>
            <td><?php echo $value["phone"] ?>
                <form method="post"><input type="submit" name="xoa" value="Xóa"></form>
            </td>
        </tr>
        <?php

    }

    foreach ($array as $key => $value) {
        var_dump($key);
        if (isset($_POST["xoa"])) {
            $json->remoteCustomer($key);
        }
    }
    $json->saveFileToJson();

    ?>

</table>
<br>
<br>
<a style="border-radius: 20px; padding: 12px 28px; background: blue;font-size: 18px" href="index2.php">Back</a>
<a style="border-radius: 20px; padding: 12px 28px; background: blue;font-size: 18px" href="index.php">Menu</a>
<h3>Lưu ý : VUI LÒNG CLICK ĐÚP 2 LẦN ĐỂ XÓA!!</h3>