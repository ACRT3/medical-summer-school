<!DOCTYPE html>
<!--[if IE 8]> <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en" >
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>UoS website admin - Medicine Summer School 2020</title>
    <link rel="icon" type="image/ico" href="/images/favicon.ico"/>
    <link rel="stylesheet" href="/css/css2/foundation.css">
    <link href="/css/css2/foundation-icons.css" rel="stylesheet" type="text/css">
    <script src="/js/js2/vendor/custom.modernizr.js"></script>
    <!--[if lt IE 9]>
      <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
      <script src="//s3.amazonaws.com/nwapi/nwmatcher/nwmatcher-1.2.5-min.js"></script>
      <script src="//html5base.googlecode.com/svn-history/r38/trunk/js/selectivizr-1.0.3b.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.1.0/respond.min.js"></script>
    <![endif]-->
    
    <script type="text/javascript" src="/js/dynatable/vendor/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="/js/dynatable/jquery.dynatable.js"></script>

    <style>
        #adminIcon {margin-top:-5px;}
        .homeLogo {width:215px; height:100px; float:left;}
        .homeTitle {float:right; margin-top:39px;}
        .homeSubTitle {float:left; width:100%;}

        @media only screen and (max-width: 500px) {
            .homeLogo {width:100%; height:auto;}
            .homeTitle {float:left !important; margin-top:39px;}
        }
    </style>
</head>
<body>
<div class="row">
    <div class="large-12 columns">
        <img src="/images/uni-logo.png" class="homeLogo"><img src="/images/wwwadmin-logo.png" class="wwwadminlogo" style="float:right; height:100px; "><!-- <h2 class="homeTitle">UoS website admin</h2> -->
        <h3 class="homeSubTitle">Medicine Summer School 2020</h3>
        <hr />
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
        <ul class="breadcrumbs">
            <li><a href="/index.php">Home</a></li>
            <li><a href="../../">Form Data</a></li>
            <li><a href="../">Medicine Summer School 2020</a></li>
            <li class="current">View Response</li>
        </ul>
 
        <hr />
        
        <!-- START: Page content -->
        <div class="row">
            <div class="large-12 columns">
                <h3>View Response</h3>
<?php
// Grab the response ID 
$responseID = ((isset($_POST['id'])) ? filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT) : filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT));
              
// Include class file
require_once(dirname(__FILE__) . "../../../../../../shared_library/classes/applications/Medicine_Summer_School/MedicineSummerSchool.php");                        

try {
    // Initialise the class
    $medicine = new \UoSApplication\MedicineSummerSchool();
    
    // Retreive all responses
    $response = $medicine->getResponsebyID($responseID);
    
    if (count($response) > 0 ) { ?>
                <h4>Step 1: About You</h4>
                <table id="step1" width="100%">
                    <tr>
                        <th>First Name:</th><td><?php print($response['firstname']); ?></td>
                        <th>Address 1:</th><td><?php print($response['address1']); ?></td>
                    </tr>
                    <tr>
                        <th>Last Name:</th><td><?php print($response['lastname']); ?></td>
                        <th>Address 2:</th><td><?php print($response['address2']); ?></td>
                    </tr>
                    <tr>
                        <th>Date of Birth:</th><td><?php print($response['dob']); ?></td>
                        <th>Address 3:</th><td><?php print($response['address3']); ?></td>
                    </tr>
                    <tr>
                        <th>Mobile:</th><td><?php print($response['mobile']); ?></td>
                        <th>County:</th><td><?php print($response['county']); ?></td>
                    </tr>
                    <tr>
                        <th>Email:</th><td><?php print($response['email']); ?></td>
                        <th>Post Code:</th><td><?php print($response['postcode']); ?></td>
                    </tr>
                    <tr>
                        <th>Ethnic Origin:</th><td colspan="3"><?php print($response['ethnic_origin']); ?></td>
                    </tr>
                </table>
                    
                <h4>Step 2: Disabilities and Medical Conditions</h4>
                <table id="step2" width="100%">
                    <tr><th colspan="2">Do you consider yourself to have a disability?</th></tr>
                    <tr><td colspan="2"><?php print($response['disabilities']); ?></td></tr>
                    <tr><th colspan="2">Please provide details of support you may require as part of the Medicine Summer School:</th></tr>
                    <tr><td colspan="2"><?php print($response['disability_support']); ?></td></tr>
                    <tr><th colspan="2">Please detail below any dietary requirements and/or food allergies that you have:</th></tr>
                    <tr><td colspan="2"><?php print($response['dietary_req']); ?></td></tr>
                    <tr><th width="50%">Next of Kin Name:</th><td width="50%"><?php print($response['kin_name']); ?></td></tr>
                    <tr><th>Next of Kin Relationship:</th><td><?php print($response['kin_relation']); ?></td></tr>
                    <tr><th>Next of Kin Phone Number:</th><td><?php print($response['kin_phone']); ?></td></tr>
                </table>
        
                <h4>Step 3: Your Studies</h4>
                <table id="step3a" width="100%">
                    <tr><th width="50%">Current school/sixth form/college:</th><td width="50%"><?php print($response['current_school']); ?></td></tr>
                    <tr><th>School where you obtained your GCSEs (if different):</th><td><?php print($response['school_obtained_gcse']); ?></td></tr>
                    <tr><th>Are you currently studying A Levels?</th><td><?php print($response['studying_alevel']); ?></td></tr>
                    <tr><th colspan="2">Please detail below the three A Level subjects you are studying:</th></tr>
                    <tr><td colspan="2"><?php print($response['alevel_subjects']); ?></td></tr>
                    <tr><th colspan="2">If you are not studying A Levels, please detail below the qualifications you are studying and the subject:</th></tr>
                    <tr><td colspan="2"><?php print($response['non_alevel_subjects']); ?></td></tr>
                </table>
        
                <table id="step3b" width="100%">
                    <tr><th colspan="2">Please detail below your GCSE Subjects and the grade you achieved:</th></tr>
                    <tr><th width="50%">GCSE Subject</th><th width="50%">GCSE Grade</th></tr>
                    <tr><td><?php print($response['gcse1']); ?></td><td><?php print($response['gcse_grade1']); ?></td></tr>
                    <tr><td><?php print($response['gcse2']); ?></td><td><?php print($response['gcse_grade2']); ?></td></tr>
                    <tr><td><?php print($response['gcse3']); ?></td><td><?php print($response['gcse_grade3']); ?></td></tr>
                    <tr><td><?php print($response['gcse4']); ?></td><td><?php print($response['gcse_grade4']); ?></td></tr>
                    <tr><td><?php print($response['gcse5']); ?></td><td><?php print($response['gcse_grade5']); ?></td></tr>
                    <tr><td><?php print($response['gcse6']); ?></td><td><?php print($response['gcse_grade6']); ?></td></tr>
                    <tr><td><?php print($response['gcse7']); ?></td><td><?php print($response['gcse_grade7']); ?></td></tr>
                    <tr><td><?php print($response['gcse8']); ?></td><td><?php print($response['gcse_grade8']); ?></td></tr>
                    <tr><td><?php print($response['gcse9']); ?></td><td><?php print($response['gcse_grade9']); ?></td></tr>
                    <tr><td><?php print($response['gcse10']); ?></td><td><?php print($response['gcse_grade10']); ?></td></tr>
                    <tr><td><?php print($response['gcse11']); ?></td><td><?php print($response['gcse_grade11']); ?></td></tr>
                    <tr><td><?php print($response['gcse12']); ?></td><td><?php print($response['gcse_grade12']); ?></td></tr>
                    <tr><td><?php print($response['gcse13']); ?></td><td><?php print($response['gcse_grade13']); ?></td></tr>
                    <tr><th>Are you resitting any GCSEs?</th><td><?php print($response['gcse_resit']); ?></td></tr>
                    <tr><th colspan="2">If 'Yes', which subjects are you resitting?</th></tr>
                    <tr><td colspan="2"><?php print($response['gcse_resit_subjects']); ?></td></tr>
                </table>
        
                <h4>Step 4: Further Information</h4>
                <table id="step4" width="100%">
                    <tr><th colspan="2">Please tick all that apply to you:</th></tr>
                    <tr><td colspan="2"><?php print($response['further_info']); ?></td></tr>
                    <tr><th width="50%">Annual household income:</th><td width="50%"><?php print($response['annual_income']); ?></td></tr>
                    <tr><th width="50%">Highest level your parents have studied:</th><td width="50%"><?php print($response['parents_level_studied']); ?></td></tr>
                </table>
        
                <h4>Step 5: Declaration</h4>
                <table id="step5a" width="100%">
                    <tr><th>I hereby give my full permission that photographic images/film footage of this young person can be taken and used for any current or future University of Sunderland printed, online or film project used for marketing, PR or promotional purposes. The images will be used solely on University of Sunderland material and WILL NOT be used by or sold to any other company unless permission has been given by the subject.</th></tr>
                    <tr><td><?php print($response['dec_photograpy_consent']); ?></td></tr>
                </table>
                
                <table id="step5b" width="100%">
                    <tr><th colspan="4">Keep me up to date relating to my interest in the University of Sunderland via:</th></tr>
                    <tr>
                        <th width="25%">E-mail</th>
                        <th width="25%">Phone</th>
                        <th width="25%">SMS</th>
                        <th width="25%">Post</th>
                    </tr>
                    <tr>
                        <td><?php print($response['optin_email']); ?></td>
                        <td><?php print($response['optin_phone']); ?></td>
                        <td><?php print($response['optin_sms']); ?></td>
                        <td><?php print($response['optin_post']); ?></td>    
                    </tr>
                </table>
        
    <?php } else {
        // No records have been returned
        print("<div class=\"alert-box alert\"><p>No record found for the specified ID.</p></div>\n");
    }
    
} catch (\Exception $ex) {
    print("<div class=\"alert-box alert\"><p>{$ex->getMessage()}</p></div>\n");
}
?>                
            </div>
        </div>
        <!-- END: Page content -->
        
        <hr />

        <dl class="sub-nav">
            <dt>The Web Team</dt>
            <dd class="active"><a href="/help/index.html">Need help?</a></dd>
            <dd><a href="/version.html">version 1.0</a></dd>
        </dl>
    </div>
</div>

</body>
</html>