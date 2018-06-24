<?php
/**
 * Created by PhpStorm.
 * User: comaw
 * Date: 24.06.2018
 * Time: 15:41
 */

$this->title                   = Yii::t('app', 'Добавить недвижимость');
$this->params['breadcrumbs'][] = $this->title;
$this->registerMetaTag([
    'name' => 'description',
    'content' => $this->title
]);
?>
<script>
    // $(function() {
    //     $( document ).tooltip();
    // });
</script>
<div class="container">
    <div>
        <div id="main">
            <div class="list-your-property-form">
                <h2 class="page-header"><?=$this->title ?></h2>
                <div class="content">
                    <div class="row">
                        <div class="span8">
                            <p>Заполните карточку объекта, чтобы добавить свою недвижимость в каталог. Мы промодерируем вашу заявку и, если не возникнет никаких проблем, вскоре ваша недвижимость появится на сайте и будет доступна для аренды.</p>
                        </div>
                    </div>

<!--                    --><?php //$form=$this->beginWidget('CActiveForm', array(
//                        'id'=>'realty-form',
//                        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
//                        'enableAjaxValidation'=>false,
//                    )); ?>
<!--                    <div class="row">-->
<!--                        <div class="span3" style="display:none">-->
<!--                            <h3><strong>1.</strong> <span>Кто вы?</span></h3>-->
<!---->
<!--                            <div class="control-group">-->
<!--                                --><?php //echo $form->labelEx($user,'name',array('class'=>'control-label')); ?>
<!--                                <div class="controls">-->
<!--                                    --><?php //echo $form->textField($user,'name'); ?>
<!--                                </div><!-- /.controls -->-->
<!--                                --><?php //echo $form->error($user,'name'); ?>
<!--                            </div><!-- /.control-group -->-->
<!---->
<!--                            <div class="control-group">-->
<!--                                --><?php //echo $form->labelEx($user,'phone',array('class'=>'control-label')); ?>
<!--                                <div class="controls">-->
<!--                                    --><?php //$this->widget('CMaskedTextField',array('model'=>$user,'attribute'=>'phone','mask'=>'+7?(999)999-99-99','htmlOptions'=> array('class'=>'','placeholder'=>'Введите телефон'))); ?>
<!--                                </div><!-- /.controls -->-->
<!--                                --><?php //echo $form->error($user,'phone'); ?>
<!--                            </div><!-- /.control-group -->-->
<!---->
<!--                            <div class="control-group">-->
<!--                                --><?php //echo $form->labelEx($user,'email',array('class'=>'control-label')); ?>
<!--                                <div class="controls">-->
<!--                                    --><?php //echo $form->textField($user,'email'); ?>
<!--                                </div><!-- /.controls -->-->
<!--                                --><?php //echo $form->error($user,'email'); ?>
<!--                            </div><!-- /.control-group -->-->
<!--                        </div><!-- /.span4 -->-->
<!---->
<!--                        <div class="span5">-->
<!--                            <h3><strong>1.</strong> <span>Что сдаем?</span></h3>-->
<!---->
<!--                            <div class="property-type control-group">-->
<!--                                <label class="control-label" for="inputCountry">-->
<!--                                    Страна-->
<!--                                </label>-->
<!--                                <div class="controls">-->
<!--                                    --><?php //echo CHtml::dropDownList('country', 1,
//                                        CHtml::listData(Country::model()->findAll(),
//                                            'id_country', 'name'))
//                                    ?>
<!--                                </div><!-- /.controls -->-->
<!--                            </div><!-- /.control-group -->-->
<!---->
<!--                            <div class="property-type control-group" style="margin-left: 4%;">-->
<!--                                <label class="control-label" for="inputCity">-->
<!--                                    Город-->
<!--                                </label>-->
<!--                                <div class="controls">-->
<!--                                    --><?php //echo CHtml::dropDownList('city', 1,
//                                        CHtml::listData(City::model()->findAll("Country_id_country=1"),
//                                            'id_city', 'name'))
//                                    ?>
<!--                                </div><!-- /.controls -->-->
<!--                            </div><!-- /.control-group -->-->
<!---->
<!--                            <div class="control-group" style="float:left; width: 60%">-->
<!--                                --><?php //echo $form->labelEx($model,'street',array('class'=>'control-label')); ?>
<!--                                <div class="controls">-->
<!--                                    --><?php //echo $form->textField($model,'street'); ?>
<!--                                </div><!-- /.controls -->-->
<!--                                --><?php //echo $form->error($model,'street'); ?>
<!--                            </div><!-- /.control-group -->-->
<!---->
<!--                            <div class="control-group" style="float:left; width: 11%; margin-left: 2%">-->
<!--                                --><?php //echo $form->labelEx($model,'house',array('class'=>'control-label')); ?>
<!--                                <div class="controls">-->
<!--                                    --><?php //echo $form->textField($model,'house'); ?>
<!--                                </div><!-- /.controls -->-->
<!--                                --><?php //echo $form->error($model,'house'); ?>
<!--                            </div><!-- /.control-group -->-->
<!---->
<!--                            <div class="control-group" style="float:left; width: 11%; margin-left: 2%">-->
<!--                                --><?php //echo $form->labelEx($model,'additional',array('class'=>'control-label')); ?>
<!--                                <div class="controls">-->
<!--                                    --><?php //echo $form->textField($model,'additional'); ?>
<!--                                </div><!-- /.controls -->-->
<!--                                --><?php //echo $form->error($model,'additional'); ?>
<!--                            </div><!-- /.control-group -->-->
<!---->
<!--                            <div class="control-group" style="float:left; width: 11%; margin-left: 3%">-->
<!--                                --><?php //echo $form->labelEx($model,'flat',array('class'=>'control-label')); ?>
<!--                                <div class="controls">-->
<!--                                    --><?php //echo $form->textField($model,'flat'); ?>
<!--                                </div><!-- /.controls -->-->
<!--                                --><?php //echo $form->error($model,'flat'); ?>
<!--                            </div><!-- /.control-group -->-->
<!---->
<!---->
<!---->
<!--                            <div class="contract-type control-group">-->
<!--                                <label class="control-label" for="inputPropertyContractType">-->
<!--                                    Тип жилья-->
<!--                                </label>-->
<!--                                <div class="controls">-->
<!--                                    <select id="inputPropertyContractType" name="realty_type">-->
<!--                                        <option id="apartment2" value="0">Квартира</option>-->
<!--                                        <option id="apartment3" value="1">Дом</option>-->
<!--                                    </select>-->
<!--                                </div><!-- /.controls -->-->
<!--                            </div><!-- /.control-group -->-->
<!---->
<!--                            <div class="bedrooms control-group">-->
<!--                                <label class="control-label" for="inputPropertyBedrooms">-->
<!--                                    Спальные места-->
<!--                                    <span class="form-required" title="This field is required.">*</span>-->
<!--                                </label>-->
<!--                                <div class="controls">-->
<!--                                    <input type="text" name="Params[1]" id="inputPropertyBedrooms">-->
<!--                                </div><!-- /.controls -->-->
<!--                            </div><!-- /.control-group -->-->
<!---->
<!--                            <div class="bathrooms control-group">-->
<!--                                <label class="control-label" for="inputPropertyBathrooms">-->
<!--                                    Кол-во комнат-->
<!--                                    <span class="form-required" title="This field is required.">*</span>-->
<!--                                </label>-->
<!--                                <div class="controls">-->
<!--                                    <input type="text" name="Params[3]" id="inputPropertyBathrooms">-->
<!--                                </div><!-- /.controls -->-->
<!--                            </div><!-- /.control-group -->-->
<!---->
<!--                            <div class="area control-group">-->
<!--                                <label class="control-label" for="inputPropertyArea">-->
<!--                                    Метраж-->
<!--                                    <span class="form-required" title="This field is required.">*</span>-->
<!--                                </label>-->
<!--                                <div class="controls">-->
<!--                                    <input type="text" name="Params[2]" id="inputPropertyArea" placeholder="в кв. метрах">-->
<!--                                </div><!-- /.controls -->-->
<!--                            </div><!-- /.control-group -->-->
<!---->
<!--                            <div class="area control-group">-->
<!--                                --><?php //echo $form->labelEx($model,'lock',array('class'=>'control-label')); ?>
<!--                                <div class="controls">-->
<!--                                    --><?php //echo $form->textField($model,'lock'); ?>
<!--                                </div><!-- /.controls -->-->
<!--                                --><?php //echo $form->error($model,'lock'); ?>
<!--                            </div><!-- /.control-group -->-->
<!---->
<!--                            <div class="price control-group">-->
<!--                                --><?php //echo $form->labelEx($model,'price',array('class'=>'control-label')); ?>
<!--                                <div class="controls">-->
<!--                                    --><?php //echo $form->textField($model,'price'); ?>
<!--                                </div><!-- /.controls -->-->
<!--                                --><?php //echo $form->error($model,'price'); ?>
<!--                            </div><!-- /.control-group -->-->
<!--                        </div><!-- /.span4 -->-->
<!---->
<!---->
<!--                        <div class="span3">-->
<!--                            <h3><strong>2.</strong> <span>Описание</span></h3>-->
<!--                            --><?php //echo $form->label($model,'name') ?>
<!--                            --><?php //echo $form->textField($model, 'name', array('placeholder'=>'Квартира в центре СПб с джакузи')) ?>
<!--                            --><?php //echo $form->textArea($model, 'description', array('placeholder'=>'Описание квартиры','style'=>'height:150px')); ?>
<!--                            --><?php //echo $form->textArea($model, 'rules', array('placeholder'=>'Правила проживания','style'=>'height:150px')); ?>
<!--                        </div><!-- /.span3 -->-->
<!--                        <div class="span4">-->
<!--                            <h3><strong></strong> <span>Карта</span></h3>-->
<!--                            <div id="mapq" style="width:90%;height:360px"></div>-->
<!--                            --><?php //echo $form->hiddenField($model, 'longitude');?>
<!--                            --><?php //echo $form->hiddenField($model, 'latitude'); ?>
<!--                        </div><!-- /.span4 -->-->
<!--                    </div><!-- /.row -->-->
<!--                    <hr>-->
<!--                    <div class="row">-->
<!--                        <div class="span4">-->
<!--                            <h3><strong>3.</strong> <span>В квартире</span></h3>-->
<!--                            --><?php //echo CHtml::checkBoxList('Additions', '',  CHtml::listData(Additions::model()->findAll(),
//                                'id_additions', 'name'), array('separator' => '')) ?>
<!--                        </div><!-- /.span3 -->-->
<!--                        <div class="span4">-->
<!--                            <h3><strong>4.</strong> <span>Фотографии</span></h3>-->
<!--                            --><?php
//                            $this->widget('CMultiFileUpload', array(
//                                'name'=>'photos',
//                                'accept'=>'jpg|gif|png',
//                                'options'=>array(
//                                    // 'onFileSelect'=>'function(e, v, m){ alert("onFileSelect - "+v) }',
//                                    // 'afterFileSelect'=>'function(e, v, m){ alert("afterFileSelect - "+v) }',
//                                    // 'onFileAppend'=>'function(e, v, m){ alert("onFileAppend - "+v) }',
//                                    // 'afterFileAppend'=>'function(e, v, m){ alert("afterFileAppend - "+v) }',
//                                    // 'onFileRemove'=>'function(e, v, m){ alert("onFileRemove - "+v) }',
//                                    // 'afterFileRemove'=>'function(e, v, m){ alert("afterFileRemove - "+v) }',
//                                ),
//                                'denied'=>'File is not allowed',
//                                'max'=>10, // max 10 files
//
//
//                            ));
//                            ?>
<!--                        </div>-->
<!--                        <div class="span4">-->
<!--                            <h3><strong>5.</strong> <span>Вам требуются услуги?</span></h3>-->
<!--                            --><?php //echo CHtml::checkBoxList('OwnerServices', '',  CHtml::listData(OwnerServices::model()->findAll(),
//                                'id', function($service){
//                                    return '<span data-toggle="tooltip" data-placement="right" title="'.$service->description.'">'.$service->name.' ('.$service->price.' руб.)</span>';
//                                }), array('separator' => '')) ?>
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="row" style="text-align:center">-->
<!--                        --><?php //echo CHtml::submitButton($model->isNewRecord ? 'Отправить заявку' : 'Сохранить',array('class'=>'btn btn-large btn-primary')); ?>
<!--                    </div>-->
<!--                    --><?php //$this->endWidget(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
