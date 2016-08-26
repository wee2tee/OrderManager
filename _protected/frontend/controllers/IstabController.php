<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace frontend\controllers;

use yii\web\NotFoundHttpException;
use yii\web\MethodNotAllowedHttpException;
use Yii;
use yii\db\Query;
/**
 * Description of IstabController
 *
 * @author WeeTee
 */
class IstabController extends FrontendController {
    
    public function actionIndex(){
        $query = new Query();
        $count = $query->from('auth_item');
        
        $item = $query->select()->from('auth_item')->all();
        
        return $this->render('index', [
            'auth_item' => $item,
            'cont' => $count
        ]);
    }
}
