<?php

namespace spec\NullDev\Nemesis\SourceMeta;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SourceMetaDataSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\SourceMeta\SourceMetaData');
    }

    public function it_should_have_source_file_path()
    {
        $this->getFilePath();
        $this->setFilePath('/path/filename.php');
        $this->getFilePath()->shouldReturn('/path/filename.php');
    }

    public function it_should_have_source_class_name()
    {
        $this->setClassName('SomeClass');
        $this->getClassName()->shouldReturn('SomeClass');
    }

    public function it_should_have_source_fully_qualified_class_name()
    {
        $this->setFullyQualifiedClassName('Vendor\Package\SomeClass');
        $this->getFullyQualifiedClassName()->shouldReturn('Vendor\Package\SomeClass');
    }

    /**
     * @param \ReflectionClass $reflection
     */
    public function it_should_have_source_reflection($reflection)
    {
        $this->setReflection($reflection);
        $this->getReflection()->shouldReturn($reflection);
    }

    /**
     * @param NullDev\Nemesis\Settings\PackageSettings $packageSettings
     */
    public function it_should_have_package_settings($packageSettings)
    {
        $this->setPackageSettings($packageSettings);
        $this->getPackageSettings()->shouldReturn($packageSettings);
    }

    /**
     * @param \ReflectionClass  $reflection
     * @param \ReflectionMethod $reflectionConstructor
     */
    public function it_should_return_constructor_reflection($reflection, $reflectionConstructor)
    {
        $reflectionConstructor->isConstructor()->willReturn(true);

        $reflection->getMethods()->willReturn([$reflectionConstructor]);

        $this->setReflection($reflection);
        $this->getConstructorReflection()->shouldReturnAnInstanceOf('ReflectionMethod');
    }

    /**
     * @param \ReflectionClass  $reflection
     * @param \ReflectionMethod $reflectionMethod
     */
    public function it_should_return_null_if_no_constructor($reflection, $reflectionMethod)
    {
        $reflectionMethod->isConstructor()->willReturn(false);

        $reflection->getMethods()->willReturn([$reflectionMethod]);

        $this->setReflection($reflection);
        $this->getConstructorReflection()->shouldReturn(null);
    }

    /**
     * @param \ReflectionClass $reflection
     */
    public function it_should_return_false_if_no_constructor_defined($reflection)
    {
        $reflection->getMethods()->willReturn([]);

        $this->setReflection($reflection);

        $this->hasConstructorParams()->shouldReturn(false);
    }

    /**
     * @param \ReflectionClass  $reflection
     * @param \ReflectionMethod $reflectionMethod
     */
    public function it_should_return_false_if_no_arguments_in_constructor_defined($reflection, $reflectionMethod)
    {
        $reflectionMethod->isConstructor()->willReturn(true);
        $reflectionMethod->getParameters()->willReturn([]);

        $reflection->getMethods()->willReturn([$reflectionMethod]);

        $this->setReflection($reflection);

        $this->hasConstructorParams()->shouldReturn(false);
    }

    /**
     * @param \ReflectionClass  $reflection
     * @param \ReflectionMethod $reflectionMethod
     */
    public function it_should_return_true_if_constructor_has_arguments_defined($reflection, $reflectionMethod)
    {
        $reflectionMethod->isConstructor()->willReturn(true);
        $reflectionMethod->getParameters()->willReturn(['param1', 'param2']);

        $reflection->getMethods()->willReturn([$reflectionMethod]);

        $this->setReflection($reflection);

        $this->hasConstructorParams()->shouldReturn(true);
    }

    /**
     * @param \ReflectionClass $reflection
     */
    public function it_should_calculate_getters_and_setters_percentage($reflection)
    {
        $reflection->getMethods()->willReturn([]);

        $this->setReflection($reflection);

        $this->getGettersSettersPercentage()->shouldReturn(0);
    }
}
