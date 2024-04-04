<?php

        require("class.pdofactory.php");
        print "Running...<br />";

        $strDSN = "pgsql:dbname=usuaris;host=localhost;port=5432";
        $objPDO = PDOFactory::GetPDO($strDSN, "postgres", "root", array());
        $objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        try {
                echo "<br>";
                $strQuery1 = "Select * from city where id=".$_GET["id"];
                echo $strQuery1;
                $stm = $objPDO->query($strQuery1);
                $mydata = $stm->fetch();
                echo "<br>Hola ".$mydata[1]."!";

        } catch (Exception $e) {
                echo "Failed: ".$e->getMessage();
        }
