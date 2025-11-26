<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Rats\Zkteco\Lib\ZKTeco;
use Illuminate\Support\Facades\DB;

class addDevice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:device';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $device = array(
            'ip' => '192.168.68.54',
            'port' => 4370,
            'model_name' => 'F18',
            'status' => 1,
        );
        DB::table('zkteco_devices')->insert($device);
    }
}
