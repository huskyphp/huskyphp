<?php
namespace Console;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Console\Command;


class CreateModel extends Command
{

    public function configure()
    {
        /*
        | DEFINING COMMAND NAME
        |--------------------------------------------------------------------------
        */
        $this -> setName('g:model')
        /*
        | DEFINING COMMAND DESCRIPTION
        |--------------------------------------------------------------------------
        */
        -> setDescription('This command is used to create a model in app/models directory')
        /*
        | DEFINING COMMAND ARGUMENT
        |--------------------------------------------------------------------------
        */
        -> addArgument('name', InputArgument::REQUIRED, 'The Name of the model to be created');

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
        | NAME OF THE FILE TO BE CREATED
        |--------------------------------------------------------------------------
        */
        $file_name=ucfirst(strtolower($input -> getArgument('name')));

        /*
        | PATH , WHERE IT IS TO BE STORED
        |--------------------------------------------------------------------------
        */

        $path = realpath(dirname(__FILE__).'/../../app/models/').'/'.$file_name.".php";

        /*
        | CHECKING IF THE FILE
        |--------------------------------------------------------------------------
        */

        if(file_exists($path))
        {
            $output -> writeln('<fg=red>The '.$file_name.' Model Already Exists</>');

        }

        /*
            | ELSE, CREATE THE FILE
            |--------------------------------------------------------------------------
            */

        else
        {


            /*
            | CREATE A NEW FILE AT THE DEFINED LOCATION
            |--------------------------------------------------------------------------
            */

            $myfile = fopen($path, "w") or die("Unable to open file!".$path);

            /*
            | LOADING CONTENTS TO BE WRITTEN IN THE FILE, AND REPLACING THE MODEL NAME
            | WITH THE NAME TAKEN AS INPUT
            |--------------------------------------------------------------------------
            */

            $txt = file_get_contents(realpath(dirname(__FILE__).'/files/')."/ModelContents.txt");
            $txt=str_replace('MODEL_NAME',$file_name,$txt);

            /*
            | SAVING THE FILE AT THE LOCATION, AND DISPLAY SUCCESS MESSAGE
            |--------------------------------------------------------------------------
            */

            if(fwrite($myfile, $txt))
                $output -> writeln('<fg=green>Model Successfully Created</>');
                $output -> writeln('Location : app/models/'.$file_name.".php");
        }

    }
}