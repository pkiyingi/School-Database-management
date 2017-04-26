<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;
use yii\db\Query;
use yii\base\Model;

/**
 * This is the model class for table "uploadedfiles".
 *
 * @property string $id
 * @property string $attachment
 * @property integer $file_size
 * @property string $file_ext
 * @property integer $uploaded_at
 * @property integer $uploaded_by
 * @property string $file_path
 * @property string $file_name
 * @property string $file_description
 * @property string $module_code
 * @property integer $ref_id
 */
class UploadedFiles extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'uploadedfiles';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['attachment'], 'required'],
            [['file_size', 'uploaded_at', 'uploaded_by', 'ref_id'], 'integer'],
            [['attachment', 'file_name'], 'string', 'max' => 225],
            [['file_ext'], 'string', 'max' => 10],
            [['file_path', 'file_description'], 'string', 'max' => 500],
            [['module_code'], 'string', 'max' => 50],
            [['attachment'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png,jpg,pdf,gif,jpg,jpeg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'attachment' => 'Attachment',
            'file_size' => 'File Size',
            'file_ext' => 'File Ext',
            'uploaded_at' => 'Uploaded At',
            'uploaded_by' => 'Uploaded By',
            'file_path' => 'File Path',
            'file_name' => 'File Name',
            'file_description' => 'File Description',
            'module_code' => 'Module Code',
            'ref_id' => 'Ref ID',
        ];
    }

    /**
     * Upload Files attached
     * @param type $attachments
     * @param type $filedetails
     * @return boolean
     */
    public function upload($file, $filedetails) {
        //An Instance of the Of the attachment
        $db = Yii::$app->db;
        Yii::$app->db->open();
        $file_name = md5(uniqid());
        $root_dir = MYSACCO_ATTACHMENTS_DIR . '/' . $filedetails->module_code;
        //Create the root DIR if it doesnt exist
        if (!file_exists($root_dir)) {
            mkdir($root_dir);
        }
        //Try to upload the File
        if (!empty($file)) {
//            foreach ($attachments AS $file) {
            // <editor-fold defaultstate="collapsed" desc="1. Upload file Attached to file System">
            $file_name = md5(uniqid()) . '.' . $file->extension;
            $file_size = $file->size;
            $file->saveAs($root_dir . '/' . $file_name);
            // </editor-fold>
            // <editor-fold defaultstate="collapsed" desc="2. Save MetaData to the DB">
            $db->createCommand()->insert($this->tableName(), [
                'attachment' => $file_name,
                'uploaded_at' => time(),
                'file_ext' => $file->extension,
                'file_size' => $file_size,
                'file_path' => $filedetails->module_code,
                'uploaded_by' => Yii::$app->user->id,
                'file_name' => $filedetails->file_name,
                'file_description' => $filedetails->file_description,
                'module_code' => $filedetails->module_code,
                'ref_id' => $filedetails->ref_id
                    ]
            )->execute();
            // </editor-fold>
            //}
            return true;
        } else {
            return false;
        }
    }

}
