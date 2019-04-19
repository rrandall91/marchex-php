<?php

namespace Marchex;

class MarchexTest extends TestCase
{
    protected function setUp()
    {
        Marchex::resetCredentials();
    }

    public function testValidCredentialsAreEncoded()
    {
        $testUsername = 'username';
        $testPassword = 'password';

        Marchex::setCredentials($testUsername, $testPassword);
        $this->assertEquals(base64_encode($testUsername . ':' . $testPassword), Marchex::getCredentials());
    }

    public function testCredentialsCanBeReset()
    {
        $testUsername = 'username';
        $testPassword = 'password';

        Marchex::setCredentials($testUsername, $testPassword);
        $this->assertTrue(Marchex::checkCredentials());
        Marchex::resetCredentials();
        $this->assertFalse(Marchex::checkCredentials());
    }

    public function testEmptyCredentialsThrowsException()
    {
        $this->expectException(\InvalidArgumentException::class);
        Marchex::getCredentials();
    }
}
