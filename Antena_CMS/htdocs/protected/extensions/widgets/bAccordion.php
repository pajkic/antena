<?php
class bAccordion extends CWidget
{
    /**
     * @var $data
	 * @var $block
     */
    public $data;
	public $block;
	
	
    public function run()
    {
    	$this->render('bAccordion',array('data'=>$this->data,'block'=>$this->block));
    }
}
?>