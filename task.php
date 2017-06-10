<?PHP
require 'vendor/autoload.php';

$app = new \atk4\ui\App('Registration');
$app->initLayout('Centered');

$db = new
\atk4\data\Persistence_SQL('mysql:dbname=agile_education;host=localhost','root','');
class Client extends \atk4\data\Model {
	public $table = 'friends';
	
function init() {
	parent::init();
	$this->addField('Name');
	$this->addField('Surname');
	$this->addField('Phone_number');
}
}

    /*$a = [];
    $m_register = new \atk4\data\Model(new \atk4\data\Persistence_Array($a));
		
    $f = $app->add(new \atk4\ui\Form(['segment']));
    $f->setModel($m_register); */


$form = $app->layout->add('Form');
$form->setModel(new Client($db));


$form->onSubmit(function($form) {
	If ($form->model['Name'] == '') {
		return $form->error('Name', "This place can't be empty.");		
	} 
		If ($form->model['Surname'] == '') {
		return $form->error('Surname', "This place can't be empty.");		
	} 
		If ($form->model['Phone_number'] == '') {
		return $form->error('Phone_number', "This place can't be empty.");		
	} 
	$form->model->save();
	return $form->success('Good Job!!!');	
});

If ($_GET['key'] == 'ok') {
	$button = $app->layout->add(['Button', "Check your friends", 'icon'=>'smile']);
	$button->link('taskpart2');
	};