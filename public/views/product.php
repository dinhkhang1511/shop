
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Shop Admin Dashboard Sleek Template</title>

  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet"/>
  <link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />

 
  
  <!-- SLEEK CSS -->
  <link id="sleek-css" rel="stylesheet" href="<?= $_SESSION['SITE_URL'] .'public/css/sleek.css'?> "/>

  

  <!-- FAVICON -->
  <link href="<?= $_SESSION['SITE_URL'] ?>/public/img/favicon.png" rel="icon">

  <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

 <body class="header-fixed sidebar-fixed sidebar-dark header-light" id="body">
    <script>
      NProgress.configure({ showSpinner: false });
      NProgress.start();
    </script>

    <div class="mobile-sticky-body-overlay"></div>

    <div class="wrapper">
      
              <!--
          ====================================
          ——— LEFT SIDEBAR WITH FOOTER
          =====================================
        -->
        <aside class="left-sidebar bg-sidebar">
          <div id="sidebar" class="sidebar sidebar-with-footer">
            <!-- Aplication Brand -->
            <div class="app-brand">
              <a href="<?= Config::SITE_URL . 'public/home' ?>">
                <svg
                  class="brand-icon"
                  xmlns="http://www.w3.org/2000/svg"
                  preserveAspectRatio="xMidYMid"
                  width="30"
                  height="33"
                  viewBox="0 0 30 33"
                >
                  <g fill="none" fill-rule="evenodd">
                    <path
                      class="logo-fill-blue"
                      fill="#7DBCFF"
                      d="M0 4v25l8 4V0zM22 4v25l8 4V0z"
                    />
                    <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                  </g>
                </svg>
                <span class="brand-name">Shop dashboard</span>
              </a>
            </div>
            <!-- begin sidebar scrollbar -->
            <div class="sidebar-scrollbar">

              <!-- sidebar menu -->
              <ul class="nav sidebar-inner" id="sidebar-menu">
                

                
                  <li  class="" >
                    <a class=" sidenav-item-link" href="<?= Config::SITE_URL . 'public/admin' ?>" 
                      aria-expanded="false" aria-controls="dashboard">
                      <i class="mdi mdi-view-dashboard-outline"></i>
                      <span class="nav-text">Sản phẩm</span> <b class="caret"></b>
                    </a>
                  </li>
                  <li  class="active  " >
                    <a class="sidenav-item-link" href="#"  style="cursor:context-menu;"
                      aria-expanded="false" aria-controls="ui-elements">
                      <i class="mdi mdi-folder-multiple-outline"></i>
                      <span class="nav-text">Thêm sản phẩm</span> <b class="caret"></b>
                    </a>
                  </li>
                  <li  class="" >
                    <a class="sidenav-item-link" href="<?= Config::SITE_URL . 'public/user' ?>" 
                      aria-expanded="false" aria-controls="charts">
                      <i class="mdi mdi-chart-pie"></i>
                      <span class="nav-text">Người dùng</span> <b class="caret"></b>
                    </a>
                  </li>
              </ul>
            </div>
            <hr class="separator" />
            <div class="sidebar-footer">
              <div class="sidebar-footer-content">
                <h6 class="text-uppercase">
                  Cpu Uses <span class="float-right">40%</span>
                </h6>
                <div class="progress progress-xs">
                  <div
                    class="progress-bar active"
                    style="width: 40%;"
                    role="progressbar"
                  ></div>
                </div>
                <h6 class="text-uppercase">
                  Memory Uses <span class="float-right">65%</span>
                </h6>
                <div class="progress progress-xs">
                  <div
                    class="progress-bar progress-bar-warning"
                    style="width: 65%;"
                    role="progressbar"
                  ></div>
                </div>
              </div>
            </div>
          </div>
        </aside>

      

      <div class="page-wrapper">
                  <!-- Header -->
          <header class="main-header " id="header">
            <nav class="navbar navbar-static-top navbar-expand-lg">
              <!-- Sidebar toggle button -->
              <button id="sidebar-toggler" class="sidebar-toggle">
                <span class="sr-only">Toggle navigation</span>
              </button>
              <!-- search form -->
              <div class="search-form d-none d-lg-inline-block">
                <div class="input-group">
                  <button type="button" name="search" id="search-btn" class="btn btn-flat">
                    <i class="mdi mdi-magnify"></i>
                  </button>
                  <input type="text" name="query" id="search-input" class="form-control" placeholder="'button', 'chart' etc."
                    autofocus autocomplete="off" />
                </div>
                <div id="search-results-container">
                  <ul id="search-results"></ul>
                </div>
              </div>

              <div class="navbar-right ">
                <ul class="nav navbar-nav">
                  <!-- Github Link Button -->
                  <li class="github-link mr-3">
                    <a class="btn btn-outline-secondary btn-sm" href="https://github.com/tafcoder/sleek-dashboard" target="_blank">
                      <span class="d-none d-md-inline-block mr-2">Source Code</span>
                      <i class="mdi mdi-github-circle"></i>
                    </a>

                  </li>
                  <li class="dropdown notifications-menu">
                    <button class="dropdown-toggle" data-toggle="dropdown">
                      <i class="mdi mdi-bell-outline"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                      <li class="dropdown-header">You have 5 notifications</li>
                      <li>
                        <a href="#">
                          <i class="mdi mdi-account-plus"></i> New user registered
                          <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 10 AM</span>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="mdi mdi-account-remove"></i> User deleted
                          <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 07 AM</span>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="mdi mdi-chart-areaspline"></i> Sales report is ready
                          <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 12 PM</span>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="mdi mdi-account-supervisor"></i> New client
                          <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 10 AM</span>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="mdi mdi-server-network-off"></i> Server overloaded
                          <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 05 AM</span>
                        </a>
                      </li>
                      <li class="dropdown-footer">
                        <a class="text-center" href="#"> View All </a>
                      </li>
                    </ul>
                  </li>
                  <!-- User Account -->
                  <li class="dropdown user-menu">
                    <button href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                      <img src="<?= CONFIG::SITE_URL . 'public/img/user.jpg' ?>" class="user-image" alt="User Image" />
                      <span class="d-none d-lg-inline-block"><?=$user['name'] ?></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                      <!-- User image -->
                      <li class="dropdown-header">
                        <img src="<?= CONFIG::SITE_URL . 'public/img/user.jpg' ?>" class="img-circle" alt="User Image" />
                        <div class="d-inline-block">
                        <?=$user['name'] ?> <small class="pt-1"><?=$user['email'] ?></small>
                        </div>
                      </li>

                      <li>
                        <a href="#">
                          <i class="mdi mdi-account"></i> My Profile
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="mdi mdi-email"></i> Message
                        </a>
                      </li>
                      <li>
                        <a href="#"> <i class="mdi mdi-diamond-stone"></i> Projects </a>
                      </li>
                      <li>
                        <a href="#"> <i class="mdi mdi-settings"></i> Account Setting </a>
                      </li>

                      <li class="dropdown-footer">
                        <a href="logout"> <i class="mdi mdi-logout"></i> Log Out </a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
            </nav>


          </header>

  <div class="row">
      <div class="col-lg-8">
          <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2><?= isset($product) ? 'Sửa sản phẩm' : 'Thêm sản phẩm' ?></h2>
                </div>
                
                <div class="card-body">
                  <?php if(isset($_SESSION['error'])): ?>
                    <div class="alert alert-danger" role="alert">
                          <?= $_SESSION['error'] ?>
                    </div>
                  <?php endif; ?>
                  <?php if(isset($_SESSION['success'])): ?>
                    <div class="alert alert-success" role="alert">
                          <?= $_SESSION['success'] ?>
                    </div>
                  <?php endif; ?>
                    <form method="POST" enctype="multipart/form-data" action=" <?= isset($product) ? Config::SITE_URL . 'public/editProduct' :  Config::SITE_URL . 'public/addProduct'?>" >
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="name" placeholder="Tên sản phẩm" name='name' required
                            value="<?= isset($product) ? $product['name'] : '' ?>">
                        </div>
                        <input type="hidden" value=" <?=isset($product) ? $product['id'] : ''?>" name="product_id"/>
                        
                        <div class="form-group">
                            <label for="exampleFormControlSelect12">Thể loại</label>
                            <select class="form-control" id="category_id" name='category_id'>>
                                <?php foreach($categories_ as $category): ?>
                                    <?php if(empty($category['parent_id'])): ?>
                                        <option value = "<?= $category['id'] ?>" > <?= $category['name'] ?> </option>
                                    <?php foreach($categories_ as $child): ?>
                                        <?php if($child['parent_id'] == $category['id']): ?>
                                            <option value = "<?= $child['id'] ?>" >&nbsp&nbsp<?= $child['name'] ?> </option>
                                        <?php endif; ?>
                                    <?php endforeach ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlPassword">Giá </label>
                            <input type="number" class="form-control" id="price" placeholder="Giá" name="price" required
                            value="<?= isset($product) ? $product['price'] : '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlPassword">Số lượng </label>
                            <input type="number" class="form-control" id="quantity" placeholder="Số lượng" name="quantity" required
                            value="<?= isset($product) ? $product['quantity'] : '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Mô tả</label>
                            <textarea class="form-control" id="description" rows="3" name="description" required><?= isset($product) ? $product['description'] : '' ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Ảnh</label>
                            <input type="file" class="form-control-file" id="image" name="image" onchange="readURL(this)">
                            
                            <img id="image-preview" style="width: auto; height:100px;" src="<?= isset($product) ? Config::SITE_URL .'public/img/product_img/' . $product['image'] .Config::EXT_IMG : "" ?> "> </img> 
                        </div>
                          <div class="form-group">
                              <label for="exampleFormControlFile1">Album ảnh</label>
                              <input type="file" multiple class="form-control-file" id="album" name="album[]">
                              <div id="box" style="margin-top: 10px">
                                <?php if(isset($images_)): ?>
                                <?php foreach($images_ as $image): ?>
                                <img id="image-album" style="width: auto; height:100px;" src="<?= Config::SITE_URL . 'public/img/product_img/'. $image['name'] .Config::EXT_IMG ?>"> </img> 
                                <?php endforeach; ?>
                                <?php endif; ?>
                              </div>
                          </div>
                        
                        <div class="form-footer pt-4 pt-5 mt-4 border-top">
                            <button type="submit" class="btn btn-primary btn-default">Submit</button>
                            <a type="button" href="<?= Config::SITE_URL . 'public/admin' ?>" class="btn btn-secondary btn-default">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4 ">
            
        </div>
    </div>	
  
  
  <footer class="footer mt-auto">
    <div class="copyright bg-white">
      <p>
        &copy; <span id="copy-year">2019</span> Copyright Sleek Dashboard Bootstrap Template by
        <a
          class="text-primary"
          href="http://www.iamabdus.com/"
          target="_blank"
          >Abdus</a
        >
      </p>
    </div>
    <script>
        var d = new Date();
        var year = d.getFullYear();
        document.getElementById("copy-year").innerHTML = year;
    </script>
  </footer>

</div>
</div>

<script src="<?= $_SESSION['SITE_URL'] .'public/js/jquery.min.js'?>"></script>
<script src="<?= $_SESSION['SITE_URL'] .'public/js/bootstrap.bundle.min.js'?>"></script>
<script src="<?= $_SESSION['SITE_URL'] .'public/js/sleek.js'?>"></script>
<script src="<?= $_SESSION['SITE_URL'] .'public/js/custom.js'?>"></script>

<script>
  function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#image-preview')
                .attr('src', e.target.result)
                .width(150)
                .height(200);

        };
        reader.readAsDataURL(input.files[0]);
    }
};

  $(function() {
      $('#album').change(function () {
        var img = this.files;
        if(img.length === 1){
          var reader = new FileReader();
          reader.onload = function (e) {
            document.getElementById("image-album").src = e.target.result;
          };
          reader.readAsDataURL(img[0]);
        }
        else{
          for (let i = 0; i < img.length; i++) {
            var image = document.createElement('img');

            image.setAttribute('src', '');
            image.setAttribute('width', '100px');
            image.setAttribute('style', 'padding: 5px;');
            image.setAttribute('id', 'image-album'+i);
            
            var box = document.getElementById('box');
            box.appendChild(image);

            var reader = new FileReader();
            reader.onload = function (e) {
              // get loaded data and render thumbnail.
              document.getElementById("image-album"+i).src = e.target.result;
            };
            reader.readAsDataURL(img[i]);
          }
        }
    })
  });

          
</script>


  </body>
</html>

<?php
unset($_SESSION['error']);
unset($_SESSION['success']);?>
