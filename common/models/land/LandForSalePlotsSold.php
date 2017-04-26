<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "trans_landforsale_plotssold".
 *
 * @property integer $plotsold_id
 * @property integer $land_id
 * @property integer $num_of_plots
 * @property integer $created_by
 * @property string $plot_numbers
 * @property string $last_payment_date
 * @property integer $bought_by
 * @property string $date_bought
 * @property string $total_amount
 */
class LandForSalePlotsSold extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_landforsale_plotssold';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['land_id', 'num_of_plots', 'created_by', 'plot_numbers', 'last_payment_date', 'bought_by', 'date_bought', 'total_amount'], 'required'],
            [['land_id', 'num_of_plots', 'created_by', 'bought_by'], 'integer'],
            [['last_payment_date', 'date_bought'], 'safe'],
            [['total_amount'], 'number'],
            [['plot_numbers'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'plotsold_id' => 'Plotsold ID',
            'land_id' => 'Land ID',
            'num_of_plots' => 'Num Of Plots',
            'created_by' => 'Created By',
            'plot_numbers' => 'Plot Numbers',
            'last_payment_date' => 'Last Payment Date',
            'bought_by' => 'Bought By',
            'date_bought' => 'Date Bought',
            'total_amount' => 'Total Amount',
        ];
    }
}
