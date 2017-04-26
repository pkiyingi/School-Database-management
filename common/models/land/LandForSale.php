<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "mst_landforsale".
 *
 * @property integer $land_id
 * @property string $name
 * @property string $district
 * @property integer $number_of_pots
 * @property string $description
 * @property integer $created_by
 * @property string $created_date
 * @property string $amount_bought
 */
class LandForSale extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mst_landforsale';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'district', 'number_of_pots', 'description', 'created_by', 'created_date', 'amount_bought'], 'required'],
            [['number_of_pots', 'created_by'], 'integer'],
            [['created_date'], 'safe'],
            [['amount_bought'], 'number'],
            [['name'], 'string', 'max' => 255],
            [['district'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 1500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'land_id' => 'Land ID',
            'name' => 'Name',
            'district' => 'District',
            'number_of_pots' => 'Number Of Pots',
            'description' => 'Description',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'amount_bought' => 'Amount Bought',
        ];
    }
}
