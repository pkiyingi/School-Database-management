<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\db\Query;

/**
 * Dropdowns for the casetracker app
 */
class SaccoManagerDropdowns {

    /**
     * List of all courts in the country
     */
    public static function getListOfAccountTypes() {
        $db = Yii::$app->db;
        Yii::$app->db->open();
        $accounts = $db->createCommand('SELECT * FROM mst_account_type')
                ->queryAll();
        return $accounts;
    }

    /**
     * Reference Numbers
     */
    public static function getReferenceNumberCounts() {
        $db = Yii::$app->db;
        Yii::$app->db->open();
        $year = date('Y');
        $month = date('m');
        $accounts = $db->createCommand("SELECT * FROM mst_reference_number WHERE current_year='$year' AND current_month='$month'")
                ->queryOne();
        return $accounts;
    }

    public static function getStatusCodes($module) {
        $db = Yii::$app->db;
        Yii::$app->db->open();
        $accounts = $db->createCommand("SELECT * FROM mst_status_code WHERE module_id='$module'")
                ->queryAll();
        return $accounts;
    }

    public static function getAvailableLandForSale() {
        $db = Yii::$app->db;
        Yii::$app->db->open();
        $plots = $db->createCommand("SELECT * FROM mst_landforsale")
                ->queryAll();
        return $plots;
    }

    public static function updateReferenceNumberCount($column = 'loans') {
        $db = Yii::$app->db;
        Yii::$app->db->open();
        $logged_in = Yii::$app->user->identity;
        $year = date('Y');
        $month = date('m');

        $query = "INSERT INTO mst_reference_number($column,current_year,current_month,last_updated_by,last_update_date)";
        $query.=" VALUES(1,$year,$month,{$logged_in->id},now()) ON DUPLICATE KEY UPDATE $column=$column+1,last_update_date=now()";
        $accounts = $db->createCommand($query)->execute();
        return true;
    }
    
    /**
     * Types of documents which can be uploaded when applying for a loan
     * @return type
     */
     public static function getListDocumentsUploaded() {
        $db = Yii::$app->db;
        Yii::$app->db->open();
        $documents = $db->createCommand('SELECT * FROM mst_typesof_documentsuploaded')
                ->queryAll();
        return $documents;
    }
	
	
	 /**
     * Types of loans 
     * @return type
     */
     public static function getLoanProducts($id=null) {
         
         $db = Yii::$app->db;
        Yii::$app->db->open();
         if($id==null){        
        $loanproducts = $db->createCommand('SELECT
loan_product.id,
accounts.name,
loan_product.max_loan_amt,
loan_product.number_of_gaurantors,
a.num as numberofdocs
FROM loan_product
INNER JOIN accounts ON loan_product.account_id = accounts.id
left join (select count(*) as num, loan_productid from loan_product_documents group by loan_productid) a
on a.loan_productid=loan_product.id
')
                ->queryAll();
         return $loanproducts;}
         
         
         else
             
         {
              $loanproducts = $db->createCommand('SELECT
loan_product.id,

accounts.name,loan_product.max_loan_amt,
number_of_gaurantors,
a.num as numberofdocs
FROM loan_product
INNER JOIN accounts ON accounts.id = loan_product.account_id
left join (select count(*) as num, loan_productid from loan_product_documents group by loan_productid) a
on a.loan_productid=loan_product.id
where loan_product.id='.$id
)
                ->queryOne();
         return $loanproducts;
             
         }
    }

}
