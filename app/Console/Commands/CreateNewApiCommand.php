<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class CreateNewApiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:api {apiName}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create boilerplate for a new API';

    /**
     * The filesystem used for writing the files.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $files;

    /**
     * Create a new command instance.
     *
     * @param  \Illuminate\Filesystem\Filesystem $files
     */
    public function __construct(Filesystem $files)
    {
        $this->files = $files;
        parent::__construct();
    }

    /**
     * Get the location of the controller stub.
     *
     * @return string
     */
    protected function getControllerStub()
    {
        return __DIR__.'/stubs/controller.stub';
    }

    /**
     * Get the location of the routes stub.
     *
     * @return string
     */
    protected function getRoutesStub()
    {
        return __DIR__.'/stubs/routes.stub';
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $api = $this->argument('apiName');
        if ($this->files->exists(app_path('API/'.$api))) {
            $this->error('The API already exists!');

            return false;
        }

        $this->files->makeDirectory(app_path('API/'.$api.'/Controllers'), 0777, true, true);

        $this->files->put(app_path('API/'.$api.'/routes.php'), $this->buildRoutes());
        $this->files->put(app_path('API/'.$api.'/Controllers/'.$api.'Controller.php'), $this->buildClass($api));
    }

    /**
     * Retrieve the contents of the routes file.
     *
     * @return  string
     * @throws  \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    protected function buildRoutes()
    {
        return $this->files->get($this->getRoutesStub());
    }

    /**
     * Build the Controller class from the stub.
     *
     * @param  $name
     * @return mixed
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    protected function buildClass($name)
    {
        $stub = $this->files->get($this->getControllerStub());

        return $this->replaceNamespace($stub, $name)->replaceClass($stub, $name);
    }

    /**
     * Replace the dummy namespaces of the controller.
     *
     * @param  $stub
     * @param  $name
     * @return $this
     */
    protected function replaceNamespace(&$stub, $name)
    {
        $stub = str_replace(
            'DummyNamespace', $this->getControllerNamespace($name), $stub
        );

        $stub = str_replace(
            'DummyRootNamespace', $this->laravel->getNamespace(), $stub
        );

        return $this;
    }

    /**
     * Get the namespace for controllers.
     *
     * @param  $name
     * @return string
     */
    protected function getControllerNamespace($name)
    {
        return $this->laravel->getNamespace().'API\\'.$name.'\\Controllers';
    }

    /**
     * Replace the dummy class name with the real one.
     *
     * @param  $stub
     * @param  $name
     * @return mixed
     */
    protected function replaceClass($stub, $name)
    {
        $class = str_replace($this->getControllerNamespace($name).'\\', '', $name).'Controller';

        return str_replace('DummyClass', $class, $stub);
    }
}
