<section class="content-header">
    <h1>
        Page
        <small><?= __('Add') ?></small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <?= $this->Html->link('<i class="fa fa-dashboard"></i> ' . __('Back'), ['action' => 'index'], ['escape' => false]) ?>
        </li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><?= __('Form') ?></h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <?= $this->Form->create($page, array('role' => 'form')) ?>
                <div class="box-body">
                    <?php
                        echo $this->Form->input('view', ['options' => $views, 'class' => 'select2', 'data-placeholder' => __("Select View")]);
                        echo $this->Form->input('enabled');
                    ?>
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                        <?php $i = 0; ?>
                        <?php foreach ($supportedLanguages as $language => $languageSettings): ?>
                            <li <?php if ($selectedLanguage == $language): ?>class="active"<?php endif; ?>><a
                                        href="#tab_<?= $i ?>" data-toggle="tab"><?= $language ?></a></li>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                        </ul>
                        <div class="tab-content">
                        <?php $i = 0; ?>
                        <?php foreach ($supportedLanguages as $language => $languageSettings): ?>
                            <div class="tab-pane <?php if ($selectedLanguage == $language): ?>active<?php endif; ?>"
                                 id="tab_<?= $i ?>">
                                <?php
                                    if($languageSettings['locale'] == $defaultLocale){
                                        echo $this->Form->input('title');
                                        echo $this->Form->input('perex', ['class' => 'ckeditor']);
                                        echo $this->Form->input('text', ['class' => 'ckeditor']);

                                        echo $this->Form->input('meta_item.title');
                                        echo $this->Form->input('meta_item.keywords');
                                        echo $this->Form->input('meta_item.description');
                                    } else {
                                        echo $this->Form->input('_translations.' . $languageSettings['locale'] . '.title');
                                        echo $this->Form->input('_translations.' . $languageSettings['locale'] . '.perex', ['class' => 'ckeditor']);
                                        echo $this->Form->input('_translations.' . $languageSettings['locale'] . '.text', ['class' => 'ckeditor']);

                                        echo $this->Form->input('meta_item._translations.' . $languageSettings['locale'] . '.title');
                                        echo $this->Form->input('meta_item._translations.' . $languageSettings['locale'] . '.keywords');
                                        echo $this->Form->input('meta_item._translations.' . $languageSettings['locale'] . '.description');
                                    }
                                ?>
                            </div>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- nav-tabs-custom -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <?= $this->Form->button(__('Save')) ?>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</section>

<?php $this->start('css'); ?>
<?php echo $this->Html->css('DejwCake/AdminLTE./plugins/iCheck/all.css'); ?>
<?php $this->end(); ?>
<?php $this->start('cssFirst'); ?>
<?php echo $this->Html->css('DejwCake/AdminLTE./plugins/select2/select2.min.css'); ?>
<?php $this->end(); ?>
<?php $this->start('scriptBottom'); ?>
<?php echo $this->Html->script('DejwCake/AdminLTE./plugins/iCheck/icheck.min.js'); ?>
<?php echo $this->Html->script('DejwCake/AdminLTE./plugins/select2/select2.full.min.js'); ?>
<?php echo $this->Html->script('https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js'); ?>
    <script type="text/javascript">
        $(function () {
            CKEDITOR.replaceAll('ckeditor');
        });
    </script>
    <script type="text/javascript">
        $(".select2").select2();
        $(function () {
            $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass: 'iradio_minimal-blue'
            });
        });
    </script>
<?php $this->end(); ?>