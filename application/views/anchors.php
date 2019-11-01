
<?php require VIEWPATH . "header.php"; ?>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Anchors</h1>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-2">
            <a href="/tags/add" class="btn btn-primary btn-block">Add Tag</a>
            <a href="/tags/assign" class="btn btn-primary btn-block">Assign Tag</a>
            <a href="/tags/assign" class="btn btn-primary btn-block">Assigned Tags</a>
        </div>
        <div class="col-md-10">
            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Anchors</h4>
                </div>
                <div class="card-body">
                
                </div>
            </div>

            <?php echo form_open("/settings/addAnchor", 'id="frmAddAnchor"'); ?>
                <h4>Add Anchor</h4>
                <br/>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="text" name="anchor_id" class="form-control" placeholder="Anchor ID">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select name="config_id">
                                <option value=""> -- select config</option>
                                <?php foreach($configs as $config){
                                    echo "<option value='$config->id'>$config->name</option>";
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="text" name="location" class="form-control" placeholder="Location">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
            <?php echo form_close(); ?>

        </div>
    </div>
</div>

<?php require VIEWPATH . "footer.php"; ?>
