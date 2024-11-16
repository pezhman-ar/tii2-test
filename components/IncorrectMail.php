<?php
namespace app\components;

use yii\base\Event;

class IncorrectMail extends Event
{
    const EVENT_FAKE_MAIL = 'sendIncorrectMail';
    public $user;
    public $adminMail = 'aadmin2@gmail.com';
}
