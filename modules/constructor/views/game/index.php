<?php

use app\models\Game;
use app\models\User;
use appcomponents\IcoComponent;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Games');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="game-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Game'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'title',
            'description:ntext',
            'user_id',
            [
                'label' => Yii::t('app', 'Action column'),
                'format' => 'raw',
                'value' => function ($model) {
                    $html = Html::a(IcoComponent::view() . ' ' . Yii::t('app', 'Show'), Url::to(['view', 'id' => $model->id]), ['class' => 'btn btn-success btn-block']);
                    $html .= ' ' . Html::a(IcoComponent::edit() . ' ' .Yii::t('app', 'Edit'), Url::to(['update', 'id' => $model->id]), ['class' => 'btn btn-primary btn-block']);
                    $html .= ' ' . Html::a(IcoComponent::delete() . ' ' . Yii::t('app', 'Delete'), Url::to(['delete', 'id' => $model->id]), [
                            'class' => 'btn btn-danger btn-block',
                            'data' => [
                                'confirm' => Yii::t('note', 'Are you sure you want to delete this item?'),
                                'method' => 'post',
                            ],
                        ]);


                    return $html;
                }
            ],
        ],
    ]); ?>


</div>
