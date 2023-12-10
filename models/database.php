<?php
    function openDatabase()
        {
            return mysqli_connect("127.0.0.1:3306", "root", "", "proyecto_ambiente");
        }

    function closeDatabase($database)
        {
            mysqli_close($database);
        }

    function executeQuery($sql)
        {
            $database = openDatabase();
            $recordset = mysqli_query($database, $sql);
            closeDatabase($database);

            return $recordset;
        }
?>