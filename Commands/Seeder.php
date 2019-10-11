<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\System\Commands;

use BasicApp\System\SystemEvents;

class Seeder extends \BasicApp\Core\Command
{

    protected $group = 'Basic App';
    
    protected $name = 'ba:seeder';
    
    protected $description = 'Runs the "ba:seeder" trigger.';

    public function run(array $params)
    {
        SystemEvents::seeder();
    }

}