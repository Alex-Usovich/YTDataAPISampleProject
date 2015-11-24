<?php
    namespace app\models;
    use yii\db\ActiveRecord;

    class Video extends ActiveRecord{



        public function tableName(){
            return "videos";
        }
    }