<?php
use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = "Test istab";//Yii::t('app', Yii::$app->name) .' '. Yii::t('app', 'news');
//$this->params['breadcrumbs'][] = Yii::t('app', 'Articles');
?>
<div class="istab-index">

    <h1><?= Html::encode($this->title) ?> 
<!--        <span class="small"> - <?= Yii::t('app', 'The best news available') ?></span> -->
    </h1>

    <hr class="top">

    <?php
    foreach ($model as $m) {
        echo '<div>' . $m[1] . '</div>';
    }
    ?>

</div>
