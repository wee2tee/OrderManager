<?php
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\grid\GridView;
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
<!--    <table class="table table-hover table-header-bordered">
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
    </table>-->
    
    <?php
    echo GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['attribute' => 'id', 'visible' => false],
                ['attribute' => 'tabtyp', 'visible' => false],
                ['attribute' => 'typcod', 'label' => 'รหัส', 'format' => 'text'],
                'abbreviate_th:text:ชื่อย่อ(ไทย)',
                'abbreviate_en:text:ชื่อย่อ(Eng.)',
                'typdes_th:text:ชื่อเต็ม(ไทย)',
                'typdes_en:text:ชื่อเต็ม(Eng.)',
                [
                    'attribute' => '',
                    'format' => 'raw',
                    'value' => function($model, $key, $index, $column){
                        $btn_info = '<a href="#" data-id="' . $model->id . '" onclick="return $(this).Remove(event)" class="link link-blue"><i class="fa fa-info-circle"></i></a>';
                        $btn_edit = '<a href="qucod_edit?id=' . $model->id . '" class="link link-green"><i class="fa fa-edit"></i></a>';
                        $btn_delete = '<a href="#" data-id="' . $model->id . '" onclick="return $(this).Remove(event)" class="link link-red"><i class="fa fa-remove"></i></a>';
                        return $btn_info . $btn_edit . $btn_delete;
                    }
                ],
            ],
            'summary' => 'แสดงรายการที่ {begin} - {end} จากทั้งหมด {totalCount} รายการ',
            'layout' => "{summary}\n{items}\n{pager}",
            'tableOptions' => ['class' => 'table table-hover table-header-bordered odd-even', 'style' => 'margin-top: 10px;'],
            'rowOptions'=>function ($model, $key, $index, $grid){
                $class=$index%2?'odd':'even';
                return array('key'=>$key,'index'=>$index,'class'=>$class);
            },
        ]);
    ?>
    
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
