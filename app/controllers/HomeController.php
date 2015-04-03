<?php

class HomeController extends BaseController {

	public function home()
	{	
		Mail::send('emails.auth.test', array('name' => 'Sajib'), function($message){
			$message->to('sajibcste@gmail.com', 'Monirul Islam')->subject('Test email');
		});

		return View::make('home');
	}

}
