<?php
class WebSetting extends CApplicationComponent
{
    function getValue($key)
    {
        $model = Options::model()->findByAttributes(array('name'=>$key));
        return $model->value;
    }
}
?>