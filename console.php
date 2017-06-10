<?PHP

include 'vendor/autoload.php';
$db = new
\atk4\data\Persistence_SQL('mysql:dbname=agile_education;host=localhost','root','');
eval(\Psy\sh());