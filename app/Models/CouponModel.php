<?php

namespace App\Models;
use Codeigniter\Model;

class CouponModel extends Model {
    protected $table      = 'coupon';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'coupon_code',
        'coupon_title',
        'coupon_action',
        'coupon_limit',
        'active'
    ];
}