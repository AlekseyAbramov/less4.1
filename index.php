<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <style>
            table { 
                border-spacing: 0;
                border-collapse: collapse;
            }

            table td, table th {
                border: 1px solid #ccc;
                padding: 5px;
            }

            table th {
                background: #eee;
            }
            
            form {
                margin-bottom: 10px;
            }
        </style>
        <h1>Библиотека успешного человека</h1>
        <form method="GET">
            <input type="text" name="isbn" placeholder="ISBN" value="" />
            <input type="text" name="name" placeholder="Название книги" value="" />
            <input type="text" name="author" placeholder="Автор книги" value="" />
            <input type="submit" value="Поиск" />
        </form>

        <table>
            <tr>
                <th>Название</th>
                <th>Автор</th>
                <th>Год выпуска</th>
                <th>Жанр</th>
                <th>ISBN</th>
            </tr>
        <?php
        $pdo = new PDO("mysql:host=localhost;dbname=global", "aabramov", "neto1499");
        $char = "SET names 'utf8'";
        $pdo->query($char);
        if (!empty($_GET) && ($_GET["author"] || $_GET["isbn"] || $_GET["name"])){
            if ($_GET["author"]) {
                $sql = "SELECT * FROM `books` WHERE author LIKE \"%". $_GET["author"]."%\"";
            }
            if ($_GET["isbn"]) {
                $sql = "SELECT * FROM `books` WHERE isbn LIKE \"%". $_GET["isbn"]."%\"";
            }
            if ($_GET["name"]){
                $sql = "SELECT * FROM `books` WHERE name LIKE \"%". $_GET["name"]."%\"";
            }
        } else {
            $sql = "SELECT * FROM `books`";
        }
        foreach ($pdo->query($sql) as $row) {
            echo "<tr><td>". $row['name'] . "</td>";
            echo "<td>". $row['author'] . "</td>";
            echo "<td>". $row['year'] . "</td>";
            echo "<td>". $row['genre'] . "</td>";
            echo "<td>". $row['isbn'] . "</td></tr>";
        }
        ?>
        </table>
    </body>
</html>
