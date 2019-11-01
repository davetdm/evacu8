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
                    <h4 class="my-0 font-weight-normal">Persons</h4>
                </div>
                <div class="card-body">
                    <?php echo form_open('person/add_person','id="personForm"'); ?>
                        <div class="form-group">
                            <input name="first_name" id="first_name" type="text" class="form-control col-6" 
                                placeholder="First Name" required="">
                        </div>
                        <div class="form-group">
                            <input name="last_name" id="last_name" type="text" class="form-control col-6" 
                                placeholder="Last Name" required="">
                        </div>
                        <div class="form-group">
                            <input name="id_passport" id="id_passport" type="text" class="form-control col-6" 
                                placeholder="ID Or Passport" required="">
                        </div>
                        <div class="form-group">
                            <input name="email" id="email" type="email" class="form-control col-6" 
                                placeholder="Email Address" required="">
                        </div>
                        <div class="form-group">
                            <input name="mobile" id="mobile" type="text" class="form-control col-6" 
                                placeholder="Mobile" required="">
                        </div>
                        <div class="form-group">
                            <select name="type" id="type" class="form-control col-6">
                                <?php foreach($groups as $group){ 
                                    echo "<option value='$group->name'>$group->name</option>";
                                }?>
                            </select> 
                        </div>
                        <div class="form-group">                         
                            <button type="submit" class="btn btn-primary">Add Person</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<?php require VIEWPATH . "footer.php"; ?>

