<?php
namespace NullDev\Nemesis\Command;

use NullDev\Nemesis\Action\GenerateTestsAction;
use NullDev\Nemesis\Collection\ActionResultCollection;
use NullDev\Nemesis\Settings\PackageSettings;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

/**
 * Class GenerateTestsCommand.
 */
class GenerateTestsCommand extends Command
{
    use ContainerAwareTrait;

    public function configure()
    {
        $this
            ->setName('nemesis:generate-tests')
            ->setDescription('Generate tests')
            ->addArgument(
                'path',
                InputArgument::REQUIRED,
                'Path to source?'
            )
            ->addArgument(
                'type',
                InputArgument::REQUIRED,
                'What type shoud be used (sf2)?'
            );
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $settings = $this->container->get('settings');

        $sourcePath  = $input->getArgument('path');
        $packageType = $input->getArgument('type');

        $settings->setPath($sourcePath);
        $settings->setType($packageType);
        $settings->addExcludeFolders('Tests');

        $collection = new ActionResultCollection();

        $action = new GenerateTestsAction($collection);
        $action->runAction($settings);

        $output->writeln($sourcePath);
    }
}
