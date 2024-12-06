@extends('layouts/edit-form', [
    'createText' => trans('admin/components/general.create') ,
    'updateText' => trans('admin/components/general.update'),
    'helpPosition'  => 'right',
    'helpText' => trans('help.components'),
    'formAction' => (isset($item->id)) ? route('components.update', ['component' => $item->id]) : route('components.store'),
    'index_route' => 'components.index',
    'options' => [
                'index' => trans('admin/hardware/form.redirect_to_all', ['type' => 'components']),
                'item' => trans('admin/hardware/form.redirect_to_type', ['type' => trans('general.component')]),
               ]

])

{{-- Page content --}}
@section('inputFields')

@include ('partials.forms.edit.name', ['translated_name' => trans('admin/components/table.title')])
@include ('partials.forms.edit.category-select', ['translated_name' => trans('general.category'), 'fieldname' => 'category_id','category_type' => 'component'])
@include ('partials.forms.edit.quantity')
    <!-- Requestable -->
    <div class="form-group {{ $errors->has('requestable') ? ' has-error' : '' }}">
        <div class="col-md-3 control-label">
            <strong>Requestable</strong>
        </div>
        <div class="col-md-7">
            <label class="form-control">
                {{ Form::Checkbox('requestable', '1', old('requestable', $item->id ? $item->requestable : '1'), ['aria-label' => 'requestable']) }}
                {{ trans('general.yes') }}
            </label>
        </div>
    </div>
@include ('partials.forms.edit.minimum_quantity')
@include ('partials.forms.edit.serial', ['fieldname' => 'serial'])
@include ('partials.forms.edit.company-select', ['translated_name' => trans('general.company'), 'fieldname' => 'company_id'])
@include ('partials.forms.edit.location-select', ['translated_name' => trans('general.location'), 'fieldname' => 'location_id'])
@include ('partials.forms.edit.supplier-select', ['translated_name' => trans('general.supplier'), 'fieldname' => 'supplier_id'])
@include ('partials.forms.edit.order_number')
@include ('partials.forms.edit.purchase_date')
@include ('partials.forms.edit.purchase_cost')
@include ('partials.forms.edit.notes')
@include ('partials.forms.edit.image-upload', ['image_path' => app('components_upload_path')])


@stop