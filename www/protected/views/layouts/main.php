<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="language" content="ru">


        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/font-awesome.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">

        <!-- bootstrap -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css">
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-2.1.3.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.js" type="text/javascript"></script>
        
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body>
        <div class="navbar navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#responsive-menu">
                        <span class="sr-only">Открыть навигацию</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="row">
                <div class="collapse navbar-collapse col-sm-12" id="responsive-menu">
                    <?php $user = User::model()->findByPk(Yii::app()->user->id); ?>
                    <?php $this->widget('zii.widgets.CMenu',array(
                        'htmlOptions' => array('class' => 'nav navbar-nav'),
                        'items'=>array(
                            array(
                                'encodeLabel'=>false,'label'=>'<span class="fa fa-home"></span> Home', 'url'=>array('/site/index')),
                            // Навигация для гостя
                            array(
                                'encodeLabel'=>false,'label'=>'<span class="fa fa-bullhorn"></span> О сайте', 'url'=>array('/site/page', 'view'=>'about'), 'visible'=>Yii::app()->user->isGuest),
                            // Навигация для зарегистрированного пользователя
                            array(
                                'encodeLabel'=>false,'label'=>'<span class="fa fa-pencil-square-o"></span> Создать задачу', 'url'=>array('/site/new_task'), 'visible'=>!Yii::app()->user->isGuest),
                            array(
                                'encodeLabel'=>false,'label'=>'<span class="fa fa-comments-o"></span> Чат', 'url'=>array('/site/chat'), 'visible'=>!Yii::app()->user->isGuest), 
                            
                               
                            
                            // Для админа
                            
                            array(
                                'label'=>'<span class="fa fa-trophy"></span> Управление <b class="caret"></b>',
                                'encodeLabel'=>false,
                                'url'=>'', 
                                'visible'=>!Yii::app()->user->isGuest && $user->admin==1,
                                'submenuOptions'=>array('class'=>'dropdown-menu'),
                                'linkOptions'=>array(
                                    'class'=>'dropdown-toggle', 
                                    'data-toggle'=>'dropdown',
                                ),
                                'items'=>array(
                                    array('label'=>'Редактировать организацию', 'url'=>array('/user/user_edit'), 'visible'=>!Yii::app()->user->isGuest && $user->admin==1),
                                    array('label'=>'Учет времени сотрудников', 'url'=>array('/site/organisation_info'), 'visible'=>!Yii::app()->user->isGuest && $user->admin==1), 
                                )
                            ), 
                         
                            
                            
                            array(
                                'label'=>'<span class="fa fa-user"></span> '.Yii::app()->user->name .' <b class="caret"></b>',
                                'encodeLabel'=>false,
                                'url'=>'', 
                                'visible'=>!Yii::app()->user->isGuest,
                                'submenuOptions'=>array('class'=>'dropdown-menu'),
                                'linkOptions'=>array(
                                    'class'=>'dropdown-toggle', 
                                    'data-toggle'=>'dropdown',
                                ),
                                'items'=>array(
                                    array('label'=>'Редактировать профиль', 'url'=>array('/user/profile'), 'visible'=>!Yii::app()->user->isGuest), 
                                    array('label'=>'Выйти', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                                    )
                            ), 
                            
                            
                            
                            
                            
                           

                            array(
                                'label'=>'<span class="fa fa-level-up"></span> Вход', 
                                'url'=>array('/site/login'), 
                                'encodeLabel'=>false,
                                'visible'=>Yii::app()->user->isGuest),
                            array(
                                'encodeLabel'=>false,'label'=>'<span class="fa fa-child"></span> Регистрация', 'url'=>array('/user/registration'), 'visible'=>Yii::app()->user->isGuest),
                           
                        ),
                    )); ?>
                </div>
                </div>
            </div>
        </div>
        
    <div class="container" id="page">

        <?php if(isset($this->breadcrumbs)):?>
            <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                'links'=>$this->breadcrumbs,
            )); ?><!-- breadcrumbs -->
        <?php endif?>

        <?php echo $content; ?>

        <div class="clear"></div>


    </div>
    <!-- page -->
        <div class="footer">
            Онлайн Органайзер для Организаций v1.0 <br/>
            Copyright &copy; <?php echo date('Y'); ?> All Rights Reserved<br/>
            <?php echo Yii::powered(); ?><br>
            <a href="/site/contact">Связаться с нами</a>
        </div>
        <!-- footer -->

    </body>
</html>
