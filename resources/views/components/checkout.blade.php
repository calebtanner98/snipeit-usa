@extends('layouts/default')

{{-- Page title --}}
@section('title')
 {{ trans('admin/components/general.checkout') }}
@parent
@stop

{{-- Page content --}}
@section('content')

<div class="row">
  <div class="col-md-8">
    <form class="form-horizontal" id="checkout_form" method="post" action="" autocomplete="off">
      <!-- CSRF Token -->
      {{ csrf_field() }}

      <div class="box box-default">
        @if ($component->id)
        <div class="box-header with-border">
          <div class="box-heading">
            <h2 class="box-title">{{ $component->name }}  ({{ $component->numRemaining()  }}  {{ trans('admin/components/general.remaining') }})</h2>
          </div>
        </div><!-- /.box-header -->
        @endif

        <div class="box-body">
          @if($requestId)
            <!-- Asset -->
            <div id="assigned_asset" class="form-group{{ $errors->has($fieldname ?? 'asset_id') ? ' has-error' : '' }}" {!! (isset($style)) ? ' style="'.e($style).'"' : '' !!}>
              {{ Form::label($fieldname ?? 'asset_id', $translated_name ?? trans('general.select_asset'), ['class' => 'col-md-3 control-label']) }}
              <div class="col-md-8{{ isset($required) && $required == 'true' ? ' required' : '' }}">
                  <select name="{{ $fieldname ?? 'asset_id' }}" id="assigned_asset_select" class="form-control" style="width: 100%">

                      <!-- Default Option -->
                      <option value="">{{ trans('general.select_asset') }}</option>

                      <!-- Populate with assets -->
                      @foreach ($assets as $asset)
                          <option value="{{ $asset->id }}" {{ old($fieldname ?? 'asset_id') == $asset->id ? 'selected' : '' }}>
                              {{ $asset->present()->fullName ?? $asset->name }}
                          </option>
                      @endforeach

                  </select>
              </div>
              {!! $errors->first($fieldname ?? 'asset_id', '<div class="col-md-8 col-md-offset-3"><span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span></div>') !!}
            </div>

          @else 
            <!-- Asset -->
            <div id="assigned_asset" class="form-group{{ $errors->has($fieldname) ? ' has-error' : '' }}"{!!  (isset($style)) ? ' style="'.e($style).'"' : ''  !!}>
              {{ Form::label($fieldname, $translated_name, array('class' => 'col-md-3 control-label')) }}
              <div class="col-md-8{{  ((isset($required) && ($required =='true'))) ?  ' required' : '' }}">
                  <select class="js-data-ajax select2" data-endpoint="hardware" data-placeholder="{{ trans('general.select_asset') }}" aria-label="{{ $fieldname }}" name="{{ $fieldname }}" style="width: 100%" id="{{ (isset($select_id)) ? $select_id : 'assigned_asset_select' }}"{{ (isset($multiple)) ? ' multiple' : '' }}{!! (!empty($asset_status_type)) ? ' data-asset-status-type="' . $asset_status_type . '"' : '' !!}>

                      @if ((!isset($unselect)) && ($asset_id = old($fieldname, (isset($asset) ? $asset->id  : (isset($item) ? $item->{$fieldname} : '')))))
                          <option value="{{ $asset_id }}" selected="selected" role="option" aria-selected="true"  role="option">
                              {{ (\App\Models\Asset::find($asset_id)) ? \App\Models\Asset::find($asset_id)->present()->fullName : '' }}
                          </option>
                      @else
                          @if(!isset($multiple))
                              <option value=""  role="option">{{ trans('general.select_asset') }}</option>
                          @endif
                      @endif
                  </select>
              </div>
              {!! $errors->first($fieldname, '<div class="col-md-8 col-md-offset-3"><span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span></div>') !!}

            </div>
          @endif

            <div class="form-group {{ $errors->has('assigned_qty') ? ' has-error' : '' }}">
              <label for="assigned_qty" class="col-md-3 control-label">
                {{ trans('general.qty') }}
              </label>
              @if($requestId)
                <div class="col-md-2 col-sm-5 col-xs-5">
                  <input class="form-control required col-md-12" type="text" name="assigned_qty" id="assigned_qty" value="{{ $checkoutRequest->quantity }}" readonly />
                </div>
              @else
                <div class="col-md-2 col-sm-5 col-xs-5">
                  <input class="form-control required col-md-12" type="text" name="assigned_qty" id="assigned_qty" value="{{ old('assigned_qty') ?? 1 }}" />
                </div>
              @endif
              @if ($errors->first('assigned_qty'))
                <div class="col-md-9 col-md-offset-3">
                  {!! $errors->first('assigned_qty', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>') !!}
                </div>
              @endif
            </div>
            <!-- Note -->
            <div class="form-group{{ $errors->has('note') ? ' error' : '' }}">
              <label for="note" class="col-md-3 control-label">{{ trans('admin/hardware/form.notes') }}</label>
              <div class="col-md-7">
                <textarea class="col-md-6 form-control" id="note" name="note">{{ old('note', $component->note) }}</textarea>
                {!! $errors->first('note', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>') !!}
              </div>
            </div>


        </div> <!-- .BOX-BODY-->
          <x-redirect_submit_options
                  index_route="components.index"
                  :button_label="trans('general.checkout')"
                  :options="[
                                'index' => trans('admin/hardware/form.redirect_to_all', ['type' => trans('general.components')]),
                                'item' => trans('admin/hardware/form.redirect_to_type', ['type' => trans('general.component')]),
                                'target' => trans('admin/hardware/form.redirect_to_checked_out_to'),

                               ]"
          />
      </div> <!-- .box-default-->
    </form>
  </div> <!-- .col-md-9-->
</div> <!-- .row -->

@stop
