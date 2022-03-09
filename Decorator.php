<?php

	class Decorator
	{
		public function send()
		{
			$notify = new SMS('sms', new Email('email', new Chrome('chrome')));
			$notify->sendMessage();
		}
	}

	interface NotificationInterface
	{
		public function sendMessage();
	}

	trait sendMessageTrait
	{
		protected $type;
		protected $notification;

		public function __construct($type = 'default', $notification = null)
		{
			$this->type = $type;
			$this->notification = $notification;
		}

		public function sendMessage()
		{
			echo("Сообщение методом '$this->type' отправлено" . "<br>");
			if (!empty($this->notification)) $this->notification->sendMessage();
		}
	}

	class SMS implements NotificationInterface
	{
		use sendMessageTrait;
	}


	class Email implements NotificationInterface
	{
		use sendMessageTrait;
	}


	class Chrome implements NotificationInterface
	{
		use sendMessageTrait;
	}


