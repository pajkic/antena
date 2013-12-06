<?php
class bMenu extends CWidget
{
    /**
     * @var $data
     */
    public $data;
	
	
    public function run()
    {
        $this->render('bMenu',array('data'=>$this->data));
    }
}
?>
