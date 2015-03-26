<?php
namespace NullDev\Nemesis\Tests\Integration;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class ContainerTrait.
 */
trait ContainerTrait
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @return mixed
     */
    public function getContainer()
    {
        if (null === $this->container) {
            $this->container = new ContainerBuilder();
            $loader          = new YamlFileLoader($this->container, new FileLocator(NEMESIS_ROOT_PATH));
            $loader->load('services.yml');
        }

        return $this->container;
    }

    /**
     * @param mixed $container
     */
    public function setContainer($container)
    {
        $this->container = $container;
    }
}
