<?php
namespace Console;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Console\Command;


class CreateVirtualHost extends Command
{

    public function configure()
    {
        /*
        | DEFINING COMMAND NAME
        |--------------------------------------------------------------------------
        */
        $this -> setName('serve')
            /*
            | DEFINING COMMAND DESCRIPTION
            |--------------------------------------------------------------------------
            */
            -> setDescription('This command is used to create a model in app/models directory');
            /*
            | DEFINING COMMAND ARGUMENT
            |--------------------------------------------------------------------------
            */

    }

    public function execute(InputInterface $input, OutputInterface $output)
    {

        /*
        | EXECUTING COMMAND
        |--------------------------------------------------------------------------
        */
        $this -> runScript($input, $output);
    }

    protected function runScript(InputInterface $input, OutputInterface $output)
    {

        /*
        | STARTING VIRTUAL HOST ON DEFAULT HOST
        |--------------------------------------------------------------------------
        */
        $output->writeln('<fg=green>Husky Development Server Started on localhost:4300</>');
        $data= shell_exec ( "cd public; php -S localhost:4300;");

    }
}