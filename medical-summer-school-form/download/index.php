<?php try {
    require_once(dirname(__FILE__) . "../../../../../../shared_library/classes/applications/Medicine_Summer_School/MedicineSummerSchool.php");
    $medicine = new \UoSApplication\MedicineSummerSchool();
    $medicine->generateCsvExport();
    
} catch(\Exception $ex){
    echo $ex->getMessage();
} ?>