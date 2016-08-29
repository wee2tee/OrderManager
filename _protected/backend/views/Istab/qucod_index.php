<?php
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', "หน่วยนับ"); //Yii::t('app', Yii::$app->name) .' '. Yii::t('app', 'news');
//$this->params['breadcrumbs'][] = Yii::t('app', 'Articles');
?>
<div class="istab-index">

    <h3><?= Html::encode($this->title) ?> 
        <span class="small"> - <?= Yii::t('app', 'กำหนดหน่วยนับสำหรับสินค้า') ?></span>
    </h3>

    <hr class="top">
    <table class="table table-hover table-header-bordered">
        <thead>
            <tr>
                <th>รหัส</th>
                <th>ชื่อย่อ(ไทย)</th>
                <th>ชื่อย่อ(Eng.)</th>
                <th>ชื่อเต็ม(ไทย)</th>
                <th>ชื่อเต็ม(Eng.)</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($qucod as $m) { ?>
            <tr>
                <td><?=$m['typcod']?></td>
                <td><?=$m['abbreviate_th']?></td>
                <td><?=$m['abbreviate_en']?></td>
                <td><?=$m['typdes_th']?></td>
                <td><?=$m['typdes_en']?></td>
                <td>
                    <a href="#" class="link link-blue"><i class="fa fa-info-circle"></i></a>
                    <a href="<?= Url::to(['\istab\qucod_edit', "id" => $m['id']]) ?>" class="link link-green"><i class="fa fa-edit"></i></a>
                    <a href="#" data-id="<?=$m['id']?>" onclick="return $(this).Remove(event)" class="link link-red"><i class="fa fa-remove"></i></a>
                </td>
            </tr>
            <?php }
            ?>
        </tbody>
    </table>
    <?php
//    echo ListView::widget([
//        'summary' => false,
//        'dataProvider' => $dataProvider,
//        'emptyText' => Yii::t('app', 'ยังไม่มีข้อมูล'),
//        'itemOptions' => ['class' => 'item'],
//        'itemView' => function ($model, $key, $index, $widget) {
//            return $this->render('_qucod_index', ['model' => $model]);
//        },
//    ]) ?>

</div>
