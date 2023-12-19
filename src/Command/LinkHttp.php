<?php

namespace App\Command;

use App\Service\ProgramHttp;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'link:get-programs',
    description: 'Get data of the program from Link API',
)]
class LinkHttp extends Command
{
    private ProgramHttp $programHttp;

    public function __construct(ProgramHttp $programHttp)
    {
        parent::__construct();
        $this->programHttp = $programHttp;
    }
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $toto = $this->programHttp->getProgram();
        $output->writeln($toto);
        return Command::SUCCESS;
    }
}