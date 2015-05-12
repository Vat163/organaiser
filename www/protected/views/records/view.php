<?php
/* @var $this RecordsController */
/* @var $model Records */

$this->breadcrumbs=array(
	'Records'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Records', 'url'=>array('index')),
	array('label'=>'Create Records', 'url'=>array('create')),
	array('label'=>'Update Records', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Records', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Records', 'url'=>array('admin')),
);
?>

<h1>View Records #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'content',
		'start_date',
		'finish_date',
		'url',
		'user_id',
	),
)); ?>
