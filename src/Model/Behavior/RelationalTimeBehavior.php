<?php
namespace App\Model\Behavior;

use Cake\Event\Event;
use Cake\I18n\Time;
use Cake\ORM\Behavior;

class RelationalTimeBehavior extends Behavior
{
    protected $_defaultConfig = [
        'fields' => [
            'attendee_cancellation' => [
                'operation' => 'subtract',
                'measure' => 'days',
                'source' => 'event_start'
            ],
            'booking_start' => [
                'operation' => 'subtract',
                'measure' => 'minutes',
                'source' => 'event_start'
            ],
            'booking_end' => [
                'operation' => 'add',
                'measure' => 'minutes',
                'source' => 'event_end'
            ]
        ],
        'format' => 'Y-m-d H:i:s',
        'timezone' => 'UTC'
    ];

    /**
     * Creates SQL dates defined in config by number of days/minutes using a different field
     *
     * Example:
     *  attendee_cancellation starts off as an integer number of days
     *  changes attendee_cancellation to sql date by subtracting number of days from event_start
     *
     * @param \ArrayObject $data Data object to be modified
     * @return void
     */
    public function convertFromOffset(\ArrayObject $data)
    {
        $config = $this->config();
        $operations = ['add' => 'add', 'subtract' => 'sub'];
        $measures = ['Days', 'Minutes'];
        foreach ($config['fields'] as $field => $options) {
            if (isset($data[$options['source']])) {
                $source = Time::createFromFormat(
                    $config['format'],
                    $data[$options['source']],
                    $config['timezone']
                );

                $measure = ucfirst($options['measure']);
                if (array_key_exists($options['operation'], $operations) && in_array($measure, $measures)) {
                    $action = $operations[$options['operation']] . $measure;
                    if (is_callable([$source, $action])) {
                        $source->$action($data[$field]);
                    }
                }

                $data[$field] = $source->format('Y-m-d H:i:s');
            }
        }
    }

    /**
     * Returns differences in dates defined in config in days or minutes
     *
     * @param unknown $date Date in 'm/d/y, g:i A' format
     * @param unknown $relation Date in 'm/d/y, g:i A' format
     * @param unknown $field Field Name
     * @return int|false Number of days or minutes
     */
    public function convertToOffset($date, $relation, $field)
    {
        $config = $this->config();
        $operation = ($field == 'booking_end' ? 'add' : 'sub');
        $measure = ($field == 'attendee_cancellation' ? 'Days' : 'Minutes');

        if (isset($date) && isset($relation)) {
            $date = Time::createFromFormat(
                'm/d/y, g:i A',
                $date,
                $config['timezone']
            );

            $relation = Time::createFromFormat(
                'm/d/y, g:i A',
                $relation,
                $config['timezone']
            );

            $interval = $relation->diff($date);

            if ($measure == 'Minutes') {
                return $interval->h * 60 + $interval->i;
            } else {
                return $interval->days;
            }
        }

        return false;
    }

    /**
     * CakePHP beforeMarshal event handler
     *
     * Converts data from offset
     * @see RelationalTimeBehavior::convertFromOffset
     *
     * @param Event $event Event object
     * @param \ArrayObject $data Data to marshal
     * @param \ArrayObject $options Options for marshaller
     * @return void
     */
    public function beforeMarshal(Event $event, \ArrayObject $data, \ArrayObject $options)
    {
        $this->convertFromOffset($data);
    }
}
