<?php
class bContact extends CWidget
{
    /**
     * @var $data
     */
    public $data;
	public $block;
	

	
    public function run()
    {
    	$model=new ContactForm;
    	if(isset($_POST['ContactForm']))
		{
			
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";
				$body = '';
				foreach($model->attributes as $key => $value) {
					if ($key != 'verifyCode') $body .= ucfirst($key) . ": " . $value . "\n";
				}

				mail(Yii::app()->params['adminEmail'],$subject,$body,$headers);
				Yii::app()->user->setFlash('contact',Yii::t('app','Zahvaljujemo Vam. Potrudićemo se da Vam odgovorimo u najkraćem roku.'));
			}
		}
		
		
    	$content = PostDescription::model()->findByAttributes(array('post_id'=>$this->data['page_id'],'language_id'=>Language::model()->findByAttributes(array('lang' => Yii::app()->language))->id));
		$block_title = BlockDescription::model()->findByAttributes(array('block_id'=>$this->block['id'],'language_id' => Language::model()->findByAttributes(array('lang' => Yii::app()->language))->id))->title;
        $this->render('bContact',array('data'=>$content,'block'=>$this->block, 'block_title'=>$block_title, 'page_title'=>$this->data['title'], 'model'=>$model));
    }
}
?>