<?php
    use yii\widgets\ActiveForm;
    use yii\helpers\Html;
    use yii\helpers\VarDumper;
/** @var yii\web\View $this */

$this->title = 'Resize image';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Congratulations!</h1>

        
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>
                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

                <?= $form->field($model, 'imageFile')->fileInput() ?>
                

                <button>Resize</button>
                <?php ActiveForm::end() ?>
                
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>
                <?php echo '<pre>';
                    
                     echo '</pre>';
                ?>
            </div>            
        </div>

    </div>
</div>
