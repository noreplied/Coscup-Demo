<?php



class AbCategoryMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.AbCategoryMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ab_category');
		$tMap->setPhpName('AbCategory');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ab_category_id_seq');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CAT_NAME', 'CatName', 'string', CreoleTypes::VARCHAR, true, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 