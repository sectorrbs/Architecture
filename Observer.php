<?php

    interface Observer
    {
        public function handle();
    }

    abstract class Subject
    {
        protected $observers = [];

        public function attach(Observer $observer)
        {
            if (!in_array ($observer, $this->observers)) $this->observers[] = $observer;
        }

        public function detach(Observer $observer)
        {
            foreach ($this->observers as $element) {
                if ($element === $observer) unset($element, $this->observers);
            }
        }

        public function notification()
        {
            foreach ($this->observers as $observer) {
                $observer->handle ();
            }
        }
    }


    class HandHunter extends Subject
    {
        protected $name;

        public function setNewVacancy($name)
        {
            $this->name = $name;
            $this->notification ();
        }
    }


    class User implements Observer
    {
        protected $name;
        protected $email;
        protected $experience;

        public function __construct($name, $email, $experience)
        {
            $this->name = $name;
            $this->email = $email;
            $this->experience = $experience;
        }

        public function handle()
        {
            #логика оповещения пользователя о новой вакансии
        }
    }


    $handHunter = new HandHunter();

    $user_1 = new User('name_1', 'mail_1', 'work_1');
    $user_2 = new User('name_2', 'mail_2', 'work_2');
    $user_3 = new User('name_3', 'mail_3', 'work_3');

    $handHunter->attach ($user_1);   #добавление пользователя в прослушиватели
    $handHunter->attach ($user_3);   #добавление пользователя в прослушиватели
    $handHunter->setNewVacancy ('Программист');   #добавление новой вакансии



