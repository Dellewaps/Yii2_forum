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
        <h1 class="display-4"></h1>

        
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col">                
                <h2>Kategorier</h2> 
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'rowOptions'   => function ($model,) {
                        return ['data-id' => $model->id];
                    },
                    'columns' => [
                        [
                            'header' => 'Titel',
                            'attribute' => 'name',                            
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

    $('td').click(function (e) {
        var id = $(this).closest('tr').data('id');
        if(e.target == this)
            location.href = '" . Url::to(['site/Subcategory']) . "?id=' + id;
    });

");?>