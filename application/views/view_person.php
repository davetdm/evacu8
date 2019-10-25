<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?> 
<?php require_once  VIEWPATH . "header.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Person</title>
</head>
<body>
<section class="banner-bottom py-5">
    <div class="container py-md-3">
        <div class="row grids-wthree-info text-center">
        <div class="card mb-4 shadow-sm">
              <div class="card-header">   
              <h2 class="display-4">Person</h2>
              </div> 
              <div class="card-body">   
               <table class="table" style="color: #000000">
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>First name </th>
                        <th>Last name</th>
                        <th>Id Or Passport</th>
                        <th>Email</th>
                        <th>Mobile no</th>
                        <th>Date added</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach($persons  as $person){ ?>
                    <tr>
                        <td> <?php echo $person->type; ?></td>
                        <td><?php echo  $person->first_name;?></td>
                        <td><?php echo  $person->last_name; ?></td>
                        <td><?php echo  $person->id_passport; ?></td>
                        <td><?php echo  $person->email; ?></td>
                        <td><?php echo  $person->mobile; ?></td>
                        <td><?php echo  $person->date_added; ?></td>
                        <td>
                            <a href="<?php echo base_url(); ?>person/update_person?id=<?php echo $person->id; ?>" ><i>Edit</i></a>
                            <a href="<?php echo base_url(); ?>person/delete_data?id=<?php echo $person->id; ?>">
                                <i>Delete</i>

                            </a>
                    </tr>
                    <?php }; ?>
                </tbody>          
            </table>
            <a href="<?php echo base_url(); ?>person">Back to Add Person</a>
            </div>
        </div>
    </div>
</section>
</body>
</html>
<?php require VIEWPATH . "footer.php"; ?>