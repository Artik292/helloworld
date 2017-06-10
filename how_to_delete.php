<?PHP
require 'vendor/autoload.php';
date_default_timezone_set('UTC');
include 'init.php';

$db = new
\atk4\data\Persistence_SQL('mysql:dbname=try;host=localhost','root','');

class friends extends \atk4\data\Model {
	public $table = 'hope';
	
function init() {
	parent::init();
	$this->addField('id');
	$this->addField('name');
	$this->addField('surname');
	$this->addField('address');
}

$m = new friends($db);
$m->load(7); // ielādē ierakstu id=7
$m->action('delete')->execute();