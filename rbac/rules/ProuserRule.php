<?php
namespace app\rbac\rules;

use yii\rbac\Rule;

/**
 * Checks if authorID matches user passed via params
 */
class ProuserRule extends Rule
{
    public $name = 'prouserRules';

    /**
     * @param string|integer $user the user ID.
     * @param Item $item the role or permission that this rule is associated with
     * @param array $params parameters passed to ManagerInterface::checkAccess().
     * @return boolean a value indicating whether the rule permits the role or permission it is associated with.
     */
    public function execute($user, $item, $params)
    {	
    	if(isset($params['event'])){
    		return $params['event']->event_owner == $user;
    	}
    	
    	return false;
    }
}
