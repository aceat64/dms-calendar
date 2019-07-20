<?php
use Migrations\AbstractSeed;

/**
 * Answers seed.
 */
class AnswersSeed extends AbstractSeed // @codingStandardsIgnoreLine
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => '1',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
                'question_id' => '1',
                'name' => '1',
                'correct' => '0',
            ],
            [
                'id' => '2',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
                'question_id' => '1',
                'name' => '3',
                'correct' => '1',
            ],
            [
                'id' => '3',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
                'question_id' => '1',
                'name' => '7',
                'correct' => '0',
            ],
            [
                'id' => '4',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
                'question_id' => '1',
                'name' => '9',
                'correct' => '0',
            ],
            [
                'id' => '5',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
                'question_id' => '2',
                'name' => '1',
                'correct' => '0',
            ],
            [
                'id' => '6',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
                'question_id' => '2',
                'name' => '2',
                'correct' => '1',
            ],
            [
                'id' => '7',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
                'question_id' => '2',
                'name' => '3',
                'correct' => '0',
            ],
            [
                'id' => '8',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
                'question_id' => '2',
                'name' => '4',
                'correct' => '1',
            ],
            [
                'id' => '9',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
                'question_id' => '3',
                'name' => 'Banana',
                'correct' => '1',
            ],
            [
                'id' => '10',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
                'question_id' => '3',
                'name' => 'Apple',
                'correct' => '1',
            ],
            [
                'id' => '11',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
                'question_id' => '3',
                'name' => 'Onion',
                'correct' => '0',
            ],
            [
                'id' => '12',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
                'question_id' => '4',
                'name' => '6',
                'correct' => '1',
            ],
            [
                'id' => '13',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
                'question_id' => '4',
                'name' => '16',
                'correct' => '0',
            ],
            [
                'id' => '14',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
                'question_id' => '4',
                'name' => '152',
                'correct' => '0',
            ],
            [
                'id' => '15',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
                'question_id' => '4',
                'name' => '1',
                'correct' => '0',
            ],
        ];

        $table = $this->table('answers');
        $table->insert($data)->save();
    }
}
