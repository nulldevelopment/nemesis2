<?php
namespace NullDev\Nemesis\Tests\Unit\Settings;

use NullDev\Nemesis\Settings\PackageSettings;
use Mockery as m;

/**
 *
 */
class PackageSettingsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var PackageSettings
     */
    protected $object;

    /**
     */
    protected function setUp()
    {
        $this->object = new PackageSettings();
    }

    /**
     * Auto generated get method using TeeGee.
     */
    public function testGetPath()
    {
        $this->assertEquals(null, $this->object->getPath());
    }

    /**
     * Auto generated set method using TeeGee.
     */
    public function testSetPath()
    {
        $path = 'path';
        $this->object->setPath($path);
        $this->assertEquals($path, $this->object->getPath());
    }

    /**
     * Auto generated get method using TeeGee.
     */
    public function testGetType()
    {
        $this->assertEquals(null, $this->object->getType());
    }

    /**
     * Auto generated set method using TeeGee.
     */
    public function testSetType()
    {
        $type = 'type';
        $this->object->setType($type);
        $this->assertEquals($type, $this->object->getType());
    }

    /**
     * Auto generated get method using TeeGee.
     */
    public function testGetExcludeFolders()
    {
        $this->assertEquals([], $this->object->getExcludeFolders());
    }

    /**
     * Auto generated set method using TeeGee.
     */
    public function testSetExcludeFolders()
    {
        $excludeFolders = 'excludeFolders';
        $this->object->setExcludeFolders($excludeFolders);
        $this->assertEquals($excludeFolders, $this->object->getExcludeFolders());
    }

    /**
     *
     */
    public function testAddExcludeFolders()
    {
        $this->object->addExcludeFolders('folder');

        $this->assertEquals(['folder'], $this->object->getExcludeFolders());
    }
}
