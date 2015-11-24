<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Video;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionRefresh(){

        echo "hi";
        $DEVELOPER_KEY = 'AIzaSyCzTX4jeGnhS1Cvkz0KP-1rFf9EnYhrVJM';

        $client = new \Google_Client();
        $client->setDeveloperKey($DEVELOPER_KEY);

        $youtube = new \Google_Service_YouTube($client);

        try {

            $searchResponse = $youtube->search->listSearch('id,snippet', array(
                'maxResults' => 5,
            ));

            $videoResults = array();

            foreach ($searchResponse['items'] as $searchResult) {
                array_push($videoResults, $searchResult['id']['videoId']);
            }
            $videoIds = join(',', $videoResults);

            $videosResponse = $youtube->videos->listVideos('snippet, statistics', array(
                'id' => $videoIds,
            ));


            Yii::$app->db->createCommand('TRUNCATE videos')->execute();

            for($i = 0; $i<sizeof($videosResponse); $i++){

                $channelsResponse = $youtube->channels->listChannels('statistics',array(
                    'id' => $videosResponse[$i]['snippet']['channelId'],
                ));

                Yii::$app->db->createCommand()->insert('videos', [
                    'id_video' => $videosResponse[$i]['id'],
                    'id_channel' => $videosResponse[$i]['snippet']['channelId'],
                    'video_title' => $videosResponse[$i]['snippet']['title'],
                    'channel_title' => $videosResponse[$i]['snippet']['channelTitle'],
                    'video_description' => $videosResponse[$i]['snippet']['description'],
                    'video_thumbnail' => $videosResponse[$i]['snippet']['thumbnails']['medium']['url'],
                    'views_count' => $videosResponse[$i]['statistics']['viewCount'],
                    'comments_count' => $videosResponse[$i]['statistics']['commentCount'],
                    'likes_count' => $videosResponse[$i]['statistics']['likeCount'],
                    'dislikes_count' => $videosResponse[$i]['statistics']['dislikeCount'],
                    'subscribers_count' => $channelsResponse[0]['statistics']['subscriberCount'],
                ])->execute();
            }

            return null;

        } catch (Google_Service_Exception $e) {
           echo sprintf('<p>A service error occurred: <code>%s</code></p>',
                htmlspecialchars($e->getMessage()));
        } catch (Google_Exception $e) {
            echo sprintf('<p>An client error occurred: <code>%s</code></p>',
                htmlspecialchars($e->getMessage()));
        }

    }

    public function actionRetrieve(){

        $videos = Yii::$app->db->createCommand('SELECT * FROM videos LIMIT 5')
            ->queryAll();

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $videos;
    }
}
