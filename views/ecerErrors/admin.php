<?php
$this->setPageTitle(Yii::t('EdifactDataModule.model', 'Alerts'));

?>
<div class="clearfix">
    <div class="btn-toolbar pull-left">
        <div class="btn-group">
            <h1>
                <i class="icon-warning-sign"></i>
                <?php echo Yii::t('EdifactDataModule.model', 'Alerts');?>            </h1>
        </div>
    </div>
</div>

<?php Yii::beginProfile('EcerErrors.view.grid'); ?>


<?php
$this->widget('TbGridView',
    array(
        'id' => 'ecer-errors-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'template' => '{items}{pager}',
        'pager' => array(
            'class' => 'TbPager',
            'displayFirstAndLast' => true,
        ),
        'columns' => array(
                array('name'=>'ecnt_terminal'),
                array('name'=>'ecnt_move_code'),
                array('name'=>'ecnt_container_nr'),
                array('name'=>'ecnt_datetime'),
                array('name'=>'ecnt_operation'),
                array('name'=>'ecnt_transport_id'),
                array('name'=>'ecnt_length'),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'ecer_ecnt_id',
                'editable' => array(
                    'type' => 'select',
                    'url' => $this->createUrl('/edifactdata/ecerErrors/editableSaver'),
                    'source' => CHtml::listData(EcntContainer::model()->findAll(array('limit' => 1000)), 'ecnt_id', 'itemLabel'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'ecer_descr',
                'editable' => array(
                    'type' => 'textarea',
                    'url' => $this->createUrl('/edifactdata/ecerErrors/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'ecer_notes',
                'editable' => array(
                    'type' => 'textarea',
                    'url' => $this->createUrl('/edifactdata/ecerErrors/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                    'class' => 'editable.EditableColumn',
                    'name' => 'ecer_status',
                    'editable' => array(
                        'type' => 'select',
                        'url' => $this->createUrl('/edifactdata/ecerErrors/editableSaver'),
                        'source' => $model->getEnumFieldLabels('ecer_status'),
                        //'placement' => 'right',
                    ),
                   'filter' => $model->getEnumFieldLabels('ecer_status'),
                ),

            array(
                'class' => 'TbButtonColumn',
                'buttons' => array(
                    'view' => array('visible' => 'Yii::app()->user->checkAccess("Edifactdata.EcerErrors.View")'),
                    'update' => array('visible' => 'FALSE'),
                    'delete' => array('visible' => 'FALSE'),
                ),
                'viewButtonUrl' => 'Yii::app()->controller->createUrl("ecntContainer/view", array("ecnt_id" => $data->ecer_ecnt_id))',
                'viewButtonOptions'=>array('data-toggle'=>'tooltip'),   
            ),
        )
    )
);
?>
<?php Yii::endProfile('EcerErrors.view.grid'); ?>