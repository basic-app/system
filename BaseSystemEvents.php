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
use BasicApp\System\Events\SystemUpdateEvent;

abstract class BaseSystemEvents extends \CodeIgniter\Events\Events
{
    const EVENT_UPDATE = 'ba:update';

    const EVENT_SEED = 'ba:seed';
    const EVENT_SEED2 = 'ba:seed2';
    const EVENT_SEED3 = 'ba:seed3';
    const EVENT_SEED4 = 'ba:seed4';
    const EVENT_SEED5 = 'ba:seed5';

    const EVENT_RESET = 'ba:reset';
    
    public static function update(array $params = [])
    {
        $event = new SystemUpdateEvent;

        $event->params = $params;

        static::trigger(static::EVENT_UPDATE, $event);
    }

    public static function seed(array $params = [])
    {
        $event = new SystemSeedEvent;

        $event->params = $params;

        static::trigger(static::EVENT_SEED, $event);
    }

    public static function seed2(array $params = [])
    {
        $event = new SystemSeedEvent;

        $event->params = $params;

        static::trigger(static::EVENT_SEED2, $event);
    }

    public static function seed3(array $params = [])
    {
        $event = new SystemSeedEvent;

        $event->params = $params;

        static::trigger(static::EVENT_SEED3, $event);
    }

    public static function seed4(array $params = [])
    {
        $event = new SystemSeedEvent;

        $event->params = $params;

        static::trigger(static::EVENT_SEED4, $event);
    }

    public static function seed5(array $params = [])
    {
        $event = new SystemSeedEvent;

        $event->params = $params;

        static::trigger(static::EVENT_SEED5, $event);
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

    public static function onSeed2($callback)
    {
        static::on(static::EVENT_SEED2, $callback);
    }

    public static function onSeed3($callback)
    {
        static::on(static::EVENT_SEED3, $callback);
    }

    public static function onSeed4($callback)
    {
        static::on(static::EVENT_SEED4, $callback);
    }

    public static function onSeed5($callback)
    {
        static::on(static::EVENT_SEED5, $callback);
    }

    public static function onReset($callback)
    {
        static::on(static::EVENT_RESET, $callback);
    }
}