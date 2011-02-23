<?php


abstract class BaseAbAddresses extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $fullname;


	
	protected $email_address;


	
	protected $home_address;


	
	protected $phone;


	
	protected $ab_category_id;


	
	protected $created_at;


	
	protected $updated_at;

	
	protected $aAbCategory;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getFullname()
	{

		return $this->fullname;
	}

	
	public function getEmailAddress()
	{

		return $this->email_address;
	}

	
	public function getHomeAddress()
	{

		return $this->home_address;
	}

	
	public function getPhone()
	{

		return $this->phone;
	}

	
	public function getAbCategoryId()
	{

		return $this->ab_category_id;
	}

	
	public function getCreatedAt()
	{

		return $this->created_at;
	}

	
	public function getUpdatedAt()
	{

		return $this->updated_at;
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = AbAddressesPeer::ID;
		}

	} 
	
	public function setFullname($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->fullname !== $v) {
			$this->fullname = $v;
			$this->modifiedColumns[] = AbAddressesPeer::FULLNAME;
		}

	} 
	
	public function setEmailAddress($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->email_address !== $v) {
			$this->email_address = $v;
			$this->modifiedColumns[] = AbAddressesPeer::EMAIL_ADDRESS;
		}

	} 
	
	public function setHomeAddress($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->home_address !== $v) {
			$this->home_address = $v;
			$this->modifiedColumns[] = AbAddressesPeer::HOME_ADDRESS;
		}

	} 
	
	public function setPhone($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->phone !== $v) {
			$this->phone = $v;
			$this->modifiedColumns[] = AbAddressesPeer::PHONE;
		}

	} 
	
	public function setAbCategoryId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->ab_category_id !== $v) {
			$this->ab_category_id = $v;
			$this->modifiedColumns[] = AbAddressesPeer::AB_CATEGORY_ID;
		}

		if ($this->aAbCategory !== null && $this->aAbCategory->getId() !== $v) {
			$this->aAbCategory = null;
		}

	} 
	
	public function setCreatedAt($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_at !== $v) {
			$this->created_at = $v;
			$this->modifiedColumns[] = AbAddressesPeer::CREATED_AT;
		}

	} 
	
	public function setUpdatedAt($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_at !== $v) {
			$this->updated_at = $v;
			$this->modifiedColumns[] = AbAddressesPeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->fullname = $rs->getString($startcol + 1);

			$this->email_address = $rs->getString($startcol + 2);

			$this->home_address = $rs->getString($startcol + 3);

			$this->phone = $rs->getString($startcol + 4);

			$this->ab_category_id = $rs->getInt($startcol + 5);

			$this->created_at = $rs->getInt($startcol + 6);

			$this->updated_at = $rs->getInt($startcol + 7);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating AbAddresses object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AbAddressesPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AbAddressesPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(AbAddressesPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(AbAddressesPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AbAddressesPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	protected function doSave($con)
	{
		$affectedRows = 0; 		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


												
			if ($this->aAbCategory !== null) {
				if ($this->aAbCategory->isModified()) {
					$affectedRows += $this->aAbCategory->save($con);
				}
				$this->setAbCategory($this->aAbCategory);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = AbAddressesPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AbAddressesPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			$this->alreadyInSave = false;
		}
		return $affectedRows;
	} 
	
	protected $validationFailures = array();

	
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


												
			if ($this->aAbCategory !== null) {
				if (!$this->aAbCategory->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAbCategory->getValidationFailures());
				}
			}


			if (($retval = AbAddressesPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AbAddressesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getFullname();
				break;
			case 2:
				return $this->getEmailAddress();
				break;
			case 3:
				return $this->getHomeAddress();
				break;
			case 4:
				return $this->getPhone();
				break;
			case 5:
				return $this->getAbCategoryId();
				break;
			case 6:
				return $this->getCreatedAt();
				break;
			case 7:
				return $this->getUpdatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AbAddressesPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFullname(),
			$keys[2] => $this->getEmailAddress(),
			$keys[3] => $this->getHomeAddress(),
			$keys[4] => $this->getPhone(),
			$keys[5] => $this->getAbCategoryId(),
			$keys[6] => $this->getCreatedAt(),
			$keys[7] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AbAddressesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setFullname($value);
				break;
			case 2:
				$this->setEmailAddress($value);
				break;
			case 3:
				$this->setHomeAddress($value);
				break;
			case 4:
				$this->setPhone($value);
				break;
			case 5:
				$this->setAbCategoryId($value);
				break;
			case 6:
				$this->setCreatedAt($value);
				break;
			case 7:
				$this->setUpdatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AbAddressesPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFullname($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setEmailAddress($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setHomeAddress($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPhone($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAbCategoryId($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCreatedAt($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setUpdatedAt($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AbAddressesPeer::DATABASE_NAME);

		if ($this->isColumnModified(AbAddressesPeer::ID)) $criteria->add(AbAddressesPeer::ID, $this->id);
		if ($this->isColumnModified(AbAddressesPeer::FULLNAME)) $criteria->add(AbAddressesPeer::FULLNAME, $this->fullname);
		if ($this->isColumnModified(AbAddressesPeer::EMAIL_ADDRESS)) $criteria->add(AbAddressesPeer::EMAIL_ADDRESS, $this->email_address);
		if ($this->isColumnModified(AbAddressesPeer::HOME_ADDRESS)) $criteria->add(AbAddressesPeer::HOME_ADDRESS, $this->home_address);
		if ($this->isColumnModified(AbAddressesPeer::PHONE)) $criteria->add(AbAddressesPeer::PHONE, $this->phone);
		if ($this->isColumnModified(AbAddressesPeer::AB_CATEGORY_ID)) $criteria->add(AbAddressesPeer::AB_CATEGORY_ID, $this->ab_category_id);
		if ($this->isColumnModified(AbAddressesPeer::CREATED_AT)) $criteria->add(AbAddressesPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(AbAddressesPeer::UPDATED_AT)) $criteria->add(AbAddressesPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AbAddressesPeer::DATABASE_NAME);

		$criteria->add(AbAddressesPeer::ID, $this->id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setFullname($this->fullname);

		$copyObj->setEmailAddress($this->email_address);

		$copyObj->setHomeAddress($this->home_address);

		$copyObj->setPhone($this->phone);

		$copyObj->setAbCategoryId($this->ab_category_id);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);


		$copyObj->setNew(true);

		$copyObj->setId(NULL); 
	}

	
	public function copy($deepCopy = false)
	{
				$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new AbAddressesPeer();
		}
		return self::$peer;
	}

	
	public function setAbCategory($v)
	{


		if ($v === null) {
			$this->setAbCategoryId(NULL);
		} else {
			$this->setAbCategoryId($v->getId());
		}


		$this->aAbCategory = $v;
	}


	
	public function getAbCategory($con = null)
	{
		if ($this->aAbCategory === null && ($this->ab_category_id !== null)) {
						include_once 'lib/model/om/BaseAbCategoryPeer.php';

			$this->aAbCategory = AbCategoryPeer::retrieveByPK($this->ab_category_id, $con);

			
		}
		return $this->aAbCategory;
	}

} 