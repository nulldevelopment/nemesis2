<?php

namespace NullDev\Nemesis\SourceMeta;

use NullDev\Nemesis\SourceMeta\SourceMetaDataFactory;
use NullDev\Examiner\FileParser\PhpFileParser;
use NullDev\Examiner\PhpFileLoader;
use NullDev\Examiner\ReflectionClassGenerator;

class SourceMetaDataGenerator
{
    protected $factory;
    protected $fileParser;
    protected $fileLoader;
    protected $reflectionGenerator;

    public function __construct(
        SourceMetaDataFactory $factory,
        PhpFileParser $fileParser,
        PhpFileLoader $fileLoader,
        ReflectionClassGenerator $reflectionGenerator
    ) {
        $this->factory             = $factory;
        $this->fileParser          = $fileParser;
        $this->fileLoader          = $fileLoader;
        $this->reflectionGenerator = $reflectionGenerator;
    }

    /**
     * @param string $filePath
     *
     * @return bool|SourceMetaData
     *
     * @throws \Exception
     */
    public function generate($filePath)
    {
        try {
            $result = $this->fileParser->parse($filePath);
        } catch (\Exception $e) {
            return false;
        }

        if ($result->getFullyQualifiedClassName() === null) {
            return false;
        }

        $this->fileLoader->load($filePath);

        $reflection = $this->reflectionGenerator->generate($result->getFullyQualifiedClassName());

        $metadata = $this->factory->create();

        $metadata->setFilePath($filePath);
        $metadata->setClassName($result->getClassName());
        $metadata->setFullyQualifiedClassName($result->getFullyQualifiedClassName());
        $metadata->setReflection($reflection);

        return $metadata;
    }
}
