<?php

namespace App\Http\Transformers;

use App\Helpers\Helper;
use App\Models\License;
use App\Models\WaitList;
use App\Models\Supplier;
use App\Models\LicenseSeat;
use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Collection;

class LicensesTransformer
{
    public function transformLicenses(Collection $licenses, $total)
    {
        $array = [];
        foreach ($licenses as $license) {
            $array[] = self::transformLicense($license);
        }

        return (new DatatablesTransformer)->transformDatatables($array, $total);
    }

    public function transformRequestedLicenses(Collection $licenses, $total)
    {
        $array = [];
        foreach ($licenses as $license) {
            $array[] = $this->transformRequestedLicense($license);
        }

        return [
            'licenses' => $array,
            'total' => $total
        ];
    }

    /**
     * Transform a single requestable license (only license name).
     *
     * @param  License $license
     * @return array
     */

     // Added by USA Team - Sends requestable licenses to the portal for display
    public function transformRequestedLicense(License $license)
    {
        $user = auth()->user();
        $assignedToUser = LicenseSeat::where('assigned_to', $user->id)->where('license_id', $license->id)->exists();
        $supplier = Supplier::where('id', $license->supplier_id)->first();
        $waitlist = new WaitList();
        $isOnWaitList = $waitlist->isOnWaitLicenseList($user, $license->id);

        return [
            'name' => e($license->name ?? null),
            'freeSeats' => e($license->freeSeats()->count()),
            'id' => e($license->id),
            'manufacturer' => e($license->manufacturer->name ?? null),
            'supplier' => e($supplier->name ?? null),
            'is_assigned_to_user' => e($assignedToUser),
            'is_requested_by_user' => e($license->isRequestedBy($user)),
            'is_on_waitlist' => $isOnWaitList,
        ];
    }

    public function transformLicense(License $license)
    {
        $array = [
            'id' => (int) $license->id,
            'name' => e($license->name),
            'company' => ($license->company) ? ['id' => (int) $license->company->id, 'name'=> e($license->company->name)] : null,
            'manufacturer' =>  ($license->manufacturer) ? ['id' => (int) $license->manufacturer->id, 'name'=> e($license->manufacturer->name)] : null,
            'product_key' => (Gate::allows('viewKeys', License::class)) ? e($license->serial) : '------------',
            'order_number' => ($license->order_number) ? e($license->order_number) : null,
            'purchase_order' => ($license->purchase_order) ? e($license->purchase_order) : null,
            'purchase_date' => Helper::getFormattedDateObject($license->purchase_date, 'date'),
            'termination_date' => Helper::getFormattedDateObject($license->termination_date, 'date'),
            'depreciation' => ($license->depreciation) ? ['id' => (int) $license->depreciation->id,'name'=> e($license->depreciation->name)] : null,
            'purchase_cost' => Helper::formatCurrencyOutput($license->purchase_cost),
            'purchase_cost_numeric' => $license->purchase_cost,
            'notes' => Helper::parseEscapedMarkedownInline($license->notes),
            'expiration_date' => Helper::getFormattedDateObject($license->expiration_date, 'date'),
            'seats' => (int) $license->seats,
            'free_seats_count' => (int) $license->free_seats_count,
            'requestable' => ($license->requestable) ? (bool) ($license->requestable) : false,
            'min_amt' => ($license->min_amt) ? (int) ($license->min_amt) : null,
            'license_name' =>  ($license->license_name) ? e($license->license_name) : null,
            'license_email' => ($license->license_email) ? e($license->license_email) : null,
            'reassignable' => ($license->reassignable == 1) ? true : false,
            'maintained' => ($license->maintained == 1) ? true : false,
            'supplier' =>  ($license->supplier) ? ['id' => (int) $license->supplier->id, 'name'=> e($license->supplier->name)] : null,
            'category' =>  ($license->category) ? ['id' => (int) $license->category->id, 'name'=> e($license->category->name)] : null,
            'created_by' => ($license->adminuser) ? [
                'id' => (int) $license->adminuser->id,
                'name'=> e($license->adminuser->present()->fullName()),
            ] : null,
            'created_at' => Helper::getFormattedDateObject($license->created_at, 'datetime'),
            'updated_at' => Helper::getFormattedDateObject($license->updated_at, 'datetime'),
            'deleted_at' => Helper::getFormattedDateObject($license->deleted_at, 'datetime'),
            'user_can_checkout' => (bool) ($license->free_seats_count > 0),
        ];

        $permissions_array['available_actions'] = [
            'checkout' => Gate::allows('checkout', License::class),
            'checkin' => Gate::allows('checkin', License::class),
            'clone' => Gate::allows('create', License::class),
            'update' => Gate::allows('update', License::class),
            'delete' => (Gate::allows('delete', License::class) && ($license->seats == $license->availCount()->count())) ? true : false,
        ];

        $array += $permissions_array;

        return $array;
    }

    public function transformAssetsDatatable($licenses)
    {
        return (new DatatablesTransformer)->transformDatatables($licenses);
    }
}