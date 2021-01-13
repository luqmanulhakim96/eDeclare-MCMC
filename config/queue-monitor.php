<?php

return [
    /*
     * Set the table to be used for monitoring data.
     */
             'connection' => 'sqlsrv',

    'table' => 'queue_monitor',
    // 'drivers' => [
    //     'database' => [
    //         'table'      => 'queue_monitor',
    //         'connection' => 'sqlsrv',
    //     ],
    // ],
    // 'database' => [
    //         'connection' => 'sqlsrv',
    //         'driver' => 'database',
    //         'table' => 'queue_monitor',
    //
    //     ],


    /*
     * Set the model used for monitoring.
     * If using a custom model, be sure to implement the
     *   romanzipp\QueueMonitor\Models\Contracts\MonitorContract
     * interface or extend the base model.
     */
    'model' => \romanzipp\QueueMonitor\Models\Monitor::class,

    /*
     * The optional UI settings.
     */
    'ui' => [

        /*
         * Set the monitored jobs count to be displayed per page.
         */
        'per_page' => 35,
    ],

    // 'drivers' => [
    //     'database' => [
    //         'table'      => 'queue_monitor',
    //         'connection' => 'sqlsrv',
    //     ],
    // ],

    // 'connections' => [
    //
    //     'database' => [
    //             'connection' => 'sqlsrv',
    //             'driver' => 'database',
    //             'table' => 'jobs',
    //             'queue' => 'default',
    //             'retry_after' => 90,
    //         ],
    //   ],


];
