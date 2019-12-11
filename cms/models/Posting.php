<?php

namespace cms\models;

use Yii;

class Posting extends \yii\db\ActiveRecord {

    public static function tableName() {
        return 'posting';
    }

    public function rules() {
        return array(
            array('id_posting, id_group, group_name, owner_id, owner_name, caption,url_content, thumnail_content', 'required', 'message' => '{attribute} tidak boleh kosong.'),
        );
    }

    public function attributeLabels() {
        return array(
            'nik' => 'NIK',
            'nama' => 'Nama',
            'no_telp' => 'No Telp',
            'status' => 'Status',
            'alamat' => 'Alamat'
        );
    }

}