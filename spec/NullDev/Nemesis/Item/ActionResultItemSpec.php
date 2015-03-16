<?php

namespace spec\NullDev\Nemesis\Item;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ActionResultItemSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\Item\ActionResultItem');
    }

    public function it_should_store_source_file_path()
    {
        $this->setSourceFilePath('/path/Class.php');
        $this->getSourceFilePath()->shouldReturn('/path/Class.php');
    }

    public function it_should_store_source_fully_qualified_class_name()
    {
        $this->setSourceFullyQualifiedClassName('Namespace\Class');
        $this->getSourceFullyQualifiedClassName()->shouldReturn('Namespace\Class');
    }

    public function it_should_store_target_file_path()
    {
        $this->setTargetFilePath('/path/Tests/ClassTest.php');
        $this->getTargetFilePath()->shouldReturn('/path/Tests/ClassTest.php');
    }

    public function it_should_store_target_fully_qualified_class_name()
    {
        $this->setTargetFullyQualifiedClassName('Namespace\Tests\ClassTest');
        $this->getTargetFullyQualifiedClassName()->shouldReturn('Namespace\Tests\ClassTest');
    }

    public function it_should_store_messages()
    {
        $this->setMessages(['1', '2']);
        $this->getMessages()->shouldReturn(['1', '2']);
    }

    public function it_should_have_no_messages_by_default()
    {
        $this->getMessages()->shouldReturn([]);
    }

    public function it_should_support_adding_one_message()
    {
        $this->addMessage('1');
        $this->getMessages()->shouldReturn(['1']);
    }
}
