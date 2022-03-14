


    <div class=" col-md-4 offset-md-2">
        <form class="my-2 p-3 border" method="POST" >
            <div class="form-group">
                <label for="exampleInputName1"><?= $name?></label>
                <input type="text" name="name" class="form-control" id="exampleInputName1" value="<?= $empolyee->name?>">
            </div>
            <div class="form-group">
                <label for="exampleInputName1"><?= $title?></label>
                <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $empolyee->title?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1"> <?=$phone?></label>
                <input type="text" name="phone" class="form-control" id="exampleInputPassword1" value="<?= $empolyee->phone?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1"> <?=$whatsapp?></label>
                <input type="text" name="whatsapp" class="form-control" id="exampleInputPassword1" value="<?= $empolyee->whatsapp?>">
            </div>
            <div class="form-group">
                <label for="exampleInputName1"> <?=$email?></label>
                <input type="text" name="email" class="form-control" id="exampleInputName1"  value="<?= $empolyee->email?>">
            </div>
            <div class="form-group">
                <label for="exampleInputName1"> <?=$adress?></label>
                <input type="text" name="adress" class="form-control" id="exampleInputName1"  value="<?= $empolyee->adress?>">
            </div>
             
            
            <div class="form-group">
                <label for="exampleInputName1"> <?=$image?></label>
                <input type="text" name="image" class="form-control" id="exampleInputName1"  value="<?= $empolyee->image?>">
            </div>
            <div class="form-group">
                <label for="exampleInputName1"> <?=$cover?></label>
                <input type="text" name="cover" class="form-control" id="exampleInputName1" value="<?= $empolyee->cover?>" >
            </div>
            
         
            <button type="submit" class="btn btn-primary" name="submit"><?= $save?></button>
        </form>
    </div>
