<?php


abstract class BaseArWebAccount extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $login;


	
	protected $password;


	
	protected $ar_party_id;


	
	protected $ar_office_id;


	
	protected $activate_at;


	
	protected $deactivate_at;


	
	protected $ar_params_id;

	
	protected $aArParty;

	
	protected $aArOffice;

	
	protected $aArParams;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getLogin()
	{

		return $this->login;
	}

	
	public function getPassword()
	{

		return $this->password;
	}

	
	public function getArPartyId()
	{

		return $this->ar_party_id;
	}

	
	public function getArOfficeId()
	{

		return $this->ar_office_id;
	}

	
	public function getActivateAt($format = 'Y-m-d')
	{

		if ($this->activate_at === null || $this->activate_at === '') {
			return null;
		} elseif (!is_int($this->activate_at)) {
						$ts = strtotime($this->activate_at);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [activate_at] as date/time value: " . var_export($this->activate_at, true));
			}
		} else {
			$ts = $this->activate_at;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getDeactivateAt($format = 'Y-m-d')
	{

		if ($this->deactivate_at === null || $this->deactivate_at === '') {
			return null;
		} elseif (!is_int($this->deactivate_at)) {
						$ts = strtotime($this->deactivate_at);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [deactivate_at] as date/time value: " . var_export($this->deactivate_at, true));
			}
		} else {
			$ts = $this->deactivate_at;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getArParamsId()
	{

		return $this->ar_params_id;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ArWebAccountPeer::ID;
		}

	} 
	
	public function setLogin($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->login !== $v) {
			$this->login = $v;
			$this->modifiedColumns[] = ArWebAccountPeer::LOGIN;
		}

	} 
	
	public function setPassword($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->password !== $v) {
			$this->password = $v;
			$this->modifiedColumns[] = ArWebAccountPeer::PASSWORD;
		}

	} 
	
	public function setArPartyId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->ar_party_id !== $v) {
			$this->ar_party_id = $v;
			$this->modifiedColumns[] = ArWebAccountPeer::AR_PARTY_ID;
		}

		if ($this->aArParty !== null && $this->aArParty->getId() !== $v) {
			$this->aArParty = null;
		}

	} 
	
	public function setArOfficeId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->ar_office_id !== $v) {
			$this->ar_office_id = $v;
			$this->modifiedColumns[] = ArWebAccountPeer::AR_OFFICE_ID;
		}

		if ($this->aArOffice !== null && $this->aArOffice->getId() !== $v) {
			$this->aArOffice = null;
		}

	} 
	
	public function setActivateAt($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [activate_at] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->activate_at !== $ts) {
			$this->activate_at = $ts;
			$this->modifiedColumns[] = ArWebAccountPeer::ACTIVATE_AT;
		}

	} 
	
	public function setDeactivateAt($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [deactivate_at] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->deactivate_at !== $ts) {
			$this->deactivate_at = $ts;
			$this->modifiedColumns[] = ArWebAccountPeer::DEACTIVATE_AT;
		}

	} 
	
	public function setArParamsId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->ar_params_id !== $v) {
			$this->ar_params_id = $v;
			$this->modifiedColumns[] = ArWebAccountPeer::AR_PARAMS_ID;
		}

		if ($this->aArParams !== null && $this->aArParams->getId() !== $v) {
			$this->aArParams = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->login = $rs->getString($startcol + 1);

			$this->password = $rs->getString($startcol + 2);

			$this->ar_party_id = $rs->getInt($startcol + 3);

			$this->ar_office_id = $rs->getInt($startcol + 4);

			$this->activate_at = $rs->getDate($startcol + 5, null);

			$this->deactivate_at = $rs->getDate($startcol + 6, null);

			$this->ar_params_id = $rs->getInt($startcol + 7);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating ArWebAccount object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ArWebAccountPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ArWebAccountPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ArWebAccountPeer::DATABASE_NAME);
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


												
			if ($this->aArParty !== null) {
				if ($this->aArParty->isModified()) {
					$affectedRows += $this->aArParty->save($con);
				}
				$this->setArParty($this->aArParty);
			}

			if ($this->aArOffice !== null) {
				if ($this->aArOffice->isModified()) {
					$affectedRows += $this->aArOffice->save($con);
				}
				$this->setArOffice($this->aArOffice);
			}

			if ($this->aArParams !== null) {
				if ($this->aArParams->isModified()) {
					$affectedRows += $this->aArParams->save($con);
				}
				$this->setArParams($this->aArParams);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ArWebAccountPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ArWebAccountPeer::doUpdate($this, $con);
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


												
			if ($this->aArParty !== null) {
				if (!$this->aArParty->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aArParty->getValidationFailures());
				}
			}

			if ($this->aArOffice !== null) {
				if (!$this->aArOffice->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aArOffice->getValidationFailures());
				}
			}

			if ($this->aArParams !== null) {
				if (!$this->aArParams->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aArParams->getValidationFailures());
				}
			}


			if (($retval = ArWebAccountPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ArWebAccountPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getLogin();
				break;
			case 2:
				return $this->getPassword();
				break;
			case 3:
				return $this->getArPartyId();
				break;
			case 4:
				return $this->getArOfficeId();
				break;
			case 5:
				return $this->getActivateAt();
				break;
			case 6:
				return $this->getDeactivateAt();
				break;
			case 7:
				return $this->getArParamsId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ArWebAccountPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getLogin(),
			$keys[2] => $this->getPassword(),
			$keys[3] => $this->getArPartyId(),
			$keys[4] => $this->getArOfficeId(),
			$keys[5] => $this->getActivateAt(),
			$keys[6] => $this->getDeactivateAt(),
			$keys[7] => $this->getArParamsId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ArWebAccountPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setLogin($value);
				break;
			case 2:
				$this->setPassword($value);
				break;
			case 3:
				$this->setArPartyId($value);
				break;
			case 4:
				$this->setArOfficeId($value);
				break;
			case 5:
				$this->setActivateAt($value);
				break;
			case 6:
				$this->setDeactivateAt($value);
				break;
			case 7:
				$this->setArParamsId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ArWebAccountPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setLogin($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPassword($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setArPartyId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setArOfficeId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setActivateAt($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDeactivateAt($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setArParamsId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ArWebAccountPeer::DATABASE_NAME);

		if ($this->isColumnModified(ArWebAccountPeer::ID)) $criteria->add(ArWebAccountPeer::ID, $this->id);
		if ($this->isColumnModified(ArWebAccountPeer::LOGIN)) $criteria->add(ArWebAccountPeer::LOGIN, $this->login);
		if ($this->isColumnModified(ArWebAccountPeer::PASSWORD)) $criteria->add(ArWebAccountPeer::PASSWORD, $this->password);
		if ($this->isColumnModified(ArWebAccountPeer::AR_PARTY_ID)) $criteria->add(ArWebAccountPeer::AR_PARTY_ID, $this->ar_party_id);
		if ($this->isColumnModified(ArWebAccountPeer::AR_OFFICE_ID)) $criteria->add(ArWebAccountPeer::AR_OFFICE_ID, $this->ar_office_id);
		if ($this->isColumnModified(ArWebAccountPeer::ACTIVATE_AT)) $criteria->add(ArWebAccountPeer::ACTIVATE_AT, $this->activate_at);
		if ($this->isColumnModified(ArWebAccountPeer::DEACTIVATE_AT)) $criteria->add(ArWebAccountPeer::DEACTIVATE_AT, $this->deactivate_at);
		if ($this->isColumnModified(ArWebAccountPeer::AR_PARAMS_ID)) $criteria->add(ArWebAccountPeer::AR_PARAMS_ID, $this->ar_params_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ArWebAccountPeer::DATABASE_NAME);

		$criteria->add(ArWebAccountPeer::ID, $this->id);

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

		$copyObj->setLogin($this->login);

		$copyObj->setPassword($this->password);

		$copyObj->setArPartyId($this->ar_party_id);

		$copyObj->setArOfficeId($this->ar_office_id);

		$copyObj->setActivateAt($this->activate_at);

		$copyObj->setDeactivateAt($this->deactivate_at);

		$copyObj->setArParamsId($this->ar_params_id);


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
			self::$peer = new ArWebAccountPeer();
		}
		return self::$peer;
	}

	
	public function setArParty($v)
	{


		if ($v === null) {
			$this->setArPartyId(NULL);
		} else {
			$this->setArPartyId($v->getId());
		}


		$this->aArParty = $v;
	}


	
	public function getArParty($con = null)
	{
		if ($this->aArParty === null && ($this->ar_party_id !== null)) {
						include_once 'lib/model/om/BaseArPartyPeer.php';

			$this->aArParty = ArPartyPeer::retrieveByPK($this->ar_party_id, $con);

			
		}
		return $this->aArParty;
	}

	
	public function setArOffice($v)
	{


		if ($v === null) {
			$this->setArOfficeId(NULL);
		} else {
			$this->setArOfficeId($v->getId());
		}


		$this->aArOffice = $v;
	}


	
	public function getArOffice($con = null)
	{
		if ($this->aArOffice === null && ($this->ar_office_id !== null)) {
						include_once 'lib/model/om/BaseArOfficePeer.php';

			$this->aArOffice = ArOfficePeer::retrieveByPK($this->ar_office_id, $con);

			
		}
		return $this->aArOffice;
	}

	
	public function setArParams($v)
	{


		if ($v === null) {
			$this->setArParamsId(NULL);
		} else {
			$this->setArParamsId($v->getId());
		}


		$this->aArParams = $v;
	}


	
	public function getArParams($con = null)
	{
		if ($this->aArParams === null && ($this->ar_params_id !== null)) {
						include_once 'lib/model/om/BaseArParamsPeer.php';

			$this->aArParams = ArParamsPeer::retrieveByPK($this->ar_params_id, $con);

			
		}
		return $this->aArParams;
	}

} 