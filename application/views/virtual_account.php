<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <div id="container">
        <h1>Virtual Account</h1>

        <div id="body">
            <form action="virtualaccount/submit" method="post">

                <p>Input External ID: <input type="text" id="external_id" name="external_id"></p>
                <p>
                    Select Bank:
                    <select name="bank_code" id="bank_code">
                        <option value="mandiri">mandiri</option>
                        <option value="bni">bni</option>
                        <option value="bri">bri</option>
                    </select>
                </p>
                <p>input VA Name: <input type="text" id="name" name="name"></p>

                <input type="submit" value="submit">

            </form>
        </div>
    </div>

</body>
</html>
