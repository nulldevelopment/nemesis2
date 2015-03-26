<?php
namespace NullDev\Nemesis\Tests\Integration\SourceMeta;

use NullDev\Examiner\FileParser\PhpFileParseResultFactory;
use NullDev\Nemesis\SourceMeta\SourceMetaDataGenerator;
use NullDev\Nemesis\SourceMeta\SourceMetaDataFactory;
use NullDev\Examiner\FileParser\PhpFileParser;
use NullDev\Examiner\PhpFileLoader;
use NullDev\Examiner\ReflectionClassGenerator;

/**
 *
 */
class SourceMetaDataGeneratorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var SourceMetaDataGenerator
     */
    protected $object;

    /**
     */
    protected function setUp()
    {
        $factory             = new SourceMetaDataFactory();
        $fileParser          = new PhpFileParser(new PhpFileParseResultFactory());
        $fileLoader          = new PhpFileLoader();
        $reflectionGenerator = new ReflectionClassGenerator();

        $this->object = new SourceMetaDataGenerator($factory, $fileParser, $fileLoader, $reflectionGenerator);
    }

    /**
     *
     */
    public function testGenerate()
    {
        $this->markTestIncomplete('TODO');
    }
}
