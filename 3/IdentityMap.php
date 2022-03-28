<?php


	namespace Model\Repository;


	class IdentityMap
	{
		private $identityMap = [];

		public function add(string $key, array $arr)
		{
			$this->identityMap[$key][] = $arr;
		}

		public function get(string $key)
		{
			if (isset($this->identityMap[$key])) {
				return $this->identityMap[$key];
			} else {
				throw new Exception('Not found');
			}
		}
	}