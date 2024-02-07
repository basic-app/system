<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\System;

use BasicApp\Core\Event;
use BasicApp\System\Events\SystemResetEvent;
use BasicApp\System\Events\SystemSeedEvent;

abstract class BaseSystemEvents extends \CodeIgniter\Events\Events
{

    const EVENT_UPDATE = 'ba:update';

    const EVENT_SEED = 'ba:seed';

    const EVENT_RESET = 'ba:reset';
    
    public static function update(array $params = [])
    {
        $event = new Event;

        if (array_search('reset', $params) !== false)
        {
            $event->reset = true;
        }
        else
        {
            $event->reset = false;
        }

        static::trigger(static::EVENT_UPDATE, $event);
    }

    public static function seed(array $params = [])
    {
        $event = new SystemSeedEvent;

        $event->params = $params;

        static::trigger(static::EVENT_SEED, $event);
    }

    public static function reset(array $params = [])
    {
        $event = new SystemResetEvent;

        $event->params = $params;

        static::trigger(static::EVENT_RESET, $event);
    }

    public static function onUpdate($callback)
    {
        static::on(static::EVENT_UPDATE, $callback);
    }

    public static function onSeed($callback)
    {
        static::on(static::EVENT_SEED, $callback);
    }

    public static function onReset($callback)
    {
        static::on(static::EVENT_RESET, $callback);
    }

}