<?php
namespace NullDev\Nemesis\Tests\Integration\SourceFile;

use NullDev\Nemesis\Settings\PackageSettings;
use NullDev\Nemesis\SourceFile\SourceFileListGenerator;
use NullDev\Nemesis\Tests\Integration\ContainerTrait;

/**
 *
 */
class SourceFileListGeneratorTest extends \PHPUnit_Framework_TestCase
{
    use ContainerTrait;
    /**
     * @var SourceFileListGenerator
     */
    protected $object;

    /**
     */
    protected function setUp()
    {
        $this->object = $this->getContainer()->get('nemesis.sourcefile.generator');
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
