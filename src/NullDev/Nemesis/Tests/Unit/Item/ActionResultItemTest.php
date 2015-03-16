<?php
namespace NullDev\Nemesis\Tests\Unit\Item;

use NullDev\Nemesis\Item\ActionResultItem;
use Mockery as m;

/**
 *
 */
class ActionResultItemTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ActionResultItem
     */
    protected $object;

    /**
     */
    protected function setUp()
    {
        $this->object = new ActionResultItem();
    }

    /**
     * Auto generated get method using TeeGee.
     */
    public function testGetSourceFilePath()
    {
        $this->assertEquals(null, $this->object->getSourceFilePath());
    }

    /**
     * Auto generated set method using TeeGee.
     */
    public function testSetSourceFilePath()
    {
        $sourceFilePath = 'sourceFilePath';
        $this->object->setSourceFilePath($sourceFilePath);
        $this->assertEquals($sourceFilePath, $this->object->getSourceFilePath());
    }

    /**
     * Auto generated get method using TeeGee.
     */
    public function testGetSourceFullyQualifiedClassName()
    {
        $this->assertEquals(null, $this->object->getSourceFullyQualifiedClassName());
    }

    /**
     * Auto generated set method using TeeGee.
     */
    public function testSetSourceFullyQualifiedClassName()
    {
        $sourceFullyQualifiedClassName = 'sourceFullyQualifiedClassName';
        $this->object->setSourceFullyQualifiedClassName($sourceFullyQualifiedClassName);
        $this->assertEquals($sourceFullyQualifiedClassName, $this->object->getSourceFullyQualifiedClassName());
    }

    /**
     * Auto generated get method using TeeGee.
     */
    public function testGetTargetFilePath()
    {
        $this->assertEquals(null, $this->object->getTargetFilePath());
    }

    /**
     * Auto generated set method using TeeGee.
     */
    public function testSetTargetFilePath()
    {
        $targetFilePath = 'targetFilePath';
        $this->object->setTargetFilePath($targetFilePath);
        $this->assertEquals($targetFilePath, $this->object->getTargetFilePath());
    }

    /**
     * Auto generated get method using TeeGee.
     */
    public function testGetTargetFullyQualifiedClassName()
    {
        $this->assertEquals(null, $this->object->getTargetFullyQualifiedClassName());
    }

    /**
     * Auto generated set method using TeeGee.
     */
    public function testSetTargetFullyQualifiedClassName()
    {
        $targetFullyQualifiedClassName = 'targetFullyQualifiedClassName';
        $this->object->setTargetFullyQualifiedClassName($targetFullyQualifiedClassName);
        $this->assertEquals($targetFullyQualifiedClassName, $this->object->getTargetFullyQualifiedClassName());
    }

    /**
     * Auto generated get method using TeeGee.
     */
    public function testGetMessages()
    {
        $this->assertEquals([], $this->object->getMessages());
    }

    /**
     * Auto generated set method using TeeGee.
     */
    public function testSetMessages()
    {
        $messages = 'messages';
        $this->object->setMessages($messages);
        $this->assertEquals($messages, $this->object->getMessages());
    }

    /**
     *
     */
    public function testAddMessage()
    {
        $this->object->addMessage('message #1');

        $this->assertEquals(['message #1'], $this->object->getMessages());
    }
}
