<?php

	class Adapter
	{
		public $squareArea;
		public $circleArea;

		public function __construct()
		{
			$this->squareArea = new SquareAreaNew();
			$this->circleArea = new CircleAreaNew();
		}

		public function calculateSquare()
		{
			echo($this->squareArea->squareAreaCalc(12));
		}

		public function calculateCircle()
		{
			echo($this->circleArea->circleAreaCalc(12));
		}
	}

	/**
	 * ИНТЕРФЕЙСЫ
	 */
	interface ISquare
	{
		function squareAreaCalc(int $sideSquare): float;
	}

	interface ICircle
	{
		function circleAreaCalc(int $circumference): float;
	}

	/**
	 * СТАРЫЕ КЛАССЫ ДЛЯ РАСЧЕТА ПЛОЩАДИ
	 */
	class SquareArea implements ISquare
	{
		public function squareAreaCalc(int $sideSquare): float
		{
			$area = $sideSquare ** 2;

			return $area;
		}
	}

	class CircleArea implements ICircle
	{
		public function circleAreaCalc(int $circumference): float
		{
			$area = M_PI * ($circumference ** 2);

			return $area;
		}
	}

	/**
	 * НОВЫЕ КЛАССЫ ДЛЯ РАСЧЕТА ПЛОЩАДИ
	 */
	class SquareAreaLib
	{
		public function getSquareArea(int $diagonal)
		{
			return ($diagonal ** 2) / 2;
		}
	}

	class CircleAreaLib
	{
		public function getCircleArea(int $diagonal)
		{
			return (M_PI * $diagonal ** 2) / 4;
		}
	}


	/**
	 * КЛАССЫ-АДАПТЕРЫ ДЛЯ РАСЧЕТА ПЛОЩАДИ
	 */
	class SquareAreaNew implements ISquare
	{
		protected $adapterObj;

		public function __construct()
		{
			$this->adapterObj = new SquareAreaLib();
		}

		public function squareAreaCalc(int $sideSquare): float
		{
			return $this->adapterObj->getSquareArea($sideSquare);
		}
	}


	class CircleAreaNew implements ICircle
	{
		protected $adapterObj;

		public function __construct()
		{
			$this->adapterObj = new CircleAreaLib();
		}

		public function circleAreaCalc(int $circumference): float
		{
			return $this->adapterObj->getCircleArea($circumference);
		}
	}