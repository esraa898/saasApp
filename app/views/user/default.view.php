
  <?php if(isset($_SESSION['message'])):?>
    <h5 class="alert alert-danger text-center"><?php echo $_SESSION['message']?></h5>
    <?php unset ($_SESSION['message']);
    endif ;?>

<div style="text-align: right;" >


<a class="btn btn-danger"href="/user/add"><?= $text_add ?></a>

</div>  
<div style="text-align: right;" >


<h1 class="text-center py-4 text-red my-4"><?=$text_all_empolyess?> </h1>

</div>

<div class="row justify-content-center">
    <div class="col-sm-10">
        <table class="table">
            <thead>
                <tr>
                <th scope="col"><?=$name?></th>
                <th scope="col"><?=$title?></th>
                <th scope="col"><?=$phone?></th>
                <th scope="col"><?=$whatsapp?></th>
                <th scope="col"><?=$email?></th>
                <th scope="col"><?=$adress?></th>
                <th scope="col"><?=$image?></th>
                <th scope="col"><?=$cover?></th>
                <th scope="col"><?=$edit?></th>
                <th scope="col"><?=$delete?></th>
                </tr>
            </thead>
            <tbody>
            
              <?php if(false !== $empolyees):?>
                <?php foreach($empolyees as $empolyee):?>
                <tr>
                    <th ><?=$empolyee->name?></th>
                    <td><?=$empolyee->title?></td>
                    <td><?=$empolyee->phone?></td>
                    <td><?=$empolyee->whatsapp?></td>
                    <td><?=$empolyee->email?></td>
                    <td><?=$empolyee->adress?></td>
                    <td><?=$empolyee->image?></td>
                    <td><?=$empolyee->cover?></td>
                    <td>
                        <a class="btn btn-info" href="/user/edit/<?= $empolyee->id ?>"> <i class="fa fa-edit"></i> </a>
                    </td>
                    <td>
                        <a class="btn btn-danger"href="/user/delete/<?= $empolyee->id ?>"  onclick="if(!confirm('<?= $text_delete_confirm ?>')) return false;"> <i class="fas fa-times"></i> </a>
                    </td>
                </tr>
                <?php endforeach;?>
                <?php endif;?>
            </tbody>
        </table>
    </div>
</div>