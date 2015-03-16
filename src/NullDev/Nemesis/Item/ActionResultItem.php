<?php

namespace NullDev\Nemesis\Item;

/**
 * Class ActionResultItem.
 */
class ActionResultItem
{
    /**
     * @var string
     */
    protected $sourceFilePath;

    /**
     * @var string
     */
    protected $sourceFullyQualifiedClassName;

    /**
     * @var string
     */
    protected $targetFilePath;

    /**
     * @var string
     */
    protected $targetFullyQualifiedClassName;

    /**
     * @var array
     */
    protected $messages = [];

    /**
     * @return string
     */
    public function getSourceFilePath()
    {
        return $this->sourceFilePath;
    }

    /**
     * @param string $sourceFilePath
     *
     * @return $this
     */
    public function setSourceFilePath($sourceFilePath)
    {
        $this->sourceFilePath = $sourceFilePath;

        return $this;
    }

    /**
     * @return string
     */
    public function getSourceFullyQualifiedClassName()
    {
        return $this->sourceFullyQualifiedClassName;
    }

    /**
     * @param string $sourceFullyQualifiedClassName
     *
     * @return $this
     */
    public function setSourceFullyQualifiedClassName($sourceFullyQualifiedClassName)
    {
        $this->sourceFullyQualifiedClassName = $sourceFullyQualifiedClassName;

        return $this;
    }

    /**
     * @return string
     */
    public function getTargetFilePath()
    {
        return $this->targetFilePath;
    }

    /**
     * @param string $targetFilePath
     *
     * @return $this
     */
    public function setTargetFilePath($targetFilePath)
    {
        $this->targetFilePath = $targetFilePath;

        return $this;
    }

    /**
     * @return string
     */
    public function getTargetFullyQualifiedClassName()
    {
        return $this->targetFullyQualifiedClassName;
    }

    /**
     * @param string $targetFullyQualifiedClassName
     *
     * @return $this
     */
    public function setTargetFullyQualifiedClassName($targetFullyQualifiedClassName)
    {
        $this->targetFullyQualifiedClassName = $targetFullyQualifiedClassName;

        return $this;
    }

    /**
     * @return array
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * @param array $messages
     */
    public function setMessages($messages)
    {
        $this->messages = $messages;
    }

    /**
     * @param string $message
     *
     * @return $this
     */
    public function addMessage($message)
    {
        $this->messages[] = $message;

        return $this;
    }
}
