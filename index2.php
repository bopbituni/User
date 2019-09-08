<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    input[type="text"], input[type=number] {
        width: 250px;
        padding: 12px 10px 12px 10px;
        border-radius: 30px;
        border: 1px solid black;
    }

    #submit {
        padding: 10px 32px;
        border-radius: 25px;
        border: 1px solid black;
    }

    form {
        width: 500px;
        margin: auto;
    }

    fieldset {
        border-radius: 20px;
    }

    #submit {
        padding: 12px 28px;
        background: green;
        border-radius: 20px;
    }

</style>
<body>


<form method="post">
    <h1 align="center">Registration Form</h1>
    <fieldset>
        <legend><h3>Details</h3></legend>
        <table>

            <tr>
                <td><h3>Name:</h3></td>
                <td> <input type="text" name="name"></td>
            </tr>
            <tr>
                <td><h3>Age:</h3></td>
                <td> <input type="number" name="age"></td>
            </tr>
            <tr>
                <td><h3>Phone:</h3></td>
                <td> <input type="number" name="phone"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" id="submit" value="Register"></td>
            </tr>


        </table>
    </fieldset>
</form>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once 'Json.php';
    if (!empty($_POST["name"]) && !empty($_POST["age"] && !empty($_POST["phone"]))) {
        $name = $_POST["name"];
        $age = $_POST["age"];
        $phone = $_POST["phone"];

        $json = new Json("data.json");
        $json->readDatatoJson();
        $customer =
            [
                "name" => $name,
                "age" => $age,
                "phone" => $phone
            ];

        $json->addCustomers($customer);
        if ($age > 0 && $age < 100 && $phone > 1000000000 && $phone < 100000000000) {
            if ($json->saveFiletoJson()) { ?>
                <span style="color: red"><h2 align="center">Nhập thông tin thành công</h2></span>

            <?php } else { ?>
            <?php }
        } else { ?>
            <span style="color: red"><h2 align="center">Không được để trống</h2></span>
            <?php
        }
    } else { ?>
        <span style="color: red"><h2 align="center">Thất bại</h2></span><?php
    }
}

?>

<a href="test.php"><input type="submit" id="submit" value="ShowInfo"></a>


<a style="border-radius: 20px; padding: 12px 28px; background: blue;font-size: 18px" href="index.php">Menu</a>
</body>
</html>
