<?php



class AbAddressesMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.AbAddressesMapBuilder';

	
	private $dbMap;

	
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap('propel');

		$tMap = $this->dbMap->addTable('ab_addresses');
		$tMap->setPhpName('AbAddresses');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ab_addresses_id_seq');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('FULLNAME', 'Fullname', 'string', CreoleTypes::VARCHAR, true, null);

		$tMap->addColumn('EMAIL_ADDRESS', 'EmailAddress', 'string', CreoleTypes::VARCHAR, true, null);

		$tMap->addColumn('HOME_ADDRESS', 'HomeAddress', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('PHONE', 'Phone', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addForeignKey('AB_CATEGORY_ID', 'AbCategoryId', 'int', CreoleTypes::INTEGER, 'ab_category', 'ID', true, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 