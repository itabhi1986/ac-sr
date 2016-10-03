<?php
namespace app\commands;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        
        
        /*
         * USER ROLES
         */
        // add "admin" role
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        
        // add "author" role
        $author = $auth->createRole('author');
        $auth->add($author);
        
        // add "proUser" role
        $proUser = $auth->createRole('proUser');
        $auth->add($proUser);
        
        // add "user" role
        $user = $auth->createRole('user');
        $auth->add($user);
        
        // "admin" can do what other users can do
        $auth->addChild($admin, $author);
        $auth->addChild($admin, $proUser);
        $auth->addChild($admin, $user);
        
        // add the rule - app\rbac\rules
        $AuthorRule = new \app\rbac\rules\AuthorRule;
        $auth->add($AuthorRule);
        
        $ProuserRule = new \app\rbac\rules\ProuserRule;
        $auth->add($ProuserRule);
        
        
        
        
        
        /*
         *Events Permissions 
         */
        // add "createEvent" permission
        $createEvent = $auth->createPermission('createEvent');
        $createEvent->description = 'Create an Event';
        $auth->add($createEvent);
        
        // add "updateEvent" permission
        $updateEvent = $auth->createPermission('updateEvent');
        $updateEvent->description = 'Update an Event';
        $auth->add($updateEvent);
        
        // add "updateOwnEvent" permission
        $updateOwnEvent = $auth->createPermission('updateOwnEvent');
        $updateOwnEvent->description = 'Update an Event';
        $updateOwnEvent->ruleName = $ProuserRule->name;
        $auth->add($updateOwnEvent);
        
        // "updateOwnEvent" will be used from "updateEvent"
        $auth->addChild($updateOwnEvent, $updateEvent);
        
        // add "deleteEvent" permission
        $deleteEvent = $auth->createPermission('deleteEvent');
        $deleteEvent->description = 'Delete an Event';
        $auth->add($deleteEvent);
        
        // add "deleteOwnEvent" permission
        $deleteOwnEvent = $auth->createPermission('deleteOwnEvent');
        $deleteOwnEvent->description = 'Delete an Event';
        $auth->add($deleteOwnEvent);
        
        // "deleteOwnEvent" will be used from "deleteEvent"
        $auth->addChild($deleteOwnEvent, $deleteEvent);
        
        //Event "Roles" assignment
        $auth->addChild($author, $createEvent);
        $auth->addChild($author, $updateEvent);
        $auth->addChild($author, $deleteEvent);
        $auth->addChild($proUser, $createEvent);
        $auth->addChild($proUser, $updateOwnEvent);
        $auth->addChild($proUser, $deleteOwnEvent);
        
        
        
        /* $rule = new \app\rbac\rules\AuthorRule;
        $auth->add($rule); */
        
        
        

/*         // add "createPost" permission
        $createPost = $auth->createPermission('createPost');
        $createPost->description = 'Create a post';
        $auth->add($createPost); */

        
    }
}
