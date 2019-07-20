<?php
use Migrations\AbstractSeed;

/**
 * Exams seed.
 */
class ExamsSeed extends AbstractSeed // @codingStandardsIgnoreLine
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
        // @codingStandardsIgnoreStart
        $data = [
            [
                'id' => '1',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
                'name' => 'Text Exam #1',
                'description' => 'This is a test exam, for testing.

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ligula leo, mollis nec libero id, molestie suscipit tellus. Morbi dapibus elit a augue efficitur hendrerit. Suspendisse molestie mauris eu ligula gravida, et vestibulum metus dictum. Fusce ut blandit justo. Vestibulum egestas, turpis sed aliquam ultrices, lorem lacus aliquet est, nec feugiat enim lorem consectetur arcu. Aenean aliquam vel elit blandit tincidunt. Duis augue quam, dapibus at eros eget, laoreet malesuada erat. Etiam dignissim fermentum elit a mattis. Donec lobortis risus vel laoreet interdum. Morbi elementum metus id nibh elementum lobortis. Maecenas eget libero sit amet ipsum laoreet fermentum. Nullam iaculis felis in ex venenatis, vel facilisis nisi sollicitudin. Morbi et mattis lacus, nec imperdiet ipsum. Nulla ac justo in odio porttitor pellentesque. Phasellus viverra tempus erat eget fringilla.',
                'fulfills_prerequisite_id' => NULL,
                'requires_prerequisite_id' => NULL,
                'committee_id' => '15',
                'passing_value' => '80',
            ],
        ];
        // @codingStandardsIgnoreEnd

        $table = $this->table('exams');
        $table->insert($data)->save();
    }
}
