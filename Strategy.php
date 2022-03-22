<?php

    interface PaymentInterface
    {
        public function payment($sum, $phone);
    }

    class Qiwi implements PaymentInterface
    {
        public function payment($sum, $phone)
        {
            return "Платеж на сумму $sum через систему Qiwi успешно осуществлен";
        }
    }

    class Yandex implements PaymentInterface
    {
        public function payment($sum, $phone)
        {
            return "Платеж на сумму $sum через систему Yandex успешно осуществлен";
        }
    }

    class WebMoney implements PaymentInterface
    {
        public function payment($sum, $phone)
        {
            return "Платеж на сумму $sum через систему WebMoney успешно осуществлен";
        }
    }


    class PaymentManager
    {
        protected $strategy;

        public function __construct(PaymentInterface $strategy)
        {
            $this->strategy = $strategy;
        }

        public function setStrategy(PaymentInterface $strategy)
        {
            $this->strategy = $strategy;
        }

        public function runPayment($sum, $phone)
        {
            $this->strategy->payment ($sum, $phone);
        }
    }


    $pay = new PaymentManager();
    $pay->setStrategy (new WebMoney);
    $pay->runPayment (10000, '+375336453045');
