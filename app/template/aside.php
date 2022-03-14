<aside class=" main-sidebar sidebar-dark-primary elevation-4">


    <!-- Sidebar -->
    
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
        <div class="info">
          <a href="#" class="d-block"><?=$text_dashboard?></a>
        </div>
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/design/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
       
        <div class="info">
          <a href="#" class="d-block">اسراء خالد</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/user/" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
            
               <?=$text_empolyee ?>  
              </p>
            </a>
           
          </li>
          <li class="nav-item">
            <a href="/vcard/" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
            
               <?=$text_users ?>  
              </p>
            </a>
           
          </li>
          <li class="nav-item">
            <a href="/empolyee/" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
              <?=$log_out ?>
               
              </p>
            </a>
           
          </li>
          <li class="nav-item">
            <a href="/language/" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
           
              <?= $change_language ?>
              </p>
            </a>
           
          </li>
         
        </ul>

  
      </nav>
      <!-- /.sidebar-menu -->
    </div>
   
    <!-- /.sidebar -->
  </aside>