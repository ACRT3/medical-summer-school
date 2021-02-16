<?php

// Define class namespace
namespace UosApplication;

// Include database class.
require_once(dirname(__FILE__) . "/../../core/AppDatabase.php");



/**
 * Medicine Summer School data capture form.
 * 
 * 
 * @author Paul Cranner
 * @copyright 2020 University of Sunderland
 * @license Proprietary
 * @version 1.1.0
 */
class MedicineSummerSchool {

    /**
     * The hostname of the database server.
     * 
     * @var string
     */
    private $databaseServerHost = "walts-mysql-01.sunderland.ac.uk";
    
    /**
     * The port of the database server.
     * 
     * @var integer
     */
    private $databaseServerPort = 3306;
    
    /**
     * The database account username (read/write access).
     * 
     * @var string
     */
    private $databaseAccountUserRW = "web_medsummr_rw";
    
    /**
     * The database account password (read/write access).
     * 
     * @var string
     */
    private $databaseAccountPasswordRW = "At8lSLZm6gOaVA";
    
    /**
     * The database account username (read only access).
     * 
     * @var string
     */
    private $databaseAccountUser = "web_medsummr_ro";
    
    /**
     * The database account password (read only access).
     * 
     * @var string
     */
    private $databaseAccountPassword = "fq7H2T8QfLceuh";    
    
    /**
     * The name of the database schema.
     *
     * @var string
     */
    private $databaseSchema = "web_medsummr";
    
    
    /**
     * List of fields in responses table.
     *
     * @var string
     */
    private $fieldList = "response_id, firstname, lastname, address1, address2, address3, county, postcode, dob, mobile, email, ethnic_origin, disabilities, disability_support, dietary_req, kin_name, kin_relation, kin_phone, current_school, school_obtained_gcse, studying_alevel, alevel_subjects, non_alevel_subjects, gcse1, gcse_grade1, gcse2, gcse_grade2, gcse3, gcse_grade3, gcse4, gcse_grade4, gcse5, gcse_grade5, gcse6, gcse_grade6, gcse7, gcse_grade7, gcse8, gcse_grade8, gcse9, gcse_grade9, gcse10, gcse_grade10, gcse11, gcse_grade11, gcse12, gcse_grade12, gcse13, gcse_grade13, gcse_resit, gcse_resit_subjects, further_info, annual_income, parents_level_studied, dec_photograpy_consent, optin_email, optin_phone, optin_sms, optin_post, date_created";
    
    
    /**
     * Constructor.
     * 
     * @since 1.0.0
     */
    function __construct() {
        
    }

    
    public function getResponses() {
        /**
         * Returns all responses from the database
         */
        
        try {
            $appDatabase = new \UosCore\AppDatabase($this->databaseAccountUser, $this->databaseAccountPassword, $this->databaseSchema, $this->databaseServerHost, $this->databaseServerPort);

            $sqlStatement = "SELECT {$this->fieldList} FROM responses ORDER BY date_created DESC;";
            
            if ($sqlResult = $appDatabase->queryDatabase($sqlStatement)) return $sqlResult;
        
        } catch (\Exception $ex) {
            throw new \Exception("Unable to retrieve responses. <!--{$ex->getMessage()}-->");
        }
    }
    
    
    public function getResponsebyID($responseID) {
        /**
         * Returns specified response from database
         */
        
        try {
            $appDatabase = new \UosCore\AppDatabase($this->databaseAccountUser, $this->databaseAccountPassword, $this->databaseSchema, $this->databaseServerHost, $this->databaseServerPort);
            
            $sqlStatement = "SELECT {$this->fieldList} FROM responses WHERE response_id = {$responseID};";
            
            if ($sqlResult = $appDatabase->queryDatabase($sqlStatement)) return $sqlResult[0];
        
        } catch (\Exception $ex) {
            throw new \Exception("Unable to retrieve response. <!--{$ex->getMessage()}-->");
        }
    }
    
    
    public function addResponse($response) {
        /**
         * Inserts a new response into the database
         */
        
        try {
            $appDatabase = new \UosCore\AppDatabase($this->databaseAccountUserRW, $this->databaseAccountPasswordRW, $this->databaseSchema, $this->databaseServerHost, $this->databaseServerPort);

            $prefix = $fieldList = $valueList = "";

            // Convert field list into an array so we can Loop over it
            $fieldArray = explode(', ', $this->fieldList);
            
            // Loop over all fields
            foreach($fieldArray as $field) {
                
                // Ignore date_created and response_id as these have default values in the database
                if ($field != "date_created" & $field != "response_id") {
                    
                    if (array_key_exists($field, $response)) {
                        // A value for this field has been passed in $response so let's use it
                        $valueList .= "{$prefix}'" . $appDatabase->escapeString($response[$field]) . "'";
                    } else {
                        // This field hasn't been passed in $response so set a blank value
                        $valueList .= "{$prefix}''";
                    }
                    // Append the current field to the field list
                    $fieldList .= "{$prefix}`{$field}`";
                    $prefix = ", ";
                }
            }
            
            $sqlStatement = "INSERT INTO responses ({$fieldList}) VALUES ({$valueList});";
            $recordID = $appDatabase->queryDatabase($sqlStatement);
            return $recordID;
        
        } catch (\Exception $ex) {
            throw new \Exception("Unable to save response. Please try again. <!--{$ex->getMessage()}-->");
        }
    }
   
    public function deleteResponse($responseID) {
        /**
         * Deletes specified response from database
         */
        
        try {
            $appDatabase = new \UosCore\AppDatabase($this->databaseAccountUserRW, $this->databaseAccountPasswordRW, $this->databaseSchema, $this->databaseServerHost, $this->databaseServerPort);
            
            $sqlStatement = "DELETE FROM responses WHERE response_id = {$responseID};";
            
            if ($sqlResult = $appDatabase->queryDatabase($sqlStatement)) return $sqlResult;
        
        } catch (\Exception $ex) {
            throw new \Exception("Unable to delete response. <!--{$ex->getMessage()}-->");
        }
    }
    
    public function generateCsvExport() {
        /**
         * Generates CSV file containing all records
         */
        
        try {
            $appDatabase = new \UosCore\AppDatabase($this->databaseAccountUser, $this->databaseAccountPassword, $this->databaseSchema, $this->databaseServerHost, $this->databaseServerPort);
        
            $sqlStatement = "SELECT {$this->fieldList} FROM responses ORDER BY date_created DESC;";
            
            if ($sqlResult = $appDatabase->queryDatabase($sqlStatement)) {
                // Results were returned
                
                // Output headers so that the file is downloaded rather than displayed
                header('Content-Type: text/csv; charset=utf-8');
                header('Content-Disposition: attachment; filename=data.csv');
                
                // Create a file pointer connected to the output stream
                $output = fopen('php://output', 'w');

                // Output the column headings
                fputcsv($output, explode(", ", $this->fieldList));
                
                // Fetch the data
                $sqlResult = $appDatabase->queryDatabase($sqlStatement);
                
                // Output each row
                foreach ($sqlResult as $row) fputcsv($output, $row);
            }
        } catch (\Exception $ex) {
            throw new \Exception("Unable to generate CSV file. <!--{$ex->getMessage()}-->");
        }
    }

}
?>