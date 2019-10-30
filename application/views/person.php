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
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Type</th>
                                <th>Person</th>
                                <th>Id Or Passport</th>
                                <th>Email</th>
                                <th>Mobile no</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php foreach($persons  as $person){ ?>
                                <tr>
                                    <td> <?php echo $person->type; ?></td>
                                    <td><?php echo  $person->first_name . " " .  $person->last_name;?></td>
                                    <td><?php echo  $person->id_passport; ?></td>
                                    <td><?php echo  $person->email; ?></td>
                                    <td><?php echo  $person->mobile; ?></td>
                                    <td>
                                        <a href="/person/view?h=<?=utils::hashed()?>&id=<?php echo $person->id; ?>">edit</a> |
                                        <a href="/person/delete?h=<?=utils::hashed()?>&id=<?php echo $person->id; ?>" class="text-danger">delete</a>
                                    </td>
                                </tr>
                            <?php }; ?>
                        </tbody>          
                    </table>
                </div>
            </div>
           
        </div>
    </div>
</div>

<?php require VIEWPATH . "footer.php"; ?>

