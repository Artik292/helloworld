<?

require __DIR__ . '/vendor/autoload.php';

use Twilio\Rest\Client;
use \atk4\ui\Button;

require 'vendor/autoload.php';
$app=new \atk4\ui\App('SMS testing');
$app->initLayout('Centered');

$button = $app->layout->add(['Button', "Send SMS",'icon'=>'empty star']);

$password = 'vendor/autoload.php';


$button->on('click', function ($button) use ($password) {
  $sid = 'AC87f5a69db5064f1cb8d478ba91ecdd26';
  $token = 'd3e59dabad072a5a1a0d42c62ba9bd30';
  $client = new Client($sid, $token);

  $client->messages->create(
      '+37122004863',
      array(
          'from' => '37128914498',
          'body' => 'Your password is: '.$password
      )
  );
});
