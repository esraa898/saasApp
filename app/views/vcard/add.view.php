<div class=" col-md-4 offset-md-2">
        <form class="my-2 p-3 border" method="POST" >
            <div class="form-group">
                <label for="exampleInputName1"><?= $subDomain?></label>
                <input type="text" name="subDomain" class="form-control" id="exampleInputName1" >
            </div>
            <div class="form-group">
                <label for="exampleInputName1"><?= $database_user?></label>
                <input type="text" name="database_user" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
         
            <button type="submit" class="btn btn-primary" name="submit"><?= $save?></button>
        </form>
    </div>