<?php

namespace App\Models;

use CodeIgniter\Model;

class SiteConfig extends Model
{
    protected $table      = 'config';

    protected $returnType     = 'array';

    protected $allowedFields = [
        'site_name',
        'site_description',
        'sv_ip',
        'coin_multiplier',
        'site_youtube',
        'enableDownload',
        'downloadContent',
    ];
}
