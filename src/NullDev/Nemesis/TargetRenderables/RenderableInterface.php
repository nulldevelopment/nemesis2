<?php

namespace NullDev\Nemesis\TargetRenderables;

/**
 * Interface RenderableInterface.
 */
interface RenderableInterface
{
    public function render();

    public function __toString();
}
