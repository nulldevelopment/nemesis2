<?php
namespace NullDev\Nemesis\Tests\Integration\SourceMeta;

use NullDev\Nemesis\SourceMeta\SourceMetaDataCollectionGenerator;
use NullDev\Nemesis\SourceMeta\SourceMetaDataCollectionFactory;
use NullDev\Nemesis\SourceFile\SourceFileListGenerator;
use NullDev\Nemesis\SourceMeta\SourceMetaDataGenerator;
use Symfony\Component\Finder\Finder;
use NullDev\Examiner\FileParser\PhpFileParseResultFactory;
use NullDev\Nemesis\SourceMeta\SourceMetaDataFactory;
use NullDev\Examiner\FileParser\PhpFileParser;
use NullDev\Examiner\PhpFileLoader;
use NullDev\Examiner\ReflectionClassGenerator;

/**
 *
 */
class SourceMetaDataCollectionGeneratorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var SourceMetaDataCollectionGenerator
     */
    protected $object;

    /**
     */
    protected function setUp()
    {
        $factory     = new SourceMetaDataCollectionFactory();
        $fileListGen = new SourceFileListGenerator(new Finder());

        $factory2            = new SourceMetaDataFactory();
        $fileParser          = new PhpFileParser(new PhpFileParseResultFactory());
        $fileLoader          = new PhpFileLoader();
        $reflectionGenerator = new ReflectionClassGenerator();

        $sourceMetaDataGenerator = new SourceMetaDataGenerator(
            $factory2, $fileParser, $fileLoader, $reflectionGenerator
        );

        $this->object = new SourceMetaDataCollectionGenerator($factory, $fileListGen, $sourceMetaDataGenerator);
    }

    /**
     *
     */
    public function testGenerate()
    {
        $this->markTestIncomplete('TODO');
    }
}
