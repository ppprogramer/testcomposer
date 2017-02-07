<?php

namespace App\Models;

/**
 * Article Model
 */
class Article
{
    public static function first()
    {
        $connection = mysqli_connect("localhost", "root", "root", 'ddos_v3');
        if (!$connection) {
            die('Could not connect: ' . mysqli_error());
        }
        $result = mysqli_query($connection, "SELECT * FROM wy_article limit 0,1");

        if ($row = mysqli_fetch_array($result)) {
            return $row;
        }
//        if ($row = mysqli_fetch_array($result)) {
//            echo '<h1>' . $row["title"] . '</h1>';
//            echo '<p>' . $row["content"] . '</p>';
//        }

        mysqli_close($connection);
    }
}