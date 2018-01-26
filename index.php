<?php

session_start();

require '/vendor/autoload.php';

$app = new \atk4\ui\App('Теорема Пифагора');
$app->initLayout('Centered');

if (isset($_SESSION['answer'])) {
    $c = $_SESSION['answer'];
    $answer = 'Гипотенуза = '.$c;
    $app->add(['Label',$answer,'big orange']);
} else {
    $app->add(['Header','Введите данные','huge blue']);
};

$app->add(['ui'=>'hidden divider']);

$ask = new \atk4\data\Model(new \atk4\data\Persistence_Array($a));
$ask->addField('a',['required'=>TRUE,'caption'=>'Катет №1']);
$ask->addField('b',['required'=>TRUE,'caption'=>'Катет №2']);

$form = $app->layout->add('Form');
$form->setModel($ask);
$form->buttonSave->set('Высчитать');
$form->onSubmit(function($form) {
    $a = $form->model['a'];
    $b = $form->model['b'];
    $c = sqrt(($a*$a)+($b*$b));
    $_SESSION['answer'] = $c;
    return new \atk4\ui\jsExpression('document.location = "index.php" ');
 });
