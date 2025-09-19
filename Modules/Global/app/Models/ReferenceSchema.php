<?php

namespace Modules\Global\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReferenceSchema extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['type', 'prefix', 'initial_value', 'increment','next_value', 'digits' ,'status'];

    const STATUS_SELECT = [
        'active' => 'Active',
        'inactive' => 'Inactive',
    ];

    public static function generate($type, $manualSerial = null)
    {
        if ($manualSerial) {
            // Check if the manual serial number already exists
            $exists = self::checkIfSerialExists($type, $manualSerial);
            if ($exists) {
                throw new \Exception('Serial number already exists.');
            }
            return $manualSerial;
        }

        $schema = ReferenceSchema::where('type', $type)->firstOrFail();

        $nextNumber = $schema->next_value;
        $schema->next_value += $schema->increment;
        $schema->save();

        return $schema->prefix . str_pad($nextNumber, $schema->digits??6, '0', STR_PAD_LEFT);
    }

    private static function checkIfSerialExists($type, $serial)
    {
        switch ($type) {
            case 'sales_order':
                // return SalesOrder::where('order_number', $serial)->exists();
            case 'purchase_order':
                // return PurchaseOrder::where('order_number', $serial)->exists();
            case 'invoice':
                // return Invoice::where('invoice_number', $serial)->exists();
            default:
                return false;
        }
    }

    public static function getNextReference($type)
    {
        // Retrieve the schema for the given type
        $schema = ReferenceSchema::where('type', $type)->firstOrFail();

        // Return the upcoming reference (without incrementing next_value)
        return $schema->prefix . str_pad($schema->next_value, $schema->digits??6, '0', STR_PAD_LEFT);
    }
}
