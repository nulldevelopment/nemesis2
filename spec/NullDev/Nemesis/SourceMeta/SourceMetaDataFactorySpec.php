<?php

namespace spec\NullDev\Nemesis\SourceMeta;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SourceMetaDataFactorySpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\SourceMeta\SourceMetaDataFactory');
    }
    public function it_should_create_empty_instance()
    {
        $this->create()->shouldReturnAnInstanceOf('NullDev\Nemesis\SourceMeta\SourceMetaData');
    }
}
