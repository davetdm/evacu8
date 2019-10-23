<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php require_once "header.php"; ?>
<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Person</title>
</head>
<body>
<section class="banner-bottom py-5">
        <div class="container">
            <div class="content-grid">
            <h2>Edit Person</h2>
            <br>
                <div class="content-bottom">
                <?php echo form_open('person/save_person','id="saveForm"'); ?>
                    <input name="id" type="hidden" value="<?php echo $person->id; ?>">
                        <div class="field-group">
                            <div class="content-input-field">
                            <input name="first_name" id="first_name" type="text" value="<?php echo $person->first_name; ?>" placeholder="First Name" required="">
                            </div>
                        </div>
                        <div class="field-group">
                            <div class="content-input-field">
                            <input name="last_name" id="last_name" type="text" value="<?php echo $person->last_name; ?>" placeholder="Last Name" required="">
                            </div>
                        </div>
                        <div class="field-group">
                            <div class="content-input-field">
                            <input name="id_passport" id="id_passport" type="text" value="<?php echo $person->id_passport; ?>" placeholder="ID Or Passport" required="">
                            </div>
                        </div>
                        <div class="field-group">
                            <div class="content-input-field">
                          
                            <input name="email" id="email" type="text" value="<?php echo $person->email; ?>" placeholder="Email Address" required="">
                            </div>
                        </div>
                        <div class="field-group">
                            <div class="content-input-field">
                            <input name="mobile" id="mobile" type="text" value="<?php echo $person->mobile; ?>" placeholder="Mobile" required="">
                            </div>
                        </div>
                        <div class="field-group">
                            <div class="content-input-field">
                            <select name="type" id="type">
                                <option value="employee">Employee</option>
                                <option value="visitor">Visitor</option>
                                <option value="contractor">Contractor</option>
                            </select> 
                            </div>
                        </div>
                        <div class="field-group">
                            <div class="content-input-field">
                            <input name="date_added" id="date_added" type="date" value="<?php echo $person->date_added; ?>" placeholder="Date Added" required="">
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="content-input-field">                         
                            <button type="submit" id="save" class="btn btn-primary btn-lg">Save Person</button></a> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
 </section>
</body>
</html>

<?php require_once "footer.php"; ?>
