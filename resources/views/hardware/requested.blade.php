@extends('layouts/default')

@section('title0')
    {{ trans('admin/hardware/general.requested') }}
    {{ trans('general.assets') }}
@stop

{{-- Page title --}}
@section('title')
    @yield('title0') @parent
@stop

{{-- Page content --}}
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            @if ($requestedItems->count() > 0 || $waitlistItems->count() > 0)
                                <div class="table-responsive">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#assets" data-toggle="tab">Assets <badge
                                                    class="badge badge-secondary"> {{ $pendingAssetRequestCount }}
                                                </badge>
                                            </a></li>
                                        <li><a href="#licenses" data-toggle="tab">Licenses <badge
                                                    class="badge badge-secondary"> {{ $pendingLicenseRequestCount }}
                                                </badge></a></li>
                                        <li><a href="#accessories" data-toggle="tab">Accessories <badge
                                                    class="badge badge-secondary"> {{ $pendingAccessoryRequestCount }}
                                                </badge></a></li>
                                        <li><a href="#components" data-toggle="tab">Components <badge
                                                    class="badge badge-secondary"> {{ $pendingComponentRequestCount }}
                                                </badge></a></li>
                                        <li><a href="#consumables" data-toggle="tab">Consumables <badge
                                            class="badge badge-secondary"> {{ $pendingConsumableRequestCount }}
                                        </badge></a></li>
                                        <li><a href="#waitlist" data-toggle="tab">Waitlist <badge
                                            class="badge badge-secondary"> {{ $waitlistItems->count() }}
                                        </badge></a></li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="assets">
                                            <table name="requestedAssets" id="requestedAssets"
                                                class="table table-striped snipe-table" data-toolbar="#toolbar"
                                                data-advanced-search="true" data-search="true" data-show-columns="true"
                                                data-show-export="true" data-pagination="true"
                                                data-id-table="requestedAssets" data-cookie-id-table="requestedAssets"
                                                data-export-options='{
                                                    "fileName": "export-assetrequests-{{ date('Y-m-d') }}",
                                                    "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                                                }'>
                                                <thead>
                                                    <tr role="row">
                                                        <th class="col-md-3">Item Name</th>
                                                        <th class="col-md-2 text-center" data-sortable="true">
                                                            {{ trans('admin/hardware/table.requesting_user') }}</th>
                                                        <th class="col-md-2">
                                                            {{ trans('admin/hardware/table.requested_date') }}</th>
                                                        <th class="col-md-2">Status</th>
                                                        <th class="col-md-2">{{ trans('button.actions') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($requestedItems as $request)
                                                        @if ($request->requestable && $request->itemType() == 'asset')
                                                            <tr>
                                                                {{ csrf_field() }}
                                                                <td>
                                                                    <a href="{{ config('app.url') }}/hardware/{{ $request->requestable->id }}">
                                                                        {{ $request->name() }}
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    @if ($request->requestingUser() && !$request->requestingUser()->trashed())
                                                                        <a href="{{ config('app.url') }}/users/{{ $request->requestingUser()->id }}">
                                                                            {{ $request->requestingUser()->present()->fullName() }}
                                                                        </a>
                                                                    @else
                                                                        (deleted user)
                                                                    @endif
                                                                </td>
                                                                <td>{{ App\Helpers\Helper::getFormattedDateObject($request->created_at, 'datetime', false) }}</td>
                                                                <td>
                                                                    @if ($request->fulfilled_at)
                                                                        <span class="label label-success">{{ trans('general.fulfilled') }}</span>
                                                                    @elseif ($request->canceled_at)
                                                                        <span class="label label-danger">{{ trans('general.canceled') }}</span>
                                                                    @else
                                                                        <span class="label label-warning">{{ trans('general.pending') }}</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if (!$request->fulfilled_at && !$request->canceled_at && $request->requestable->assigned_to == '')
                                                                    <a href="{{ config('app.url') }}/hardware/{{ $request->requestable->id }}/checkout/{{ $request->id }}"
                                                                        class="btn btn-success btn-sm" data-tooltip="true"
                                                                        title="{{ trans('general.checkout') }}">
                                                                        <i class="fas fa-check" style="color: white;"></i>
                                                                    </a>
                                                                    @elseif ($request->requestable->assigned_to != '')
                                                                    <a href="{{ config('app.url') }}/hardware/{{ $request->requestable->id }}/checkin"
                                                                        class="btn btn-sm bg-blue" data-tooltip="true"
                                                                        title="Check In Item"><i class="fas fa-sign-in-alt"></i></a>
                                                                    @endif
                                                                    @if (!$request->fulfilled_at && !$request->canceled_at)
                                                                        <!-- Cancel Button -->
                                                                        <button type="button" class="btn btn-warning btn-sm"
                                                                                data-tooltip="true"
                                                                                title="{{ trans('general.cancel_request') }}"
                                                                                data-toggle="modal"
                                                                                data-target="#cancelAssetRequestModal-{{ $request->id }}">
                                                                            <i class="fas fa-times"></i>
                                                                        </button>
                                                                        <!-- Cancel Asset Request Modal -->
                                                                        <div class="modal fade" id="cancelAssetRequestModal-{{ $request->id }}" tabindex="-1" role="dialog" aria-labelledby="cancelAssetRequestModalLabel-{{ $request->id }}">
                                                                            <div class="modal-dialog" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                            <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                        <h4 class="modal-title" id="cancelAssetRequestModalLabel-{{ $request->id }}">{{ trans('general.cancel_request') }}</h4>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <form id="cancelAssetRequestForm-{{ $request->id }}" method="POST" action="{{ route('account/request-item', [
                                                                                            $request->itemType(),
                                                                                            $request->requestable->id,
                                                                                            true,
                                                                                            $request->requestingUser()->id ?? auth()->id()
                                                                                        ]) }}">
                                                                                            @csrf
                                                                                            <div class="form-group">
                                                                                                <label for="cancelReason-{{ $request->id }}" class="control-label">Reason For Cancellation</label>
                                                                                                <textarea class="form-control" id="cancelReason-{{ $request->id }}" name="cancel_reason" rows="3"></textarea>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('general.close') }}</button>
                                                                                        <button type="submit" form="cancelAssetRequestForm-{{ $request->id }}" class="btn btn-warning">Submit</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane" id="licenses">
                                            <table name="requestedLicenses" id="requestedLicenses"
                                                class="table table-striped snipe-table" data-toolbar="#toolbar"
                                                data-pagination="true" data-id-table="requestedLicenses" data-search="true"
                                                data-show-columns="true" data-show-export="true"
                                                data-export-options='{
                                            "fileName": "export-requestedlicenses-{{ date('Y-m-d') }}",
                                            "ignoreColumn": ["actions"]
                                            }'>
                                                <thead>
                                                    <tr role="row">
                                                        <th class="col-md-2">{{ trans('admin/licenses/table.title') }}</th>
                                                        <th class="col-md-2 text-center">Quantity Requested</th>
                                                        <th class="col-md-1">
                                                            Remaining</th>
                                                        <th class="col-md-2">
                                                            {{ trans('admin/hardware/table.requesting_user') }}</th>
                                                        <th class="col-md-2">
                                                            {{ trans('admin/hardware/table.requested_date') }}</th>
                                                        <th class="col-md-2">{{ trans('general.status') }}</th>
                                                        <th class="col-md-1">{{ trans('button.actions') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($requestedItems as $request)
                                                        @if ($request->canceled_at === null && $request->itemType() == 'license')
                                                            <tr>
                                                                {{ csrf_field() }}
                                                                <td>
                                                                    @if ($request->license)
                                                                        <a
                                                                            href="{{ route('licenses.show', $request->license_id) }}">
                                                                            {{ $request->license->name }}
                                                                        </a>
                                                                    @else
                                                                        {{ trans('admin/licenses/general.deleted') }}
                                                                    @endif
                                                                </td>
                                                                <td>{{ $request->seats_requested }}</td>
                                                                <td>
                                                                    @if ($request->license && $request->license->canceled_at === null)
                                                                        {{ $request->license->freeSeats()->count() }}
                                                                    @else
                                                                        {{ trans('admin/licenses/general.not_available') }}
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if ($request->user)
                                                                        <a
                                                                            href="{{ route('users.show', $request->user->id) }}">
                                                                            {{ $request->user->present()->fullName() }}
                                                                        </a>
                                                                    @else
                                                                        {{ trans('general.user_deleted') }}
                                                                    @endif
                                                                </td>
                                                                <td>{{ \App\Helpers\Helper::getFormattedDateObject($request->created_at, 'datetime', false) }}
                                                                </td>
                                                                <td>
                                                                    @if ($request->fulfilled_at)
                                                                        <span
                                                                            class="label label-success">{{ trans('general.fulfilled') }}</span>
                                                                    @elseif ($request->canceled_at)
                                                                        <span
                                                                            class="label label-danger">{{ trans('general.canceled') }}</span>
                                                                    @else
                                                                        <span
                                                                            class="label label-warning">{{ trans('general.pending') }}</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if (!$request->fulfilled_at && !$request->canceled_at)
                                                                    @if( $request->license->freeSeats()->count() > 0 )
                                                                    <a href="{{ config('app.url') }}/licenses/{{ $request->license->id }}/checkout-request/{{ $request->id }}"
                                                                        class="btn btn-success btn-sm text"
                                                                        data-tooltip="true"
                                                                        title="{{ trans('general.checkout') }}">
                                                                        <i class="fas fa-check"
                                                                            style="color: white;"></i>
                                                                    </a>
                                                                    @endif
                                                                        <!-- Cancel Button -->
                                                                        <button type="button" class="btn btn-warning btn-sm"
                                                                                data-toggle="modal"
                                                                                data-target="#cancelLicenseModal"
                                                                                title="{{ trans('general.cancel_request') }}">
                                                                            <i class="fas fa-times"></i>
                                                                        </button>
                                                                        <!-- Cancel License Request Modal -->
                                                                        <div class="modal fade" id="cancelLicenseModal" tabindex="-1" role="dialog" aria-labelledby="cancelLicenseModalLabel">
                                                                            <div class="modal-dialog" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                            <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                        <h4 class="modal-title" id="cancelLicenseModalLabel">Cancel License Request</h4>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <form id="cancelLicenseForm" method="POST" action="{{ config('app.url') }}/account/cancel-license-request/{{ $request->license_id }}/{{ $request->user_id }}">
                                                                                            @csrf
                                                                                            <div class="form-group">
                                                                                                <label for="cancelReason" class="control-label">Reason For Cancellation</label>
                                                                                                <textarea class="form-control" id="cancelReason" name="cancel_reason" rows="3"></textarea>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('general.close') }}</button>
                                                                                        <button type="submit" form="cancelLicenseForm" class="btn btn-warning">Submit</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane" id="accessories">
                                            <table name="requestedAccessories" id="requestedAccessories"
                                                class="table table-striped snipe-table" data-toolbar="#toolbar"
                                                data-advanced-search="true" data-search="true" data-show-columns="true"
                                                data-show-export="true" data-pagination="true"
                                                data-id-table="requestedAccessories"
                                                data-cookie-id-table="requestedAccessories"
                                                data-export-options='{
                                                    "fileName": "export-accessoryrequests-{{ date('Y-m-d') }}",
                                                    "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                                                }'>
                                                <thead>
                                                    <tr role="row">
                                                        <th class="col-md-2">Item Name</th>
                                                        <th class="col-md-2 text-center">
                                                            Quantity Requested</th>  
                                                            <th class="col-md-1">
                                                                Remaining</th>
                                                        <th class="col-md-2" data-sortable="true">
                                                            Requesting User</th>
                                                        <th class="col-md-2">
                                                            {{ trans('admin/hardware/table.requested_date') }}</th>
                                                        <th class="col-md-2">
                                                            Status</th>
                                                        <th class="col-md-1">{{ trans('button.actions') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($requestedItems as $request)
                                                        @if ($request->canceled_at === null && $request->itemType() == 'accessory')
                                                            <tr>
                                                                {{ csrf_field() }}
                                                                <td>
                                                                    @if ($request->accessory)
                                                                        <a
                                                                            href="{{ route('accessories.show', $request->accessory_id) }}">
                                                                            {{ $request->accessory->name }}
                                                                        </a>
                                                                    @else
                                                                        {{ trans('admin/accessories/general.deleted') }}
                                                                    @endif
                                                                </td>
                                                                <td>{{ $request->quantity }}</td>
                                                                <td>{{ $request->accessory->numRemaining() }}</td>
                                                                <td>
                                                                    @if ($request->user)
                                                                        <a
                                                                            href="{{ route('users.show', $request->user->id) }}">
                                                                            {{ $request->user->present()->fullName() }}
                                                                        </a>
                                                                    @else
                                                                        {{ trans('general.user_deleted') }}
                                                                    @endif
                                                                </td>
                                                                <td>{{ \App\Helpers\Helper::getFormattedDateObject($request->created_at, 'datetime', false) }}
                                                                </td>
                                                                <td>
                                                                    @if ($request->fulfilled_at)
                                                                        <span
                                                                            class="label label-success">{{ trans('general.fulfilled') }}</span>
                                                                    @elseif ($request->canceled_at)
                                                                        <span
                                                                            class="label label-danger">{{ trans('general.canceled') }}</span>
                                                                    @else
                                                                        <span
                                                                            class="label label-warning">{{ trans('general.pending') }}</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if (!$request->fulfilled_at && !$request->canceled_at)
                                                                    <a href="{{ config('app.url') }}/accessories/{{ $request->accessory->id }}/checkout/{{ $request->id }}"
                                                                        class="btn btn-sm bg-green"
                                                                        data-tooltip="true"
                                                                        title="{{ trans('general.checkout_user_tooltip') }}"><i class="fas fa-check"
                                                                        style="color: white;"></i>
                                                                    </a>
                                                                    <!-- Cancel Button -->
                                                                    <button type="button" class="btn btn-warning btn-sm"
                                                                            data-tooltip="true"
                                                                            title="{{ trans('general.cancel_request') }}"
                                                                            data-toggle="modal"
                                                                            data-target="#cancelAccessoryRequestModal-{{ $request->id }}">
                                                                        <i class="fas fa-times"></i>
                                                                    </button>
                                                                    <!-- Cancel Request Modal -->
                                                                    <div class="modal fade" id="cancelAccessoryRequestModal-{{ $request->id }}" tabindex="-1" role="dialog" aria-labelledby="cancelRequestModalLabel-{{ $request->id }}">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                    <h4 class="modal-title" id="cancelRequestModalLabel-{{ $request->id }}">{{ trans('general.cancel_request') }}</h4>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <form id="cancelRequestModalForm-{{ $request->id }}" method="POST" action="{{ config('app.url') }}/accessories/cancel-request/{{ $request->id }}">
                                                                                        @csrf
                                                                                        <div class="form-group">
                                                                                            <label for="cancelReason-{{ $request->id }}" class="control-label">Cancellation Reason</label>
                                                                                            <textarea class="form-control" id="cancelReason-{{ $request->id }}" name="cancel_reason" rows="3"></textarea>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('general.close') }}</button>
                                                                                    <!-- Ensure the button references the correct form ID -->
                                                                                    <button type="submit" form="cancelRequestModalForm-{{ $request->id }}" class="btn btn-warning">Submit</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane" id="components">
                                            <table name="requestedComponents" id="requestedComponents"
                                                class="table table-striped snipe-table" data-toolbar="#toolbar"
                                                data-advanced-search="true" data-search="true" data-show-columns="true"
                                                data-show-export="true" data-pagination="true"
                                                data-id-table="requestedComponents"
                                                data-cookie-id-table="requestedComponents"
                                                data-export-options='{
                                                    "fileName": "export-component-requests-{{ date('Y-m-d') }}",
                                                    "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                                                }'>
                                                <thead>
                                                    <tr role="row">
                                                        <th class="col-md-2">Item Name</th>
                                                        <th class="col-md-2 text-center">
                                                            Quantity Requested</th>
                                                        <th class="col-md-1" data-sortable="true">
                                                            Remaining</th>                                                            
                                                        <th class="col-md-2" data-sortable="true">
                                                            Requesting User</th>
                                                        <th class="col-md-2">
                                                            {{ trans('admin/hardware/table.requested_date') }}</th>
                                                        <th class="col-md-2" data-sortable="true">
                                                            Status</th>
                                                        <th class="col-md-1">{{ trans('button.actions') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($requestedItems as $request)
                                                        @if ($request->canceled_at === null && $request->itemType() == 'component')
                                                            <tr>
                                                                {{ csrf_field() }}
                                                                <td>
                                                                    @if ($request->component)
                                                                        <a
                                                                            href="{{ route('components.show', $request->component_id) }}">
                                                                            {{ $request->component->name }}
                                                                        </a>
                                                                    @else
                                                                        {{ trans('admin/component/general.deleted') }}
                                                                    @endif
                                                                </td>
                                                                <td>{{ $request->quantity }}</td>
                                                                <td>{{ $request->component->numRemaining() }}</td>
                                                                <td>
                                                                    @if ($request->user)
                                                                        <a
                                                                            href="{{ route('users.show', $request->user->id) }}">
                                                                            {{ $request->user->present()->fullName() }}
                                                                        </a>
                                                                    @else
                                                                        {{ trans('general.user_deleted') }}
                                                                    @endif
                                                                </td>
                                                                <td>{{ \App\Helpers\Helper::getFormattedDateObject($request->created_at, 'datetime', false) }}
                                                                </td>
                                                                <td>
                                                                    @if ($request->fulfilled_at)
                                                                        <span
                                                                            class="label label-success">{{ trans('general.fulfilled') }}</span>
                                                                    @elseif ($request->deleted_at)
                                                                        <span
                                                                            class="label label-danger">{{ trans('general.canceled') }}</span>
                                                                    @else
                                                                        <span
                                                                            class="label label-warning">{{ trans('general.pending') }}</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if($request->component->numRemaining() > 0)
                                                                        <a href="{{ config('app.url') }}/components/{{ $request->component->id }}/checkout/{{ $request->id }}"
                                                                            class="btn btn-success btn-sm text"
                                                                            data-tooltip="true"
                                                                            title="{{ trans('general.checkout') }}">
                                                                            <i class="fas fa-check"
                                                                                style="color: white;"></i>
                                                                        </a>
                                                                    @endif
                                                                    <!-- Cancel Button -->
                                                                    <button type="button" class="btn btn-warning btn-sm"
                                                                            data-tooltip="true"
                                                                            title="{{ trans('general.cancel_request') }}"
                                                                            data-toggle="modal"
                                                                            data-target="#cancelComponentRequestModal-{{ $request->id }}">
                                                                        <i class="fas fa-times"></i>
                                                                    </button>
                                                                    <!-- Cancel Request Modal -->
                                                                    <div class="modal fade" id="cancelComponentRequestModal-{{ $request->id }}" tabindex="-1" role="dialog"   aria-labelledby="cancelComponentRequestModalLabel-{{ $request->id }}">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                    <h4 class="modal-title" id="cancelComponentRequestModalLabel-{{ $request->id }}">{{ trans('general.cancel_request') }}</h4>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <form id="cancelComponentRequestForm-{{ $request->id }}" method="POST" action="{{ config('app.url') }}/components/cancel-request/{{ $request->id }}">
                                                                                        @csrf
                                                                                        <div class="form-group">
                                                                                            <label for="cancelReason-{{ $request->id }}" class="control-label">Reason For Cancellation</label>
                                                                                            <textarea class="form-control" id="cancelReason-{{ $request->id }}" name="cancel_reason" rows="3"></textarea>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('general.close') }}</button>
                                                                                    <button type="submit" form="cancelComponentRequestForm-{{ $request->id }}" class="btn btn-warning">Submit</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane" id="consumables">
                                            <table name="requestedConsumables" id="requestedConsumables"
                                                class="table table-striped snipe-table" data-toolbar="#toolbar"
                                                data-advanced-search="true" data-search="true" data-show-columns="true"
                                                data-show-export="true" data-pagination="true"
                                                data-id-table="requestedConsumables"
                                                data-cookie-id-table="requestedConsumables"
                                                data-export-options='{
                                                    "fileName": "export-consumables-requests-{{ date('Y-m-d') }}",
                                                    "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                                                }'>
                                                <thead>
                                                    <tr role="row">
                                                        <th class="col-md-2">Item Name</th>
                                                        <th class="col-md-2 text-center">
                                                            Quantity Requested</th>
                                                        <th class="col-md-1" data-sortable="true">
                                                            Remaining</th>
                                                        <th class="col-md-2" data-sortable="true">
                                                            Requesting User</th>
                                                        <th class="col-md-2">
                                                            {{ trans('admin/hardware/table.requested_date') }}</th>
                                                        <th class="col-md-2" data-sortable="true">
                                                            Status</th>
                                                        <th class="col-md-1">{{ trans('button.actions') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($requestedItems as $request)
                                                        @if ($request->canceled_at === null && $request->itemType() == 'consumable')
                                                            <tr>
                                                                {{ csrf_field() }}
                                                                <td>
                                                                    @if ($request->consumable)
                                                                        <a
                                                                            href="{{ route('consumables.show', $request->consumable_id) }}">
                                                                            {{ $request->consumable->name }}
                                                                        </a>
                                                                    @else
                                                                        {{ trans('admin/consumable/general.deleted') }}
                                                                    @endif
                                                                </td>
                                                                <td>{{ $request->quantity }}</td>
                                                                <td>{{ $request->consumable->numRemaining() }}</td>
                                                                <td>
                                                                    @if ($request->user)
                                                                        <a
                                                                            href="{{ route('users.show', $request->user->id) }}">
                                                                            {{ $request->user->present()->fullName() }}
                                                                        </a>
                                                                    @else
                                                                        {{ trans('general.user_deleted') }}
                                                                    @endif
                                                                </td>
                                                                <td>{{ \App\Helpers\Helper::getFormattedDateObject($request->created_at, 'datetime', false) }}
                                                                </td>
                                                                <td>
                                                                    @if ($request->fulfilled_at)
                                                                        <span
                                                                            class="label label-success">{{ trans('general.fulfilled') }}</span>
                                                                    @elseif ($request->deleted_at)
                                                                        <span
                                                                            class="label label-danger">{{ trans('general.canceled') }}</span>
                                                                    @else
                                                                        <span
                                                                            class="label label-warning">{{ trans('general.pending') }}</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if($request->consumable->numRemaining() > 0)
                                                                        <a href="{{ config('app.url') }}/consumables/{{ $request->consumable->id }}/checkout/{{ $request->id }}"
                                                                            class="btn btn-success btn-sm text"
                                                                            data-tooltip="true"
                                                                            title="{{ trans('general.checkout') }}">
                                                                            <i class="fas fa-check"
                                                                                style="color: white;"></i>
                                                                        </a>
                                                                    @endif
                                                                    <!-- Cancel Button -->
                                                                    <button type="button" class="btn btn-warning btn-sm"
                                                                            data-tooltip="true"
                                                                            title="{{ trans('general.cancel_request') }}"
                                                                            data-toggle="modal"
                                                                            data-target="#cancelConsumableRequestModal-{{ $request->id }}">
                                                                        <i class="fas fa-times"></i>
                                                                    </button>
                                                                    <!-- Cancel Request Modal -->
                                                                    <div class="modal fade" id="cancelConsumableRequestModal-{{ $request->id }}" tabindex="-1" role="dialog" aria-labelledby="cancelConsumableRequestModalLabel-{{ $request->id }}">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                    <h4 class="modal-title" id="cancelConsumableRequestModalLabel-{{ $request->id }}">{{ trans('general.cancel_request') }}</h4>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <form id="cancelConsumableRequestForm-{{ $request->id }}" method="POST" action="{{ config('app.url') }}/consumables/cancel-request/{{ $request->id }}">
                                                                                        @csrf
                                                                                        <div class="form-group">
                                                                                            <label for="cancelReason-{{ $request->id }}" class="control-label">Reason For Cancellation</label>
                                                                                            <textarea class="form-control" id="cancelReason-{{ $request->id }}" name="cancel_reason" rows="3"></textarea>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('general.close') }}</button>
                                                                                    <button type="submit" form="cancelConsumableRequestForm-{{ $request->id }}" class="btn btn-warning">Submit</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane" id="waitlist">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="table-responsive">
                                                        <table data-click-to-select="true" data-cookie-id-table="waitlistAllTable"
                                                            data-pagination="true" data-id-table="waitlistAllTable" data-search="true"
                                                            data-side-pagination="server" data-show-columns="true"
                                                            data-show-export="false" data-show-footer="false" data-show-refresh="true"
                                                            data-sort-order="asc" data-sort-name="name" id="waitlistAllTable"
                                                            class="table table-striped snipe-table"
                                                            data-url="{{ route('api.waitlist.all') }}"
                                                            data-response-handler="waitlistResponseHandler">
                                                            <thead>
                                                                <tr>
                                                                    <th class="col-md-2" data-field="requestable_model" data-sortable="false">
                                                                        Item
                                                                    </th>
                                                                    <th class="col-md-2" data-field="quantity" data-sortable="false">
                                                                        Quantity
                                                                    </th>
                                                                    <th class="col-md-2" data-field="requested_at" data-formatter="dateDisplayFormatter" data-sortable="false">
                                                                        Requested At
                                                                    </th>
                                                                    <th class="col-md-2" data-field="name" data-sortable="false">
                                                                        Requested By
                                                                    </th>
                                                                    <th class="col-md-2" data-field="canceled_at" data-formatter="canceledStatusFormatter" data-sortable="false">
                                                                        Status
                                                                    </th>                                                    
                                                                    <th class="col-md-2" data-field="actions" data-formatter="waitlistActionsFormatter">Actions</th>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-md-12">
                                    <div class="alert alert-info alert-block">
                                        <i class="fas fa-info-circle"></i>
                                        {{ trans('general.no_results') }}
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function waitlistResponseHandler(res) {
            return {
                total: res.total,
                rows: res.waitlist
            };
        }
        function waitlistActionsFormatter(value, row, index) {
                return `
            <button type="button" class="btn btn-primary btn-sm" title="Close Request" onclick="handleCloseWaitlistRequest(${row.id})"}>
                                                                                            <i class="fas fa-thumbs-up"
                                                                                style="color: white;"></i>
                                                                                
            </button>
            <button type="button" class="btn btn-warning btn-sm" title="Cancel Request" onclick="handleCancelWaitlistRequest(${row.id})"}>
                                                                                            <i class="fas fa-x"
                                                                                style="color: white;"></i>
                                                                                
            </button>
            <button type="button" class="btn btn-danger btn-sm" title="Deny Request" onclick="handleDenyWaitlistRequest(${row.id})"}>
                                                                                            <i class="fas fa-ban"
                                                                                style="color: white;"></i>
                                                                                
            </button>
        `
        }
        
        function canceledStatusFormatter(value, row) {
            if (row.canceled_at) {
                return '<span class="label label-danger">' + "{{ trans('general.canceled') }}" + '</span>';
            } else {
                return '<span class="label label-warning">' + "{{ trans('general.pending') }}" + '</span>';
            }
        }

        function handleCancelWaitlistRequest(waitlistId) {
            let form = document.createElement("form");
            form.action = `{{ config('app.url') }}/account/cancel-waitlist-admin/${waitlistId}`;
            form.method = "POST";

            let csrfInput = document.createElement("input");
            csrfInput.type = "hidden";
            csrfInput.name = "_token";
            csrfInput.value = '{{ csrf_token() }}';
            form.appendChild(csrfInput);

            document.body.appendChild(form);
            form.submit();
        }

        function handleCloseWaitlistRequest(waitlistId) {
            let form = document.createElement("form");
            form.action = `{{ config('app.url') }}/account/close-waitlist-admin/${waitlistId}`;
            form.method = "POST";

            let csrfInput = document.createElement("input");
            csrfInput.type = "hidden";
            csrfInput.name = "_token";
            csrfInput.value = '{{ csrf_token() }}';
            form.appendChild(csrfInput);

            document.body.appendChild(form);
            form.submit();
        }
        function handleDenyWaitlistRequest(waitlistId) {
            let form = document.createElement("form");
            form.action = `{{ config('app.url') }}/account/deny-waitlist-admin/${waitlistId}`;
            form.method = "POST";

            let csrfInput = document.createElement("input");
            csrfInput.type = "hidden";
            csrfInput.name = "_token";
            csrfInput.value = '{{ csrf_token() }}';
            form.appendChild(csrfInput);

            document.body.appendChild(form);
            form.submit();
        }
    </script>
    
@stop

@section('moar_scripts')
    @include ('partials.bootstrap-table', [
        'exportFile' => 'requested-export',
        'search' => true,
        'clientSearch' => true,
    ])
@stop
