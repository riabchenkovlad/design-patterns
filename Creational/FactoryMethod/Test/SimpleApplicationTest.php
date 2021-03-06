<?php

namespace DesignPatterns\Creational\FactoryMethod\Test;

use DesignPatterns\Creational\FactoryMethod\RequestInterface;
use DesignPatterns\Creational\FactoryMethod\SimpleApplication\SimpleApplication;
use DesignPatterns\Creational\FactoryMethod\SimpleApplication\SimpleRouter;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class SimpleApplicationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var SimpleApplication
     */
    private $application;

    protected function setUp()
    {
        $this->application = new SimpleApplication();
    }

    public function testRouterClass()
    {
        $this->assertInstanceOf(SimpleRouter::class, $this->application->createRouter());
    }

    public function testRequestClass()
    {
        $this->assertInstanceOf(RequestInterface::class,$this->application->createRequest('/url'));
    }

    public function testIndexAction()
    {
        $this->assertEquals('<h1>Simple App greats you!</h1>', $this->application->handle('/'));
    }

    public function testContactAction()
    {
        $this->assertEquals('<h1>We will be pleased to hear from you!</h1>', $this->application->handle('/contact.html'));
    }

    /**
     * @expectedException \Exception
     */
    public function testException()
    {
        $this->application->handle('/404');
    }
}
