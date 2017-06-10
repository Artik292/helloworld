<?PHP
require 'vendor/autoload.php';

$app = new \atk4\ui\App('Registration');
$app->initLayout('Centered');

$db = new
\atk4\data\Persistence_SQL('mysql:dbname=try;host=localhost','root','');
class Client extends \atk4\data\Model {
	public $table = 'hope';

function init() {
	parent::init();
	$this->addField('Name');
	$this->addField('Surname');
	$this->addField('Address');
}
}


$form = $app->layout->add('Form');
$form->setModel(new Client($db));


$form->onSubmit(function($form) {
	$form->model->save();
	return $form->success('Record updated');
	
});