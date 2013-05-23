  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{title}</title>
      
      <link href="{base}assets/css/bootstrap.css" type="text/css" rel="stylesheet">
      <link href="{base}assets/css/bootstrap-responsive.css" type="text/css" rel="stylesheet">
      <link href="{base}assets/css/main.css" type="text/css" rel="stylesheet">

      <script src="{base}assets/js/jquery.js"></script>
      <script src="{base}assets/js/bootstrap.js"></script>
</head>
<body>
<img alt="full screen background image" src="{base}assets/images/background_6.jpg" id="full-screen-background-image" /> 

<!-- <div class="navbar navbar-inverse">
  <div class="navbar-inner">
    <div class="container-fluid">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="brand" href="#" name="top">Harkut</a>
      <div class="nav-collapse collapse">
        <ul class="nav">

          <li class="active">
            <a href="#"><i class="icon-home icon-white"></i> Anasayfa</a>
          </li>

          <li class="divider-vertical"></li>

          <li >
            <a href="#"><i class="icon-file icon-white"></i> Pages</a>
          </li>

          <li class="divider-vertical"></li>

          <li>
            <a href="#"><i class="icon-envelope icon-white"></i> Messages</a>
          </li>

          <li class="divider-vertical"></li>
          
          <li>
            <a href="#"><i class="icon-signal icon-white"></i> İstatistikler</a>
          </li>
          
          <li class="divider-vertical"></li>

          <li>
            <a href="#"><i class="icon-lock icon-white"></i> Permissions</a>
          </li>
          
          <li class="divider-vertical"></li>

        </ul>
        <div class="btn-group pull-right">
          <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="icon-user"></i> admin <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li><a href="#"><i class="icon-wrench"></i> Ayarlar</a></li>
            <li class="divider"></li>
            <li><a href="#"><i class="icon-share"></i> Oturumu Kapat</a></li>
          </ul>
        </div>
      </div>

    </div>

  </div>

</div> -->

<div class="navbar navbar-inverse nav">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="/">Cloud Quiz</a>
      
            <div class="nav-collapse collapse">
              <ul class="nav">
                  <li class="divider-vertical"></li>
                  <li><a href="#"><i class="icon-home icon-white"></i> Anasayfa</a></li>
              </ul>
              <div class="pull-left">
                <ul class="nav pull-left">
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-file icon-white"></i> Sınavlar <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="/user/preferences" data-toggle="modal"><i class="icon-plus"></i> Yeni Sınav Oluştur</a></li>
                            <li><a href="/help/support"><i class="icon-signal"></i> Sınav İstatistikleri</a></li>
                            <li class="divider"></li>
                            <li><a href="/auth/logout"><i class="icon-off"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
              </div>

              <div class="pull-left">
                <ul class="nav pull-left">
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-th-list icon-white"></i> Sorular <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{base}admin_console/addNewQuestionForm"><i class="icon-plus"></i> Yeni Soru Oluştur</a></li>
                            <li><a href="{base}admin_console/addNewSubjectForm"><i class="icon-plus"></i> Yeni Konu Oluştur</a></li>
                            <li class="divider"></li>
                            <li><a href="/auth/logout"><i class=" icon-edit"></i> Soruları Düzenle</a></li>
                             <li><a href="/auth/logout"><i class="icon-edit"></i> Konuları Düzenle </a></li>
                        </ul>
                    </li>
                </ul>
              </div> 

              <div class="pull-right">
                <ul class="nav pull-right">
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog icon-white"></i> Welcome, User <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="/user/preferences"><i class="icon-cog"></i> Preferences</a></li>
                            <li><a href="/help/support"><i class="icon-envelope"></i> Contact Support</a></li>
                            <li class="divider"></li>
                            <li><a href="/auth/logout"><i class="icon-off"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
              </div>
            </div>
        </div>
    </div>
</div>
