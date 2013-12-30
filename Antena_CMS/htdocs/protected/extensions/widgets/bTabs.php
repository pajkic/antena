<?php
class bTabs extends CWidget
{
    /**
     * @var $data
	 * @var $block
     */
    public $data;
	public $block;
	
	
    public function run()
    {
    	$this->render('bTabs',array('data'=>$this->data,'block'=>$this->block));
    }
}
?>