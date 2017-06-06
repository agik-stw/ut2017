<?php
Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('@backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('@console', dirname(dirname(__DIR__)) . '/console');
Yii::setAlias('@backendweb', dirname(dirname(__DIR__)) . '/backend/web');
Yii::setAlias('@frontendweb', dirname(dirname(__DIR__)) . '/frontend/web');

//alias frontend
Yii::setAlias('@f_vendor', dirname(dirname(__DIR__)) . '/frontend/web/vendor');
Yii::setAlias('@f_bower', dirname(dirname(__DIR__)) . '/frontend/web/vendor/bower');
Yii::setAlias('@f_inspinia', dirname(dirname(__DIR__)) . '/frontend/web/main/inspinia');

//alias backend
Yii::setAlias('@b_vendor', dirname(dirname(__DIR__)) . '/backend/web/vendor');
Yii::setAlias('@b_bower', dirname(dirname(__DIR__)) . '/backend/web/vendor/bower');
Yii::setAlias('@b_inspinia', dirname(dirname(__DIR__)) . '/backend/web/main/inspinia');
Yii::setAlias('@b_appjs', dirname(dirname(__DIR__)) . '/backend/web/appjs');

//alias db2
Yii::setAlias('@db2', dirname(dirname(__DIR__)) . '/db2');