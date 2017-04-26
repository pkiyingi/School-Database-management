<?php

namespace common\models\loan;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
/**
 * This is the model class for table "trans_loan_documentsuploaded".
 *
 * @property string $loandocument_id
 * @property string $loan_id
 * @property integer $document_id
 * @property integer $uploaded_by
 * @property string $remarks
 * @property string $uploaded_date
 */
class LoanDocumentuploaded extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'trans_loan_documentsuploaded';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['loan_id', 'document_id', 'uploaded_by', 'uploaded_date'], 'required'],
            [['loan_id', 'document_id', 'uploaded_by'], 'integer'],
            [['document_uploaded'], 'file', 'skipOnEmpty' => true, 'extensions' => 'pdf,png,jpg,gif'],
            [['uploaded_date'], 'safe'],
            [['remarks'], 'string', 'max' => 4000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'loandocument_id' => 'Loandocument ID',
            'loan_id' => 'Loan ID',
            'document_id' => 'Document ID',
            'uploaded_by' => 'Uploaded By',
            'document_uploaded' => 'Upload Document',
            'remarks' => 'Remarks',
            'uploaded_date' => 'Uploaded Date',
        ];
    }

}
