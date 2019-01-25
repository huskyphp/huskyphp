<?php
namespace Console;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Console\Command;


class CreateTemplate extends Command
{

    public function configure()
    {
        /*
        | DEFINING COMMAND NAME
        |--------------------------------------------------------------------------
        */
        $this -> setName('g:template')
            /*
            | DEFINING COMMAND DESCRIPTION
            |--------------------------------------------------------------------------
            */
            -> setDescription('This command is used to create a HTML Template in templates/ directory')
            /*
            | DEFINING COMMAND ARGUMENT
            |--------------------------------------------------------------------------
            */
            -> addArgument('name', InputArgument::REQUIRED, 'The Name of the Template to be created');

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
        $file_name=strtolower($input -> getArgument('name'));

        /*
        | PATH , WHERE IT IS TO BE STORED
        |--------------------------------------------------------------------------
        */

        $path = realpath(dirname(__FILE__).'/../../templates/').'/'.$file_name.".html";

        /*
        | CHECKING IF THE FILE
        |--------------------------------------------------------------------------
        */

        if(file_exists($path))
        {
            $output -> writeln('<fg=red>The '.$file_name.' Template Already Exists</>');

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
            | LOADING CONTENTS TO BE WRITTEN IN THE FILE, AND REPLACING THE Controller NAME
            | WITH THE NAME TAKEN AS INPUT
            |--------------------------------------------------------------------------
            */

            $txt = file_get_contents(realpath(dirname(__FILE__).'/files/')."/TemplateContents.txt");
            $txt=str_replace('TEMPLATE_NAME',ucfirst($file_name),$txt);

            /*
            | SAVING THE FILE AT THE LOCATION, AND DISPLAY SUCCESS MESSAGE
            |--------------------------------------------------------------------------
            */

            if(fwrite($myfile, $txt))
                $output -> writeln('<fg=green>Template Successfully Created</>');
            $output -> writeln('Location : templates/'.$file_name.".html");
        }

    }
}