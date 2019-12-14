<?php

namespace cms\models;

use Yii;

/**
 * This is the model class for table "group_detail".
 *
 * @property int $id_group_detail
 * @property int|null $id_group
 * @property string|null $group_name
 * @property int|null $id_member
 * @property string|null $member_name
 * @property string|null $email_member
 * @property int|null $active 0:not active, 1: Active
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $deleted_at
 */
class GroupDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'group_detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_group', 'id_member', 'active'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['group_name'], 'string', 'max' => 100],
            [['member_name', 'email_member'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_group_detail' => 'Id Group Detail',
            'id_group' => 'Id Group',
            'group_name' => 'Group Name',
            'id_member' => 'Id Member',
            'member_name' => 'Member Name',
            'email_member' => 'Email Member',
            'active' => 'Active',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }

    public function getEmployee()
	{
		return $this->hasOne(Employee::className(), ['person_id' => 'id_member']);
    }
}
