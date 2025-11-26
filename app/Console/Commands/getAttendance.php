<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Rats\Zkteco\Lib\ZKTeco;
use Illuminate\Support\Facades\DB;

class getAttendance extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:attendance';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command use for get attendance data by zkteco';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $devices = ['192.168.68.54'];
        foreach ($devices as $device) {
            $zk = new ZKTeco($device, 4370);

            if ($zk->connect()) {
                $zk->disableDevice();
                $workCode = $zk->workCode();
                $serialNumber = $zk->serialNumber();
                $logs = $zk->getAttendance();

                if (!empty($logs)) {
                    foreach ($logs as $log) {
                        $finger_print_uid = DB::table('employee_attendance')->where('finger_print_uid', $log['uid'])->value('finger_print_uid');
                        if($log['uid'] != $finger_print_uid) {
                            $employee_attendance = [
                                'finger_print_id'   => $log['id'],
                                'finger_print_uid'  => $log['uid'],
                                'in_out_time'       => $log['timestamp'],
                                'WorkCode'          => $workCode,
                                'sn'                => $serialNumber,
                                'mechine_sl'        => 1,
                            ];
                            DB::table('employee_attendance')->insert($employee_attendance);
                        }
                        $this->info('Employee Attendance Input: ' . json_encode($log));
                    }
                } else {
                    $this->warn('No attendance logs found for device ' . $device);
                }

                $zk->clearAttendance();
                
                $zk->enableDevice();
                $zk->disconnect();
            } else {
                $this->error('Failed to connect to device ' . $device);
            }
        }
    }
}
