<?php

namespace App\Console\Commands;

use App\Employee;
use Illuminate\Console\Command;

class ShuffleOnCall extends Command
{

    public $OnCallRotation = [
        'Nick Baker',
        'Mark Vince',
        'Jeff Kolesnikowicz',
        'Dillon Formo',
        'Travis Reddell',
        'Aaron Hall'
    ];

    private $employees;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'oncall:shuffle {count=2 : Employees to put On Call}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Shuffle the current on call employees';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->employees = collect($this->OnCallRotation);
    }

    private function getRandomEmployee()
    {
        $this->employees = $this->employees->shuffle();
        $name = $this->employees->pop();
        if (empty($name)) {
            return null;
        }
        $employee = Employee::where('name', $name)->first();

        // Let's not put them on call twice in a row
        // TODO: implement Knuth Shuffle
        while ($employee->isOnCall()) {
            $employee = $this->getRandomEmployee();
        }

        return $employee;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Shuffling On Call');
        $count = $this->argument('count');
        Employee::clearOnCall();
        for ($i = 0; $i < $count; $i++) {
            $employee = $this->getRandomEmployee();
            $employee->setOnCall()->save();
            $this->line($employee->name . ' set to On Call.');
        }
        $this->comment('Finished.');
    }
}
