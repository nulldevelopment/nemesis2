<?php
namespace NullDev\Nemesis\Tests\Integration\SourceMeta;

use NullDev\Nemesis\SourceMeta\SourceMetaDataGenerator;
use NullDev\Nemesis\Tests\Integration\ContainerTrait;

/**
 *
 */
class SourceMetaDataGeneratorTest extends \PHPUnit_Framework_TestCase
{
    use ContainerTrait;

    /**
     * @var SourceMetaDataGenerator
     */
    protected $object;

    /**
     */
    protected function setUp()
    {
        $this->object = $this->getContainer()->get('nemesis.sourcemeta.generator');
    }

    /**
     *
     */
    public function testGenerate()
    {
        $result = $this->object->generate(NEMESIS_TESTDATA_PATH.'/Phone/FeaturePhone/Nokia3320.php');

        $this->assertInstanceOf('NullDev\Nemesis\SourceMeta\SourceMetaData', $result);
    }
}
