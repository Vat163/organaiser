<?php
/* @var $this RecordsController */
/* @var $model Records */

$this->breadcrumbs=array(
	'Records'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Records', 'url'=>array('index')),
	array('label'=>'Create Records', 'url'=>array('create')),
	array('label'=>'View Records', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Records', 'url'=>array('admin')),
);
?>

<h1>Update Records <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>