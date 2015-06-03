<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="ru">

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div>
	<!-- header -->

	<div id="mainmenu">
		<?php $user = User::model()->findByPk(Yii::app()->user->id); ?>
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'О сайте', 'url'=>array('/site/page', 'view'=>'about'), 'visible'=>Yii::app()->user->isGuest),
				
				array('label'=>'Вход', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>'Регистрация', 'url'=>array('/user/registration'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>'Создать задачу', 'url'=>array('/site/new_task'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Редактировать профиль', 'url'=>array('/site/profile'), 'visible'=>!Yii::app()->user->isGuest), 
                array('label'=>'Добавить/удалить пользователя', 'url'=>array('/user/user_edit'), 'visible'=>!Yii::app()->user->isGuest && $user->admin==1), 
                array('label'=>'Учет времени сотрудников', 'url'=>array('/site/organisation_info'), 'visible'=>!Yii::app()->user->isGuest && $user->admin==1), 
                
				array('label'=>'Выйти ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div>
	<!-- mainmenu -->
	
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
	    Онлайн Органайзер для Организаций v1.0 <br/>
		Copyright &copy; <?php echo date('Y'); ?> All Rights Reserved<br/>
		<?php echo Yii::powered(); ?><br>
		<a href="/site/contact">Связаться с нами</a>
	</div>
	<!-- footer -->

</div>
<!-- page -->

</body>
</html>
