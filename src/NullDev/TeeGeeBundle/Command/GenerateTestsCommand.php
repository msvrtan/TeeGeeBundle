<?php
namespace NullDev\TeeGeeBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

/**
 * Class GenerateTestsCommand.
 */
class GenerateTestsCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('gen:unit-tests')
            ->setDescription('Generate unit tests')
            ->addArgument(
                'sourcePath',
                InputArgument::REQUIRED,
                'Where is the source Luke?'
            );
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @SuppressWarnings("PHPMD.UnusedFormalParameter")
     *
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        echo 'Generating unit tests'.PHP_EOL;
        //require_once('tmp/nemesis/src/NullDev/Nemesis/Tests/Integration/ContainerTrait.php');

        $sourcePath = realpath($input->getArgument('sourcePath'));

        $service = $this->getContainer()->get('teegee.manager.class2test');

        $service->run($sourcePath);

        echo PHP_EOL.PHP_EOL.'Done'.PHP_EOL.PHP_EOL;
    }
}
