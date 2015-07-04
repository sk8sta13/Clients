<?php
/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the LGPL. For more information, see
 * <http://www.doctrine-project.org>.
 */

if (! defined('APPPATH')) {
	define('APPPATH', str_replace('third_party' . DIRECTORY_SEPARATOR . 'DoctrineORM-2.2.2' . DIRECTORY_SEPARATOR . 'bin', '', dirname(__FILE__)));
}

if (! defined('BASEPATH')) {
	define('BASEPATH', '');
}

require_once APPPATH . 'third_party/DoctrineORM-2.2.2/libraries/Doctrine.php';

$doctrine = new Doctrine();
$helperSet = new \Symfony\Component\Console\Helper\HelperSet([
	'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($doctrine->em->getConnection()),
	'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($doctrine->em)
]);

$cli = new \Symfony\Component\Console\Application('Doctrine Command Line Interface (CodeIgniter integration by Marcelo)', Doctrine\ORM\Version::VERSION);
$cli->setCatchExceptions(true);
$cli->setHelperSet($helperSet);
$cli->addCommands([
	//DBAL Commands
	new \Doctrine\DBAL\Tools\Console\Command\RunSqlCommand(),
	new \Doctrine\DBAL\Tools\Console\Command\ImportCommand(),

	//ORM Commands
	new \Doctrine\ORM\Tools\Console\Command\ClearCache\MetadataCommand(),
	new \Doctrine\ORM\Tools\Console\Command\ClearCache\ResultCommand(),
	new \Doctrine\ORM\Tools\Console\Command\ClearCache\QueryCommand(),
	new \Doctrine\ORM\Tools\Console\Command\SchemaTool\CreateCommand(),
	new \Doctrine\ORM\Tools\Console\Command\SchemaTool\UpdateCommand(),
	new \Doctrine\ORM\Tools\Console\Command\SchemaTool\DropCommand(),
	new \Doctrine\ORM\Tools\Console\Command\EnsureProductionSettingsCommand(),
	new \Doctrine\ORM\Tools\Console\Command\ConvertDoctrine1SchemaCommand(),
	new \Doctrine\ORM\Tools\Console\Command\GenerateRepositoriesCommand(),
	new \Doctrine\ORM\Tools\Console\Command\GenerateEntitiesCommand(),
	new \Doctrine\ORM\Tools\Console\Command\GenerateProxiesCommand(),
	new \Doctrine\ORM\Tools\Console\Command\ConvertMappingCommand(),
	new \Doctrine\ORM\Tools\Console\Command\RunDqlCommand(),
	new \Doctrine\ORM\Tools\Console\Command\ValidateSchemaCommand()
]);

$cli->run();

/*require_once 'Doctrine/Common/ClassLoader.php';

$classLoader = new \Doctrine\Common\ClassLoader('Doctrine');
$classLoader->register();

$classLoader = new \Doctrine\Common\ClassLoader('Symfony', 'Doctrine');
$classLoader->register();

$configFile = getcwd() . DIRECTORY_SEPARATOR . 'cli-config.php';

$helperSet = null;
if (file_exists($configFile)) {
    if ( ! is_readable($configFile)) {
        trigger_error(
            'Configuration file [' . $configFile . '] does not have read permission.', E_ERROR
        );
    }

    require $configFile;

    foreach ($GLOBALS as $helperSetCandidate) {
        if ($helperSetCandidate instanceof \Symfony\Component\Console\Helper\HelperSet) {
            $helperSet = $helperSetCandidate;
            break;
        }
    }
}

$helperSet = ($helperSet) ?: new \Symfony\Component\Console\Helper\HelperSet();

\Doctrine\ORM\Tools\Console\ConsoleRunner::run($helperSet);*/
