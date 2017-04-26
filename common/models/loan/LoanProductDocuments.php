<?php

namespace common\models\loan;

use Yii;

/**
 * This is the model class for table "loan_product_documents".
 *
 * @property integer $id
 * @property string $created_date
 * @property integer $created_by
 * @property string $updated_date
 * @property integer $updated_by
 * @property string $loan_productid
 * @property integer $document_typesdocument_id
 */
class LoanProductDocuments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'loan_product_documents';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_date', 'updated_date'], 'safe'],
            [['created_by', 'updated_by', 'loan_productid', 'document_typesdocument_id'], 'integer'],
            [['loan_productid', 'document_typesdocument_id'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_date' => 'Created Date',
            'created_by' => 'Created By',
            'updated_date' => 'Updated Date',
            'updated_by' => 'Updated By',
            'loan_productid' => 'Loan Productid',
            'document_typesdocument_id' => 'Document Typesdocument ID',
        ];
    }
}
