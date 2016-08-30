<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace backend\controllers;

//use frontend\models\Article;
use backend\models\Istab;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\MethodNotAllowedHttpException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use Yii;
/**
 * Description of IstabController
 *
 * @author WeeTee
 */
class IstabController extends Controller {
    
    const TABTYP_Depcod = "50";
    const TABTYP_Loccod = "21";
    const TABTYP_Qucod = "20";
    const TABTYP_Stkgrp = "22";
    const TABTYP_Dlvby = "41";
    const TABTYP_Dlvprofile = "D0";

    
    public function behaviors(){
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => TRUE,
                    ],
                    [
                        'actions' => ['logout', 'qucod', 'qucod_edit'],
                        'allow' => TRUE,
                        'roles' => ['@']
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

    public function actions(){
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionQucod(){
        //$query = new Query();
        //$count = $query->from('istab');
        //$item = $query->select('*')->from('istab')->where(['tabtyp' => self::TABTYP_Qucod ])->all();

        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' =>  Istab::find()->select('*')->where(['tabtyp' => self::TABTYP_Qucod]),
            'sort' => ['defaultOrder' => ['typcod' => SORT_ASC]],
            'pagination' => [
                'pageSize' => 10,
            ]
        ]);
        
        $qucod = Istab::find()->select('*')->where(['tabtyp' => self::TABTYP_Qucod])->all();
        return $this->render('qucod_index', [
            'dataProvider' => $dataProvider,
            'qucod' => $qucod,
        ]);
    }
    
    public function actionQucod_edit($id){
        $qucod = Istab::findOne(['id' => $id]);
        
        if($qucod->load(Yii::$app->request->post()) && $qucod->save()){
            return $this->redirect('index');
        }
        else{
            return $this->render('qucod_edit', ['model' => $qucod]);
        }
    }
    
//    public function actionQucod_edit(){
//        return $this->render('qucod_edit');
//    }
}
