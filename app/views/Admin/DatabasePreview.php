<?php require APPROOT . '/views/includes/headerAdmin.php';
?>
<div class="container" style=" margin: auto; margin-top: 5%; height: auto; ">
    <!-- add code here -->

    <!-- title -->
    <h1 class="text-center dbPreviewTitle">Database</h1>

    <div class="defaultDbPreview">
        <!-- Clients table -->
        <!-- Looping through each table -->
        <?php foreach ($data as $table_name => $table_data) : ?>
            <div class="dbPreviewTableMargin">
                <table class="table table-bordered dbPreviewPrinterFriendly" id="table_<?= $table_name ?>">
                    <caption class="dbPreviewTableCaption"><?= $table_name ?></caption>
                    <thead class="dbPreviewTableHead">
                        <tr>
                            <!-- Looping through each table columns -->
                            <?php foreach ($table_data['table_columns'] as $column_info) : ?>
                                <?php if ($column_info->Field != 'pass_hash') : ?>
                                    <th class="text-center" scope="col"><?= $column_info->Field ?></th>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody class="dbPreviewTableBody">
                        <!-- Looping through an array of table record objects -->
                        <?php foreach ($table_data['table_records'] as $table_record) : ?>
                            <tr>
                                <!-- Looping through key-value pairs of each table record object  -->
                                <?php foreach ((array) $table_record as $column_name => $column_value) : ?>
                                    <?php if ($column_name == 'id') : ?>
                                        <td class="text-center"><?= str_pad($column_value, 6, '0', STR_PAD_LEFT) ?></td>
                                    <?php elseif ($column_name == 'image_url' || $column_name == 'imgURL') : ?>
                                        <td class="text-center"><a href="<?= URLROOT ?>/public/img/<?= $column_value ?>" target="_blank">Image Link</a></td>
                                    <?php elseif ($column_name != 'pass_hash') : ?>
                                        <td class="text-center"><?= $column_value ?></td>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php if (!empty($table_data['table_records'])) : ?>
                    <div>
                        <button class="btn" id="dbPreviewTablePrintButton">
                            <span class="noDisplay"><?= $table_name ?></span>
                            Print Table
                        </button>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>