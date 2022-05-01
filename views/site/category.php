<?php

use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\VarDumper;
/** @var yii\web\View $this */

$this->title = 'Resize image';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Min bedste bog forum</h1>

        
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col">                
                <h2>Kategorier</h2> 
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        [
                            'header' => 'Titel',
                            'attribute' => 'name',   
                            'format'=>'raw',
                            'value'=>function ($model) {
                                return Html::a($model->name, ['/Subcategory', 'id'=>$model->id], ['class' => 'getSubcategorybyid', ]);
                            }
                        ],
                        [
                            'header' => 'Beskrivelse',
                            'attribute' => 'description'
                        ],
                        
                    ]
                ]) ?>      
            </div>
                    
        </div>

    </div>
</div>
<?php
$this->registerJs("

$(function () { 
    $('.category').click(function () {
        $('#category')
            .modal('Subcategory')
            .find('#getSubcategorybyid')
            .load($(this).attr('value'));
    });
});

");?>