<?php
namespace NullDev\Nemesis\Tests\Integration\SourceMeta;

use NullDev\Nemesis\SourceMeta\SourceMetaDataCollectionGenerator;
use NullDev\Nemesis\Tests\Integration\ContainerTrait;

/**
 *
 */
class SourceMetaDataCollectionGeneratorTest extends \PHPUnit_Framework_TestCase
{
    use ContainerTrait;

    /**
     * @var SourceMetaDataCollectionGenerator
     */
    protected $object;

    /**
     */
    protected function setUp()
    {
        $this->object = $this->getContainer()->get('nemesis.sourcemeta_collection.generator');
    }

    /**
     *
     */
    public function testGenerate()
    {
        $settings = $this->getContainer()->get('settings');
        $settings->setPath(NEMESIS_TESTDATA_PATH);

        $result = $this->object->generate($settings);

        $this->assertCount(10, $result);
    }
}
