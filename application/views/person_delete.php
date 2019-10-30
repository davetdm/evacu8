<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<?php require VIEWPATH . "header.php"; ?>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Persons</h1>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-2">
            <a href="/person" class="btn btn-primary btn-block">Persons</a>
            <a href="/person/add" class="btn btn-primary btn-block">Add Person</a>
        </div>
        <div class="col-md-10">
            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Delete Person</h4>
                </div>
                <div class="card-body">
                    <?php echo form_open('person/delete_person','id="deleteForm"'); ?>
                        <input name="id" type="hidden" value="<?php echo $person->id; ?>">
                        <h4> Are you sure you want to delete <?php echo $person->first_name ?>?</h4>
                        <div class="form-group">                         
                            <button type="submit" class="btn btn-danger">Delete Person</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<?php require VIEWPATH . "footer.php"; ?>

