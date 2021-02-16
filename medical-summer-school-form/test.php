<html>
<head>
	<title>Test Form</title>
</head>
<body>
    
<?php 
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            require_once(dirname(__FILE__) . "../../../../../../shared_library/classes/applications/Medicine_Summer_School/MedicineSummerSchool.php");                        
            $medicine = new \UoSApplication\MedicineSummerSchool();
            $insertedID = $medicine->addResponse($_POST);
            print("<h1>Success</h1><p><strong style=\"color: red;\">Record {$insertedID} has been saved.</strong></p>");
            
        } catch (Exception $e) {
            print("<h1>Error</h1><p>{$e->getMessage()}</p></h1>");
        } 
    }
?>

<form name="test" action="test.php" method="post">
    <p>firstname: <input type="text" name="firstname" value="Test" /></p>
    <p>lastname: <input type="text" name="lastname" value="Response" /></p>
    <p>address1: <input type="text" name="address1" value="Address line 1" /></p>
    <p>address2: <input type="text" name="address2" value="Address line 2" /></p>
    <p>address3: <input type="text" name="address3" value="Address line 3" /></p>
    <p>county: <input type="text" name="county" value="County" /></p>
    <p>postcode: <input type="text" name="postcode" value="SR6 0DD" /></p>
    <p>dob: <input type="text" name="dob" value="31/01/1990" /></p>
    <p>mobile: <input type="text" name="mobile" value="07123456789" /></p>
    <p>email: <input type="text" name="email" value="random.email@address.com" /></p>
    <p>ethnic_origin: <input type="text" name="ethnic_origin" value="Prefer not to say" /></p>
    <p>disabilities: <input type="text" name="disabilities" value="Mental health condition,Cognitive impairment,Deaf or serious hearing impairment" /></p>
    <p>disability_support: <input type="text" name="disability_support" value="Disability support requirements." /></p>
    <p>dietary_req: <input type="text" name="dietary_req" value="Dietary requirements." /></p>
    <p>kin_name: <input type="text" name="kin_name" value="Next of kin name" /></p>
    <p>kin_relation: <input type="text" name="kin_relation" value="Next of kin relationship" /></p>
    <p>kin_phone: <input type="text" name="kin_phone" value="Next of kin phone number" /></p>
    <p>current_school: <input type="text" name="current_school" value="Current school" /></p>
    <p>school_obtained_gcse: <input type="text" name="school_obtained_gcse" value="GCSEs school" /></p>
    <p>studying_alevel: <input type="text" name="studying_alevel" value="Yes" /></p>
    <p>alevel_subjects: <input type="text" name="alevel_subjects" value="A Level subjects: Maths, English, Chemistry" /></p>
    <p>non_alevel_subjects: <input type="text" name="non_alevel_subjects" value="Non A Level subjects." /></p>
    <p>gcse1: <input type="text" name="gcse1" value="GCSE 1" /></p>
    <p>gcse_grade1: <input type="text" name="gcse_grade1" value="A" /></p>
    <p>gcse2: <input type="text" name="gcse2" value="GCSE 2" /></p>
    <p>gcse_grade2: <input type="text" name="gcse_grade2" value="B" /></p>
    <p>gcse3: <input type="text" name="gcse3" value="GCSE 3" /></p>
    <p>gcse_grade3: <input type="text" name="gcse_grade3" value="C" /></p>
    <p>gcse4: <input type="text" name="gcse4" value="GCSE 4" /></p>
    <p>gcse_grade4: <input type="text" name="gcse_grade4" value="D" /></p>
    <p>gcse5: <input type="text" name="gcse5" value="GCSE 5" /></p>
    <p>gcse_grade5: <input type="text" name="gcse_grade5" value="E" /></p>
    <p>gcse6: <input type="text" name="gcse6" value="GCSE 6" /></p>
    <p>gcse_grade6: <input type="text" name="gcse_grade6" value="F" /></p>
    <p>gcse7: <input type="text" name="gcse7" value="GCSE 7" /></p>
    <p>gcse_grade7: <input type="text" name="gcse_grade7" value="G" /></p>
    <p>gcse8: <input type="text" name="gcse8" value="GCSE 8" /></p>
    <p>gcse_grade8: <input type="text" name="gcse_grade8" value="H" /></p>
    <p>gcse9: <input type="text" name="gcse9" value="GCSE 9" /></p>
    <p>gcse_grade9: <input type="text" name="gcse_grade9" value="I" /></p>
    <p>gcse10: <input type="text" name="gcse10" value="GCSE 10" /></p>
    <p>gcse_grade10: <input type="text" name="gcse_grade10" value="J" /></p>
    <p>gcse11: <input type="text" name="gcse11" value="GCSE 11" /></p>
    <p>gcse_grade11: <input type="text" name="gcse_grade11" value="K" /></p>
    <p>gcse12: <input type="text" name="gcse12" value="GCSE 12" /></p>
    <p>gcse_grade12: <input type="text" name="gcse_grade12" value="L" /></p>
    <p>gcse13: <input type="text" name="gcse13" value="GCSE 13" /></p>
    <p>gcse_grade13: <input type="text" name="gcse_grade13" value="M" /></p>
    <p>gcse_resit: <input type="text" name="gcse_resit" value="No" /></p>
    <p>gcse_resit_subjects: <input type="text" name="gcse_resit_subjects" value="Not resitting GCSEs." /></p>
    <p>further_info: <input type="text" name="further_info" value="You have been in the care of a local authority,Either/both of your parents are/have been in the military,You are an estranged student" /></p>
    <p>annual_income: <input type="text" name="annual_income" value="£25,001 to £42,875" /></p>
    <p>parents_level_studied: <input type="text" name="parents_level_studied" value="DipHE, HND or equivalent (Level 5)" /></p>
    <p>dec_photograpy_consent: <input type="text" name="dec_photograpy_consent" value="Yes" /></p>
    <p>optin_email: <input type="text" name="optin_email" value="Yes" /></p>
    <p>optin_post: <input type="text" name="optin_post" value="Yes" /></p>
    <p><input type="submit" name="save" value="Save" /></p>
</form>

</body>
</html>