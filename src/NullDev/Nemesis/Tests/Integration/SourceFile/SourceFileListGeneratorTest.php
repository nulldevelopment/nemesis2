<?php
namespace NullDev\Nemesis\Tests\Integration\SourceFile;

use NullDev\Nemesis\Settings\PackageSettings;
use NullDev\Nemesis\SourceFile\SourceFileListGenerator;
use Symfony\Component\Finder\Finder;

/**
 *
 */
class SourceFileListGeneratorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var SourceFileListGenerator
     */
    protected $object;

    /**
     */
    protected function setUp()
    {
        $fileFinder = new Finder();

        $this->object = new SourceFileListGenerator($fileFinder);
    }

    /**
     * Tests that Nemesis test files have 12 source files in.
     */
    public function testGenerate()
    {
        $packageSettings = new PackageSettings();
        $packageSettings->setPath(NEMESIS_TESTDATA_PATH);

        $result = $this->object->generate($packageSettings);

        $this->assertCount(12, $result);
    }
}
