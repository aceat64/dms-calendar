<?php
namespace App\Model\Behavior;

use Cake\Event\Event;
use Cake\I18n\Time;
use Cake\ORM\Behavior;

/**
 * FriendlyTimeBehavior Utility class
 */
class FriendlyTimeBehavior extends Behavior
{
    protected $_defaultConfig = [
        'fields' => ['event_start', 'event_end'],
        'format' => 'm/d/Y g:i A',
        'from_timezone' => 'America/Chicago',
        'to_timezone' => 'UTC'
    ];

    /**
     * Changes fields to timezone as defined in config by 'to_timezone' and into SQL format
     *
     * @param \Cake\ArrayObject $data Data to convert.
     * @return void
     */
    public function convertFromFormat(\ArrayObject $data)
    {
        $config = $this->config();
        foreach ($config['fields'] as $field) {
            if (isset($data[$field])) {
                $dateTime = Time::createFromFormat(
                    $config['format'],
                    $data[$field],
                    $config['from_timezone']
                );
                $dateTime->setTimeZone(new \DateTimeZone($config['to_timezone']));
                $data[$field] = $dateTime->format('Y-m-d H:i:s');
            }
        }
    }

    /**
     * Changes date to timezone as defined in config by 'from_timezone' and into readable format
     *
     * @param \DateTime $date Date object to convert.
     * @return \Time
     */
    public function convertToFormat($date)
    {
        $config = $this->config();
        $dateTime = Time::createFromFormat(
            'm/d/y, g:i A',
            $date,
            $config['to_timezone']
        );
        $dateTime->setTimeZone(new \DateTimeZone($config['from_timezone']));
        $date = $dateTime->format($config['format']);

        return $date;
    }

    /**
     * beforeMarshal
     *
     * @param \Event $event event
     * @param \ArrayObject $data data
     * @param \ArrayObject $options options
     * @return void
     */
    public function beforeMarshal(Event $event, \ArrayObject $data, \ArrayObject $options)
    {
        $this->convertFromFormat($data);
    }
}
