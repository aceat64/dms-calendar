<?php
use Migrations\AbstractSeed;

/**
 * Questions seed.
 */
class QuestionsSeed extends AbstractSeed // @codingStandardsIgnoreLine
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
                'exam_id' => '1',
                'name' => 'If x = 3 then what does x equal?',
                'value' => '25',
                'position' => '1',
            ],
            [
                'id' => '2',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
                'exam_id' => '1',
                'name' => 'Which of these numbers are even?',
                'value' => '25',
                'position' => '2',
            ],
            [
                'id' => '3',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
                'exam_id' => '1',
                'name' => 'Which of these things is a fruit?',
                'value' => '25',
                'position' => '3',
            ],
            [
                'id' => '4',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
                'exam_id' => '1',
                'name' => 'If you have 6 bananas how many bananas do you have?',
                'value' => '25',
                'position' => '4',
            ],
        ];

        $table = $this->table('questions');
        $table->insert($data)->save();
    }
}
