<span>

    <div class="form-group<?php echo e($errors->has('custom_fieldset') ? ' has-error' : ''); ?>">
        <label for="custom_fieldset" class="col-md-3 control-label">
            <?php echo e(trans('admin/models/general.fieldset')); ?>

        </label>
        <div class="col-md-5">
            <?php echo e(Form::select('fieldset_id', Helper::customFieldsetList(), old('fieldset_id', $fieldset_id), array('class'=>'select2 js-fieldset-field livewire-select2', 'style'=>'width:100%; min-width:350px', 'aria-label'=>'custom_fieldset', 'data-livewire-component' => $this->getId()))); ?>

            <?php echo $errors->first('custom_fieldset', '<span class="alert-msg" aria-hidden="true"><br><i class="fas fa-times"></i> :message</span>'); ?>

        </div>
        <div class="col-md-3">
            <!--[if BLOCK]><![endif]--><?php if($fieldset_id): ?>
                <label class="form-control">
                    <?php echo e(Form::checkbox('add_default_values', 1, old('add_default_values', $add_default_values), ['data-livewire-component' => $this->getId(), 'id' => 'add_default_values', 'wire:model.live' => 'add_default_values', 'disabled' => $this->fields->isEmpty()])); ?>

                    <?php echo e(trans('admin/models/general.add_default_values')); ?>

                </label>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>
    </div>

    <!--[if BLOCK]><![endif]--><?php if($add_default_values): ?>
            <!--[if BLOCK]><![endif]--><?php if($this->fields): ?>

                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="form-group" wire:key="field-<?php echo e($field->id); ?>">

                        <label class="col-md-3 control-label<?php echo e($errors->has($field->name) ? ' has-error' : ''); ?>"><?php echo e($field->name); ?></label>

                        <div class="col-md-7">

                                <!--[if BLOCK]><![endif]--><?php if($field->format == "DATE"): ?>

                                    <div class="input-group col-md-4" style="padding-left: 0px;">
                                        <div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd"  data-autoclose="true">
                                            <input
                                                type="text"
                                                class="form-control"
                                                placeholder="<?php echo e(trans('general.select_date')); ?>"
                                                name="default_values[<?php echo e($field->id); ?>]"
                                                id="default-value<?php echo e($field->id); ?>"
                                                wire:model="selectedValues.<?php echo e($field->db_column); ?>"
                                                
                                                
                                                onchange="this.dispatchEvent(new InputEvent('input'))"
                                            >
                                            <span class="input-group-addon"><?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '3f7b628a1a585b60fccfd7fdfdab6ee9::icon','data' => ['type' => 'calendar']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'calendar']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?></span>
                                        </div>
                                    </div>

                                <?php elseif($field->element == "text"): ?>


                                    <input
                                        class="form-control"
                                        type="text"
                                        id="default-value<?php echo e($field->id); ?>"
                                        name="default_values[<?php echo e($field->id); ?>]"
                                        wire:model="selectedValues.<?php echo e($field->db_column); ?>"
                                    />


                                <?php elseif($field->element == "textarea"): ?>


                                        <textarea
                                            class="form-control"
                                            style="width: 100%;"
                                            id="default-value<?php echo e($field->id); ?>"
                                            name="default_values[<?php echo e($field->id); ?>]"
                                            wire:model="selectedValues.<?php echo e($field->db_column); ?>"
                                        ></textarea>


                                <?php elseif($field->element == "listbox"): ?>


                                        <select class="form-control" name="default_values[<?php echo e($field->id); ?>]" wire:model="selectedValues.<?php echo e($field->db_column); ?>">
                                            <option value=""></option>
                                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = explode("\r\n", $field->field_values); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option
                                                    value="<?php echo e($field_value); ?>"
                                                    wire:key="listbox-<?php echo e($field_value); ?>"
                                                >
                                                    <?php echo e($field_value); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                        </select>


                                <?php elseif($field->element == "radio"): ?>

                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = explode("\r\n", $field->field_values); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <label class="col-md-3 form-control" for="<?php echo e($field->db_column); ?>_<?php echo e(str_slug($field_value)); ?>" wire:key="radio-<?php echo e($field_value); ?>">
                                            <input
                                                id="<?php echo e($field->db_column); ?>_<?php echo e(str_slug($field_value)); ?>"
                                                aria-label="<?php echo e(str_slug($field->name)); ?>"
                                                type="radio"
                                                name="default_values[<?php echo e($field->id); ?>]"
                                                value="<?php echo e($field_value); ?>"
                                                wire:model="selectedValues.<?php echo e($field->db_column); ?>"
                                            /><?php echo e($field_value); ?>

                                        </label>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

                                <?php elseif($field->element == "checkbox"): ?>

                                     <!--[if BLOCK]><![endif]--><?php $__currentLoopData = explode("\r\n", $field->field_values); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <label class="col-md-3 form-control" for="<?php echo e($field->db_column); ?>_<?php echo e(str_slug($field_value)); ?>" wire:key="checkbox-<?php echo e($field_value); ?>">
                                            <input
                                                id="<?php echo e($field->db_column); ?>_<?php echo e(str_slug($field_value)); ?>"
                                                type="checkbox"
                                                aria-label="<?php echo e(str_slug($field->name)); ?>"
                                                name="default_values[<?php echo e($field->id); ?>][]"
                                                value="<?php echo e($field_value); ?>"
                                                wire:model="selectedValues.<?php echo e($field->db_column); ?>"
                                            > <?php echo e($field_value); ?>

                                        </label>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->


                                <?php else: ?>
                                    <span class="help-block form-error">
                                        Unknown field element: <?php echo e($field->element); ?>

                                    </span>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                    </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</span>
<?php /**PATH /var/www/html/snipeit/resources/views/livewire/custom-field-set-default-values-for-model.blade.php ENDPATH**/ ?>