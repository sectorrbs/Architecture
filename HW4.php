<?php

	interface AbstractFactoryInterface
	{
		public function initDB(): DBFactoryInterface;
	}

	interface DBFactoryInterface
	{
		public function DBConnection(): array;

		public function DBRecrord(): array;

		public function DBQueryBuilder(): array;
	}

	class MySQLFactory implements AbstractFactoryInterface
	{
		public function initDB() : DBFactoryInterface
		{
			return new MySQL();
		}
	}

	class PostgreSQLFactory implements AbstractFactoryInterface
	{
		public function initDB() : DBFactoryInterface
		{                                                                   
			return new PostgreSQL;
		}
	}

	class OracleFactory implements AbstractFactoryInterface
	{
		public function initDB() : DBFactoryInterface
		{
			return new Oracle;
		}
	}

	class MySQL implements DBFactoryInterface
	{

		public function DBConnection(): array
		{
			return [];
		}

		public function DBRecrord(): array
		{
			return [];
		}

		public function DBQueryBuilder(): array
		{
			return [];
		}
	}

	class PostgreSQL implements DBFactoryInterface
	{

		public function DBConnection(): array
		{
			return [];
		}

		public function DBRecrord(): array
		{
			return [];
		}

		public function DBQueryBuilder(): array
		{
			return [];
		}
	}

	class Oracle implements DBFactoryInterface
	{

		public function DBConnection(): array
		{
			return [];
		}

		public function DBRecrord(): array
		{
			return [];
		}

		public function DBQueryBuilder(): array
		{
			return [];
		}
	}


	$db = new MySQLFactory();

	$db->initDB()->DBConnection();