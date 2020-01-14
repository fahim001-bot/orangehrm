
<?php use_javascript(plugin_web_path('orangehrmAdminPlugin', 'js/pimCsvImport')); ?>

<div id="pimCsvImport" class="box">

    <div class="head">
        <h1 id="pimCsvImportHeading"><?php echo __("Import Attendance Data"); ?></h1>
    </div>

    <div class="inner">

        <?php include_partial('global/flash_messages', array('prefix' => 'csvimport')); ?>

        <form name="frmPimCsvImport" id="frmPimCsvImport" method="post"
              action="<?php echo url_for('attendance/uploadAttendance'); ?>"
              enctype="multipart/form-data">

            <?php echo $form['_csrf_token']; ?>

            <fieldset>

                <ol class="normal">

                    <li class="fieldHelpContainer">
                        <?php echo $form['csvFile']->renderLabel(__('Select File').' <em>*</em>'); ?>
                        <?php echo $form['csvFile']->render(); ?>
                        <label class="fieldHelpBottom"><?php echo __(CommonMessages::FILE_LABEL_SIZE); ?></label>
                    </li>

                </ol>

                <ul class="disc">
                    <li>
                        <?php echo __("Only CSV File are Allowed"); ?>
                    </li>
                    <li>
                        <?php echo __("Employee ID, Punched In/Out Time & Date and State are compulsory");?>
                    </li>
                    <li>
                        <?php echo __("All Date should be in YYYY-MM-DD Format");?>
                    </li>
                    <li>
                        <?php echo __("Time should be in 24hours Format");?>
                    </li>
                    <li>
                        <?php echo __("File Should Not Exceed 1MB");?>
                    </li>
                </ul>

                <ol>
                    <li class="required">
                        <em>*</em> <?php echo __(CommonMessages::REQUIRED_FIELD); ?>
                    </li>
                </ol>

                <p>
                    <input type="button" class="" name="btnSave" id="btnSave" value="<?php echo __("Upload"); ?>"/>
                </p>

            </fieldset>

        </form>

    </div>

</div>

<script type="text/javascript">
    var linkForDownloadCsv = '<?php url_for('admin/sampleCsvDownload');?>';
    var lang_csvRequired = '<?php echo __js(ValidationMessages::REQUIRED);?>';
    var lang_processing = '<?php echo __js(CommonMessages::LABEL_PROCESSING);?>';
</script>
