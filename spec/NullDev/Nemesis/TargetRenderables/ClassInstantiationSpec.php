<?php

namespace spec\NullDev\Nemesis\TargetRenderables;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ClassInstantiationSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\TargetRenderables\ClassInstantiation');
        $this->shouldHaveType('NullDev\Nemesis\TargetRenderables\RenderableInterface');
    }

    public function it_has_name_of_the_class_we_are_instantiating()
    {
        $this->setClassName('className');
        $this->getClassName()->shouldReturn('className');
    }

    public function it_has_list_of_params()
    {
        $this->getParams()->shouldReturnAnInstanceOf('NullDev\Nemesis\TargetRenderables\RenderableCollection');
    }

    public function it_accepts_additional_params()
    {
        $this->addParam('param1');
        $this->getParams()->shouldReturnAnInstanceOf('NullDev\Nemesis\TargetRenderables\RenderableCollection');
    }

    public function it_can_render_itself()
    {
        $this->setClassName('className');
        $this->render()->shouldReturn('new className()');
    }

    public function it_can_render_itself_automatically()
    {
        $this->setClassName('className');
        $this->__toString()->shouldReturn('new className()');
    }
}
