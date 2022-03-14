<?php if(isset($_SESSION['message'])):?>
    <h5 class="alert alert-danger text-center"><?php echo $_SESSION['message']?></h5>
    <?php unset ($_SESSION['message']);
    endif ;?>
    <div style="text-align: right;" >


<a class="btn btn-danger"href="/vcard/add"><?= $text_add ?></a>

</div>  
<div style="text-align: right;" >


<h1 class="text-center py-4 text-red my-4"><?=$text_all_users?> </h1>
</div>

<div class="row justify-content-center">
    <div class="col-sm-10">
        <table class="table">
            <thead>
                <tr>
                <th scope="col"><?=$subDomain?></th>
                <th scope="col"><?=$database_user?></th>
                <th scope="col"><?=$edit?></th>
                <th scope="col"><?=$delete?></th>
           
                </tr>
            </thead>
            <tbody>
            
              <?php if(false !== $Vcard):?>
                <?php foreach($Vcard as $allusers):?>
                <tr>
                    <th ><?=$allusers->subDomain?></th>
                    <td><?=$allusers->database_user?></td>
                  
                    <td>
                        <a class="btn btn-info" href="/vcard/edit/<?= $allusers->id ?>"> <i class="fa fa-edit"></i> </a>
                    </td>
                    <td>
                        <a class="btn btn-danger"href="/vcard/delete/<?= $allusers->id ?>"  onclick="if(!confirm('<?= $text_delete_confirm ?>')) return false;"> <i class="fas fa-times"></i> </a>
                    </td>
                </tr>
                <?php endforeach;?>
                <?php endif;?>
            </tbody>
        </table>
    </div>
</div>