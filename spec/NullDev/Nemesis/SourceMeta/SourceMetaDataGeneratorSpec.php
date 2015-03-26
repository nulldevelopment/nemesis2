<?php

namespace spec\NullDev\Nemesis\SourceMeta;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SourceMetaDataGeneratorSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\SourceMeta\SourceMetaDataGenerator');
    }

    /**
     * @param NullDev\Nemesis\SourceMeta\SourceMetaDataFactory $factory
     * @param NullDev\Examiner\FileParser\PhpFileParser        $fileParser
     * @param NullDev\Examiner\PhpFileLoader                   $fileLoader
     * @param NullDev\Examiner\ReflectionClassGenerator        $reflectionGenerator
     */
    public function let($factory, $fileParser, $fileLoader, $reflectionGenerator)
    {
        $this->beConstructedWith($factory, $fileParser, $fileLoader, $reflectionGenerator);
    }

    /**
     * @param NullDev\Nemesis\SourceMeta\SourceMetaDataFactory $factory
     * @param NullDev\Examiner\FileParser\PhpFileParser        $fileParser
     * @param NullDev\Examiner\PhpFileLoader                   $fileLoader
     * @param NullDev\Examiner\ReflectionClassGenerator        $reflectionGenerator
     * @param NullDev\Nemesis\SourceMeta\SourceMetaData        $sourceMeta
     * @param NullDev\Examiner\FileParser\PhpFileParseResult   $parseResult
     * @param ReflectionClass                                  $reflection
     */
    public function it_should_generate_source_class_meta_data_from_given_file_path(
        $factory,
        $fileParser,
        $fileLoader,
        $reflectionGenerator,
        $sourceMeta,
        $parseResult,
        $reflection
    ) {
        $parseResult->getFullyQualifiedClassName()->shouldBeCalled()->willReturn('Vendor\File');
        $parseResult->getClassName()->shouldBeCalled()->willReturn('File');

        $fileParser->parse('/path/file.php')->shouldBeCalled()->willReturn($parseResult);

        $fileLoader->load('/path/file.php')->shouldBeCalled();

        $reflectionGenerator->generate('Vendor\File')->shouldBeCalled()->willReturn($reflection);

        $factory->create()->shouldBeCalled()->willReturn($sourceMeta);

        $this->generate('/path/file.php')->shouldReturn($sourceMeta);
    }

    /**
     * @param NullDev\Examiner\FileParser\PhpFileParser $fileParser
     */
    public function it_should_return_false_if_given_file_to_generate_not_exist($fileParser)
    {
        $fileParser->parse('/path/non-existant-file.php')->willThrow(new \Exception(''));

        $this->generate('/path/non-existant-file.php')->shouldReturn(false);
    }

    /**
     * @param NullDev\Examiner\FileParser\PhpFileParser      $fileParser
     * @param NullDev\Examiner\FileParser\PhpFileParseResult $parseResult
     */
    public function it_should_return_false_on_filepath_not_having_class_found($fileParser, $parseResult)
    {
        $parseResult->getFullyQualifiedClassName()->shouldBeCalled()->willReturn(null);

        $fileParser->parse('no-class-in-given-filepath')->shouldBeCalled()->willReturn($parseResult);
        $this->generate('no-class-in-given-filepath')->shouldReturn(false);
    }
}
