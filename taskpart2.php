<?php
require 'vendor/autoload.php';
date_default_timezone_set('UTC');
include 'init.php';
$layout= new \atk4\ui\App('My First App');
$layout->initLayout('Centered');
$db = new
\atk4\data\Persistence_SQL('mysql:dbname=agile_education;host=localhost','root','');
$bb = $layout->add(['View', 'ui'=>'buttons']);
$table = $layout->add(['Table', 'celled'=>true]);
$bb->add(['Button', 'Refresh Table', 'icon'=>'refresh'])
    ->on('click', new \atk4\ui\jsReload($table));
$bb->on('click', $table->js()->reload());
$table->setModel(new SomeData($db), false);
$table->addColumn('Name', new \atk4\ui\TableColumn\Link(['details', 'id'=>'{$id}']));
$table->addColumn('Surname', new \atk4\ui\TableColumn\Template('{$surname}'))->addClass('warning');
$table->addColumn('Phone_number', new \atk4\ui\TableColumn\Money()); //->addClass('right aligned single line', 'all'));
$table->addHook('getHTMLTags', function ($table, $row) {
    if ($row->id == 1) {
        return [
            'name'=> $table->app->getTag('div', ['class'=>'ui ribbon label'], $row['name']),
        ];
    }
});
$table->addTotals(['name'=>'Totals:', 'salary'=>['sum']]);