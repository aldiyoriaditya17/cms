<?php

namespace cms\models;

use Yii;
use yii\db\Query;

class Posting extends \yii\db\ActiveRecord {

    public $start_date, $end_date, $count_posting, $where_date, $title, $person_id, $nik, $nama;
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

    public function getEmployee()
	{
		return $this->hasOne(Employee::className(), ['person_id' => 'owner_id']);
    }
    
    public function getPostingDetail()
	{
		return $this->hasOne(PostingDetail::className(), ['id_posting' => 'id_posting']);
    }

    //count dashboard posting
    public function getCountDashboard(){
        //count posting, sum likes and comments
        $count_posting_all = Posting::find()->where($this->where_date)->count();
        $count_posting = Posting::find()->where($this->where_date)->andWhere("id_posting NOT IN (SELECT id_posting FROM posting_link)")->count();
        $count_link = PostingLink::find()->select(['id_posting'])->where($this->where_date)->distinct()->count();
        $sum_likes = PostingLike::find()->where($this->where_date)->sum('likes');
        $count_comments = PostingComment::find()->where($this->where_date)->count();

        $data = [
            'likes' => empty($sum_likes) ? 0 : $sum_likes,
            'comments' => $count_comments,
            'posting' => $count_posting,
            'link' => $count_link
        ];

        return $data;
    }

    public function getCountHastag(){
        $hastagValues = [];
        //count posting, sum likes and comments
        $posting_all = Posting::find()->where($this->where_date)->all();
        
        if(!empty($posting_all)){
            //set caption became 1 string
            $captionArray = array();
            foreach($posting_all as $posting){
                if(strpos($posting->caption, '#') !== false){
                    array_push($captionArray,$posting->caption);
                }
            }

            //count hashtag
            $captionData = implode(",",$captionArray);    
            preg_match_all("/(#\w+)/", $captionData, $matched);
            $hastagArray = $matched[0];
            $hastagArray = array_map('strtolower', $hastagArray);
            $hastagArray=array_unique($hastagArray);
            $hastagValues = array_count_values($hastagArray);
            arsort($hastagValues);
            $hastagValues = array_slice($hastagValues, 0, 5);         
        }

        return $hastagValues;
    }

    public function getTopActivity(){
        $query = new Query;
		$query
			->select('owner_id, owner_name, COUNT(owner_name) AS count_posting, person_id, nik, nama, title')
            ->from('posting')
            ->leftJoin('employee','employee.person_id = posting.owner_id')
            ->where($this->where_date)
            ->groupBy('owner_name')
            ->orderBy('count_posting desc')
            ->limit(5);
		$command = $query->createCommand();
        $model = $command->queryAll();
        
        return $model;
    }

    public function getMostData($flag)
    {
        $orderBy = ($flag == "comment") ? "comment_count desc" : (($flag == "viewer") ? "views_count desc" : "like_count desc");
        $posting_all = Posting::find()
                        ->where($this->where_date)
                        ->andwhere('posting.type_posting=1')
                        ->orderBy($orderBy)
                        ->limit(3)
                        ->all();
        return $posting_all;  
    }

    // public function getMostDataFilter($flag,$start_date,$end_date)
    // {
    //     $orderBy = ($flag == "comment") ? "comment_count desc" : (($flag == "viewer") ? "views_count desc" : "like_count desc");
    //     $posting_all = Posting::find()
    //                     ->where("created_at>='$start_date' AND created_at<='$end_date'")
    //                     ->where('posting.type_posting=1')
    //                     ->orderBy($orderBy)
    //                     ->limit(3)
    //                     ->all();

    //     return $posting_all;  
    // }

}