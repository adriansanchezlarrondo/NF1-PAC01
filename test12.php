<?php
    require("class.pdofactory.php");

    print "Running...<br />";

    $strDSN = "pgsql:dbname=usuaris;host=localhost;port=5432";
    $objPDO = PDOFactory::GetPDO($strDSN, "postgres", "root", array());
    $objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    try {
        // begin the transaction
        
        $strQuery1 = "INSERT INTO city (id, city, country_id, last_update) VALUES (DEFAULT, 'Stavanger', 4006, '2024-02-03')";
        $strQuery2 = "INSERT INTO city (id, city, country_id, last_update) VALUES ('Stavanger', '4006', '2024-02-03')";
        
        $objPDO->beginTransaction();
        
        $objPDO->exec($strQuery1);
        $objPDO->exec($strQuery2);
        
        // commit the transaction
        $objPDO->commit();
            
    } catch (Exception $e) {
        // rollback the transaction
        $objPDO->rollBack();
        echo "Failed: ".$e->getMessage();
    }
