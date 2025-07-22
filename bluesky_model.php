<?php

use munkireport\models\MRModel as Eloquent;

class Bluesky_model extends Eloquent
{
    protected $table = 'bluesky';

    protected $hidden = ['id', 'serial_number'];

    protected $fillable = [
      'serial_number', //$this->rt['serial_number'] = 'VARCHAR(255) UNIQUE';
      'version', // Version number of BlueSky software
      'vnclocalonly', // State of VNCLocalOnlyConnections in com.apple.RemoteManagement.plist
      'passwordauth', // State of PasswordAuthentication in etc/ssh/ssh_config
    ];
}
