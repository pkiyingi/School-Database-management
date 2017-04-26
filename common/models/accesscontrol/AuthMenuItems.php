<?php

namespace common\models\accesscontrol;

use Yii;

/**
 * This is the model class for table "auth_menu_items".
 *
 * @property integer $id
 * @property integer $menu_id
 * @property string $label
 * @property string $link
 * @property string $icon
 * @property integer $parent_id
 * @property string $permission
 * @property string $page_description
 * @property integer $level
 * @property integer $record_status
 */
class AuthMenuItems extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'auth_menu_items';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['menu_id', 'label', 'link', 'icon', 'permission', 'page_description', 'level'], 'required'],
            [['menu_id', 'parent_id', 'level', 'record_status'], 'integer'],
            [['label', 'link'], 'string', 'max' => 255],
            [['icon', 'permission'], 'string', 'max' => 50],
            [['page_description'], 'string', 'max' => 1000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'menu_id' => 'Menu ID',
            'label' => 'Label',
            'link' => 'Link',
            'icon' => 'Icon',
            'parent_id' => 'Parent ID',
            'permission' => 'Permission',
            'page_description' => 'Page Description',
            'level' => 'Level',
            'record_status' => 'Record Status',
        ];
    }
}
