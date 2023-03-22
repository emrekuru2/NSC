<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use CodeIgniter\CLI\GeneratorTrait;
use Config\Database;
use CodeIgniter\Config\DotEnv;
use Throwable;

class Setup extends BaseCommand
{
    use GeneratorTrait;

    /**
     * The Command's Group
     *
     * @var string
     */
    protected $group = 'CodeIgniter';

    /**
     * The Command's Name
     *
     * @var string
     */
    protected $name = 'setup';

    /**
     * The Command's Description
     *
     * @var string
     */
    protected $description = 'Sets up the overall project for the specified environment';

    /**
     * The Command's Usage
     *
     * @var string
     */
    protected $usage = 'setup <environment> [options]';

    /**
     * The Command's Arguments
     *
     * @var array
     */
    protected $arguments = ['environment' => 'The environment type to setup the project'];

    /**
     * The Command's Options
     *
     * @var array
     */
    protected $options = [];

    /**
     * Actually execute a command.
     *
     * @param array $params
     */
    public function run(array $params)
    {
        $env = array_shift($params);

        if (empty($env)) {
            CLI::print('You need to specify your environment type', 'red');
            return EXIT_ERROR;
        } else if ($env != 'production' || $env != 'development'){
            CLI::error('Environment type can either be development or production');
            return EXIT_ERROR;
        }

        CLI::print('Setting up for environment type ' . $env, 'blue', 'yellow');
        CLI::newLine();


        $base_url    = CLI::prompt('Your base url', 'http://localhost/');
        $db_hostname = CLI::prompt('Your database hostname', 'localhost');
        $db_name     = CLI::prompt('Your database name', null, 'required');
        $db_user     = CLI::prompt('Your database username', 'root', 'required');
        $db_pswd     = CLI::prompt('Your database password', null);
        $db_driver   = CLI::prompt('Your database driver', 'MySQLi');
        $db_prefix   = CLI::prompt('Your database prefix', null);
        $db_port     = CLI::prompt('Your database port', '3306', 'required');
        CLI::newLine();


        if (!$this->editENV(array($env, $base_url, $db_hostname, $db_name, $db_user, $db_pswd, $db_driver, $db_prefix, $db_port))) {
            CLI::print('Settings could not be applied', 'red');
            CLI::newLine();
            return EXIT_ERROR;
            
        } else {
            CLI::print('Settings applied successfully!', 'green');
            CLI::newLine();
        }

        $this->call('migrate');

        if ($env === 'development') {
            $this->call('db:seed', ['MainSeeder']);

        } else {
            $this->call('db:seed', ['ProdSeeder']);
        }

        CLI::newLine();
        CLI::write('Setup Completed', 'blue', 'yellow');
    }


    public function editENV(array $props): bool
    {
        $baseEnv = ROOTPATH . 'env';
        $envFile = ROOTPATH . '.env';

        if (!is_file($envFile)) {
            if (!is_file($baseEnv)) {
                CLI::write('Both default shipped `env` file and custom `.env` are missing.', 'yellow');
                CLI::write('It is impossible to write the new environment type.', 'yellow');
                CLI::newLine();

                return false;
            }

            copy($baseEnv, $envFile);
        }


        $settings = [
            'CI_ENVIRONMENT',
            'app.baseURL',
            'database.default.hostname',
            'database.default.database',
            'database.default.username',
            'database.default.password',
            'database.default.DBDriver',
            'database.default.DBPrefix',
            'database.default.port'
        ];


        for ($i = 0; $i < sizeof($settings); $i++) {
            $pattern = sprintf('/^[#\s]*%s[=\s](.*)$/m', $settings[$i]);
            $result = file_put_contents($envFile, preg_replace($pattern, "$settings[$i] = $props[$i]", file_get_contents($envFile), 1));

            if ($result === false) {
                return false;
            }

            putenv($settings[$i]);
            unset($_ENV[$settings[$i]], $_SERVER[$settings[$i]]);
            (new DotEnv(ROOTPATH))->load();
        }

        return true;
    }
}
