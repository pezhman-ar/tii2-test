<?php

use yii\db\Migration;

/**
 * Class m241116_085226_init_rbac
 */
class m241116_085226_init_rbac extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;
        $createPost = $auth->createPermission('createPost');
        $createPost->description = 'create post';
        $auth->add($createPost);

        $createUser = $auth->createPermission('createUser');
        $createPost->description = 'create user';
        $auth->add($createUser);

        $createCategory = $auth->createPermission('createCategory');
        $createPost->description = 'create category';
        $auth->add($createCategory);

        $deleteCategory = $auth->createPermission('deleteCategory');
        $createPost->description = 'delete category';
        $auth->add($deleteCategory);

        $deletePost = $auth->createPermission('deletePost');
        $createPost->description = 'delete post';
        $auth->add($deletePost);

        $deleteUser = $auth->createPermission('deleteUser');
        $createPost->description = 'delete user';
        $auth->add($deleteUser);




        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $createPost);
        $auth->addChild($admin, $createUser);
        $auth->addChild($admin, $createCategory);
        $auth->addChild($admin, $deleteCategory);
        $auth->addChild($admin, $deleteUser);
        $auth->addChild($admin, $deletePost);

        $adminD = $auth->createRole('adminD');
        $auth->add($adminD);
        $auth->addChild($adminD, $deleteCategory);
        $auth->addChild($adminD, $deleteUser);
        $auth->addChild($adminD, $deletePost);

        $adminC = $auth->createRole('adminC');
        $auth->add($adminC);
        $auth->addChild($adminC, $createPost);
        $auth->addChild($adminC, $createUser);
        $auth->addChild($adminC, $createCategory);
        
        $user = $auth->createRole('user');
        $auth->add($user);
        $auth->addChild($user,$createPost);

        $auth->assign($admin , 1);
        $auth->assign($adminC , 134);
        $auth->assign($adminD , 135);


        }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m241116_085226_init_rbac cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241116_085226_init_rbac cannot be reverted.\n";

        return false;
    }
    */
}
