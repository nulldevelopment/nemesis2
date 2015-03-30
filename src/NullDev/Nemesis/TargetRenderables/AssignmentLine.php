<?php

namespace NullDev\Nemesis\TargetRenderables;

/**
 * Class AssignmentLine.
 */
class AssignmentLine implements RenderableInterface
{
    protected $destination;

    protected $source;

    protected $destinationAlignment = 10;

    /**
     * @return mixed
     *
     * @throws \Exception
     */
    public function getDestination()
    {
        if (null === $this->destination) {
            throw new \Exception('Destination not set!');
        }

        return $this->destination;
    }

    /**
     * @param mixed $destination
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;

        $this->setDestinationAlignment(strlen($this->destination) + 1);
    }

    /**
     * @return mixed
     *
     * @throws \Exception
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param mixed $source
     */
    public function setSource($source)
    {
        $this->source = $source;
    }

    /**
     * @return int
     */
    public function getDestinationAlignment()
    {
        return $this->destinationAlignment;
    }

    /**
     * @param int $destinationAlignment
     */
    public function setDestinationAlignment($destinationAlignment)
    {
        $this->destinationAlignment = $destinationAlignment;
    }

    /**
     * @return string
     *
     * @throws \Exception
     */
    public function getDestinationSuffixWhitespace()
    {
        $suffix = $this->getDestinationAlignment() - strlen($this->getDestination());

        return str_repeat(' ', $suffix);
    }

    /**
     * @return mixed|string
     */
    public function getEscapedSource()
    {
        $source = $this->getSource();

        if (is_bool($source)) {
            return strtolower(var_export($source, true));
        }

        if (null === $source) {
            return 'null';
        }

        if (is_object($source)) {
            return $source->__toString();
        }

        if (substr($source, 0, 1) === '$') {
            return $source;
        }

        return var_export($source, true);
    }

    /**
     * @return string
     *
     * @throws \Exception
     */
    public function render()
    {
        return $this->getDestination().$this->getDestinationSuffixWhitespace().'= '.$this->getEscapedSource().';';
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->render();
    }
}
