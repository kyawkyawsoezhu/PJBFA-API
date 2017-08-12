<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use File;

class GeneratePartialClass extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:partial {Class name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Partial Class';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->className = $className = $this->argument('Class name');
        $baseDirectory = base_path('app/Partials');
        $fileName = $baseDirectory. '/'. $className . '.php';

        if(!$this->directoryExist($baseDirectory)){
            $this->createDirectory($baseDirectory);
        }

        if($this->fileExist($fileName)){
            return $this->error("Partial already exists!"); 
        }

        $this->createFile($fileName, $this->classContent());
        return $this->info("Partial created successfully."); 
    }

    public function createFile($file, $content)
    {
        File::put($file, $content);
    }

    public function directoryExist($direcotry)
    {
        return File::exists($direcotry);
    }

    
    public function fileExist($file)
    {
        return File::exists($file);
    }

    public function createDirectory($direcotry)
    {
        File::makeDirectory($direcotry);
    }

    public function classContent()
    {
        return 
<<<PHP
<?php

namespace App\Partials;

class {$this->className} extends Partial
{

}
PHP;
    }
}
