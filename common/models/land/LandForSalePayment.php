<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "trans_landforsale_payment".
 *
 * @property integer $landpayment_id
 * @property string $payment_date
 * @property string $amount_paid
 * @property integer $paid_by
 * @property integer $plotsold_id
 */
class LandForSalePayment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_landforsale_payment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['payment_date', 'amount_paid', 'paid_by', 'plotsold_id'], 'required'],
            [['payment_date'], 'safe'],
            [['amount_paid'], 'number'],
            [['paid_by', 'plotsold_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'landpayment_id' => 'Landpayment ID',
            'payment_date' => 'Payment Date',
            'amount_paid' => 'Amount Paid',
            'paid_by' => 'Paid By',
            'plotsold_id' => 'Plotsold ID',
        ];
    }
}
