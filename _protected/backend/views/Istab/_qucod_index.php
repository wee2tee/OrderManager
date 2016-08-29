<?php
use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title = 'หน่วยนับ';
?>

    

    <h2>
        <a href=<?= Url::to(['istab/view', 'id' => $model->id]) ?>><?= $model->typcod ?></a>
    </h2>

    <p class="time"><span class="glyphicon glyphicon-time"></span> <?= $model->typdes_th ?></p>

    <br>

    <p><?= $model->credate?></p>

    <a class="btn btn-primary" href=<?= Url::to(['istab/view', 'id' => $model->id]) ?>>
        <?= yii::t('app','Read more'); ?><span class="glyphicon glyphicon-chevron-right"></span>
    </a>

    <hr class="article-devider">
