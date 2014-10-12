<?php
namespace Registration\Mapper;

class MembersMapper extends \NovumWare\Db\Table\Mapper\AbstractMapper
{
	static protected $mapperTableName = 'members';
	protected $columnPrefix = 'member_';
	protected $idColumn = 'member_id';
	protected $modelClass = '\Registration\Model\MemberModel';


	// ========================================================================= CONVENIENCE METHODS =========================================================================
	/**
	 * @param string $email
	 * @return \Registration\Model\MemberModel
	 */
	public function fetchOneForEmail($email) {
		return $this->fetchOneWhere(array($this->columnPrefix.'email = ?'=>$email));
	}
	
	/**
	 * @return \Registration\Model\MemberModel
	 */
	public function fetchOneForAdminPrivileges() {
		return $this->fetchOneWhere(array($this->columnPrefix.'role = ?'=>'admin'));
	}


	// ========================================================================= OVERRIDES =========================================================================
}