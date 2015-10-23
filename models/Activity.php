<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "activity".
 *
 * @property integer $id
 * @property string $type
 * @property string $description
 * @property string $timestamp
 * @property integer $user_id
 */
class Activity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'activity';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'required'],
            [['type', 'description'], 'string', 'max' => 555]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'description' => 'Description',
            'timestamp' => 'Timestamp',
            'user_id' => 'User ID',
        ];
    }
}
