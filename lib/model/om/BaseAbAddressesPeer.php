<?php


abstract class BaseAbAddressesPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ab_addresses';

	
	const CLASS_DEFAULT = 'lib.model.AbAddresses';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ab_addresses.ID';

	
	const FULLNAME = 'ab_addresses.FULLNAME';

	
	const EMAIL_ADDRESS = 'ab_addresses.EMAIL_ADDRESS';

	
	const HOME_ADDRESS = 'ab_addresses.HOME_ADDRESS';

	
	const PHONE = 'ab_addresses.PHONE';

	
	const AB_CATEGORY_ID = 'ab_addresses.AB_CATEGORY_ID';

	
	const CREATED_AT = 'ab_addresses.CREATED_AT';

	
	const UPDATED_AT = 'ab_addresses.UPDATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Fullname', 'EmailAddress', 'HomeAddress', 'Phone', 'AbCategoryId', 'CreatedAt', 'UpdatedAt', ),
		BasePeer::TYPE_COLNAME => array (AbAddressesPeer::ID, AbAddressesPeer::FULLNAME, AbAddressesPeer::EMAIL_ADDRESS, AbAddressesPeer::HOME_ADDRESS, AbAddressesPeer::PHONE, AbAddressesPeer::AB_CATEGORY_ID, AbAddressesPeer::CREATED_AT, AbAddressesPeer::UPDATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'fullname', 'email_address', 'home_address', 'phone', 'ab_category_id', 'created_at', 'updated_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Fullname' => 1, 'EmailAddress' => 2, 'HomeAddress' => 3, 'Phone' => 4, 'AbCategoryId' => 5, 'CreatedAt' => 6, 'UpdatedAt' => 7, ),
		BasePeer::TYPE_COLNAME => array (AbAddressesPeer::ID => 0, AbAddressesPeer::FULLNAME => 1, AbAddressesPeer::EMAIL_ADDRESS => 2, AbAddressesPeer::HOME_ADDRESS => 3, AbAddressesPeer::PHONE => 4, AbAddressesPeer::AB_CATEGORY_ID => 5, AbAddressesPeer::CREATED_AT => 6, AbAddressesPeer::UPDATED_AT => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'fullname' => 1, 'email_address' => 2, 'home_address' => 3, 'phone' => 4, 'ab_category_id' => 5, 'created_at' => 6, 'updated_at' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/AbAddressesMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.AbAddressesMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = AbAddressesPeer::getTableMap();
			$columns = $map->getColumns();
			$nameMap = array();
			foreach ($columns as $column) {
				$nameMap[$column->getPhpName()] = $column->getColumnName();
			}
			self::$phpNameMap = $nameMap;
		}
		return self::$phpNameMap;
	}
	
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants TYPE_PHPNAME, TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	
	public static function alias($alias, $column)
	{
		return str_replace(AbAddressesPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(AbAddressesPeer::ID);

		$criteria->addSelectColumn(AbAddressesPeer::FULLNAME);

		$criteria->addSelectColumn(AbAddressesPeer::EMAIL_ADDRESS);

		$criteria->addSelectColumn(AbAddressesPeer::HOME_ADDRESS);

		$criteria->addSelectColumn(AbAddressesPeer::PHONE);

		$criteria->addSelectColumn(AbAddressesPeer::AB_CATEGORY_ID);

		$criteria->addSelectColumn(AbAddressesPeer::CREATED_AT);

		$criteria->addSelectColumn(AbAddressesPeer::UPDATED_AT);

	}

	const COUNT = 'COUNT(ab_addresses.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ab_addresses.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AbAddressesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AbAddressesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = AbAddressesPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}
	
	public static function doSelectOne(Criteria $criteria, $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = AbAddressesPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return AbAddressesPeer::populateObjects(AbAddressesPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			AbAddressesPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = AbAddressesPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinAbCategory(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AbAddressesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AbAddressesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AbAddressesPeer::AB_CATEGORY_ID, AbCategoryPeer::ID);

		$rs = AbAddressesPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAbCategory(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AbAddressesPeer::addSelectColumns($c);
		$startcol = (AbAddressesPeer::NUM_COLUMNS - AbAddressesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AbCategoryPeer::addSelectColumns($c);

		$c->addJoin(AbAddressesPeer::AB_CATEGORY_ID, AbCategoryPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AbAddressesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AbCategoryPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getAbCategory(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addAbAddresses($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAbAddressess();
				$obj2->addAbAddresses($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AbAddressesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AbAddressesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AbAddressesPeer::AB_CATEGORY_ID, AbCategoryPeer::ID);

		$rs = AbAddressesPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AbAddressesPeer::addSelectColumns($c);
		$startcol2 = (AbAddressesPeer::NUM_COLUMNS - AbAddressesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		AbCategoryPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + AbCategoryPeer::NUM_COLUMNS;

		$c->addJoin(AbAddressesPeer::AB_CATEGORY_ID, AbCategoryPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AbAddressesPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = AbCategoryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getAbCategory(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addAbAddresses($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initAbAddressess();
				$obj2->addAbAddresses($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}

	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return AbAddressesPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(AbAddressesPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(AbAddressesPeer::ID);
			$selectCriteria->add(AbAddressesPeer::ID, $criteria->remove(AbAddressesPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$affectedRows = 0; 		try {
									$con->begin();
			$affectedRows += BasePeer::doDeleteAll(AbAddressesPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	 public static function doDelete($values, $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(AbAddressesPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof AbAddresses) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(AbAddressesPeer::ID, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public static function doValidate(AbAddresses $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(AbAddressesPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(AbAddressesPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		$res =  BasePeer::doValidate(AbAddressesPeer::DATABASE_NAME, AbAddressesPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = AbAddressesPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(AbAddressesPeer::DATABASE_NAME);

		$criteria->add(AbAddressesPeer::ID, $pk);


		$v = AbAddressesPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria();
			$criteria->add(AbAddressesPeer::ID, $pks, Criteria::IN);
			$objs = AbAddressesPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseAbAddressesPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/AbAddressesMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.AbAddressesMapBuilder');
}
