<?php

namespace phpUnit\Test;

use phpUnit\Src\URL;
use phpUnit\Src\User;

class UserTest extends \PHPUnit\Framework\TestCase
{
    public function testSetPasswordReturnsTrueWhenPasswordSuccessfullySet()
    {
        $details = array();
        $user = new User($details);
        $password = 'fubar';
        $result = $user->setPassword($password);
        $this->assertTrue($result);
    }
    public function testGetUserReturnsUserWithExpectedValues()
    {
        $details = array();

        $user = new User($details);

        $password = 'fubar';

        $user->setPassword($password);
        $expectedPasswordResult = '5185e8b8fd8a71fc80545e144f91faf2';
        $currentUser = $user->getUser();

        $this->assertEquals($expectedPasswordResult, $currentUser['password']);
    }
    public function testSetPasswordReturnsFalseWhenPasswordLengthIsTooShort()
    {
        $details = array();

        $user = new User($details);

        $password = 'fub';

        $result = $user->setPassword($password);
        $this->assertFalse($result);
    }
}
