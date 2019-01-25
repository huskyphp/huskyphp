<?php
namespace Console;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Console\Command;
class CreateController extends Command
{
    public function configure()
    {
        /*
        | DEFINING COMMAND NAME
        |--------------------------------------------------------------------------
        */
        $this -> setName('g:controller')
            /*
            | DEFINING COMMAND DESCRIPTION
            |--------------------------------------------------------------------------
            */
            -> setDescription('This command is used to create a Controller in app/controllers directory')
            /*
            | DEFINING COMMAND ARGUMENT
            |--------------------------------------------------------------------------
            */
            -> addArgument('name', InputArgument::REQUIRED, 'The Name of the Controller to be created');
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
        $path = realpath(dirname(__FILE__).'/../../app/controllers/').'/'.$file_name."Controller.php";
        /*
        | CHECKING IF THE FILE
        |--------------------------------------------------------------------------
        */
        if(file_exists($path))
        {
            $output -> writeln('<fg=red>The '.$file_name.' Controller Already Exists</>');
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
            $txt = file_get_contents(realpath(dirname(__FILE__).'/files/')."/ControllerContents.txt");
            $txt=str_replace('CONTROLLER_NAME',$file_name,$txt);

            /*
            | AUTO ADD CONTROLLER DEPENDENCY IN SLIM APP CONFIGURATION
            |--------------------------------------------------------------------------
            */

            $app_file_path=realpath(dirname(__FILE__).'/..')."/app.php";
            $app_file = fopen("$app_file_path", 'a+') or die("File does not exist or you lack permission to open it");
            $dependency_content=file_get_contents(realpath(dirname(__FILE__).'/files/')."/ControllerDependencyContent.txt");
            $dependency_content=str_replace('CONTROLLER_NAME',$file_name,$dependency_content);

            /*
            | SAVING THE FILE AT THE LOCATION, AND DISPLAY SUCCESS MESSAGE
            |--------------------------------------------------------------------------
            */
            if(fwrite($myfile, $txt) && fwrite($app_file, $dependency_content))
            {
                $output -> writeln('<fg=green>Controller Successfully Created</>');
                $output -> writeln('Location : app/controllers/'.$file_name."Controller.php");
            }


        }
    }
}