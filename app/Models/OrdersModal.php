<?php

namespace App\Models;

use CodeIgniter\Model;

class OrdersModal extends Model
{
    const STATUS_OPEN = 1;
    const STATUS_INVOICED = 2;
    const STATUS_REJECTED = 3;
    const TYPE_WHOLESALE = 1;
    const TYPE_RETAIL = 2;
    public static $status = [
        self::STATUS_OPEN => 'open',
        self::STATUS_INVOICED => 'invoice_created',
        self::STATUS_REJECTED => 'rejected',
    ];
    public static $types = [
        self::TYPE_RETAIL => 'eccomerce',
        self::TYPE_WHOLESALE => 'sales',
    ];
    protected $table      = 'orders';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['date', 'customer', 'type', 'inventory', 'inc_no', 'status', 'created_by'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
}
