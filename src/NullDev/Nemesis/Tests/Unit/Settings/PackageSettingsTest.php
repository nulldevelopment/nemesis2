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
        $this->setExpectedException('\Exception');
        $this->object->getPath();
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
    public function testGetRootNamespace()
    {
        $this->setExpectedException('\Exception');
        $this->object->getRootNamespace();
    }

    /**
     * Auto generated set method using TeeGee.
     */
    public function testSetRootNamespace()
    {
        $path = 'namespace';
        $this->object->setRootNamespace($path);
        $this->assertEquals($path, $this->object->getRootNamespace());
    }

    /**
     */
    public function testGetTestRootPath()
    {
        $this->setExpectedException('\Exception');
        $this->object->getRootTestPath();
    }

    /**
     */
    public function testSetTestRootPath()
    {
        $path = '/path/Tests';
        $this->object->setRootTestPath($path);
        $this->assertEquals($path, $this->object->getRootTestPath());
    }

    /**
     */
    public function testGetTestRootPathFromSourcePath()
    {
        $this->object->setPath('/path');
        $this->assertEquals('/path/Tests', $this->object->getRootTestPath());
    }

    /**
     */
    public function testGetTestRootNamespace()
    {
        $this->setExpectedException('\Exception');
        $this->object->getRootTestNamespace();
    }

    /**
     */
    public function testSetTestRootNamespace()
    {
        $path = '/path/Tests';
        $this->object->setRootTestNamespace($path);
        $this->assertEquals($path, $this->object->getRootTestNamespace());
    }

    /**
     */
    public function testGetTestRootNamespaceFromSourceNamespace()
    {
        $this->object->setRootNamespace('Vendor\Package');
        $this->assertEquals('Vendor\Package\Tests', $this->object->getRootTestNamespace());
    }

    /**
     */
    public function testGetTestRootNamespaceFromSourcePath()
    {
        $this->object->setPath('/path/src/Vendor/Package');
        $this->assertEquals('Vendor\Package\Tests', $this->object->getRootTestNamespace());
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

    /**
     * @dataProvider dataCalculateRootNamespaceFromRootPath
     *
     * @param $rootPath
     *
     * @throws \Exception
     */
    public function testCalculateRootNamespaceFromRootPath($rootPath)
    {
        $result = $this->object->calculateRootNamespaceFromRootPath($rootPath);

        $this->assertEquals('Vendor\SomeBundle', $result);
    }

    /**
     * @return array
     */
    public function dataCalculateRootNamespaceFromRootPath()
    {
        return [
            ['/path/application/src/Vendor/SomeBundle'],
            ['/path/application/src/Vendor/SomeBundle/'],
            ['/path/src/application/src/Vendor/SomeBundle'],
        ];
    }

    /**
     *
     */
    public function testCalculateRootNamespaceFromRootPathNoSrcFound()
    {
        $this->setExpectedException('Exception');
        $result = $this->object->calculateRootNamespaceFromRootPath('/path/Vendor/SomeBundle');

        $this->assertEquals('Vendor\SomeBundle', $result);
    }
}
