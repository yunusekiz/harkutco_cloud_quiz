  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Öğretmen Giriş Ekranı</title>
      
      <link href="{base}assets/css/bootstrap.css" type="text/css" rel="stylesheet">
      <link href="{base}assets/css/bootstrap-responsive.css" type="text/css" rel="stylesheet">

      <script src="{base}assets/js/jquery.js"></script>
      <script src="{base}assets/js/bootstrap.js"></script>


</head>
<body>



        <div class="" id="loginModal">
          <center>
          <div class="modal-body" style="max-height:800px; max-width:800px; margin-top:100px;">
            <div class="well">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#login" data-toggle="tab">Giriş</a></li>
                <li><a href="#create" data-toggle="tab">Yeni Kayıt</a></li>
              </ul>
              <div id="myTabContent" class="tab-content">
                <div class="tab-pane active in" id="login">
                  <form class="form-horizontal" action='action/login_control' method="POST">
                    <fieldset>
                      <div id="legend">
                        <legend class="">Öğretmen Girişi</legend>
                      </div>    
                      <div class="control-group">
                        <!-- Username -->
                        <label class="control-label"  for="username">E-Posta : </label>
                        <div class="controls">
                          <input type="text" id="username" name="email" required placeholder="E-Posta Adresi" class="input-xlarge">
                        </div>
                      </div>
 
                      <div class="control-group">
                        <!-- Password-->
                        <label class="control-label" for="password">Şifre : </label>
                        <div class="controls">
                          <input type="password" id="password" name="password" required placeholder="Şifre" class="input-xlarge">
                        </div>
                      </div>
 
 
                      <div class="control-group">
                        <!-- Button -->
                        <div class="controls">
                          <input type="submit" value="Giriş" class="btn btn-success"> 
                        </div>
                      </div>
                    </fieldset>
                  </form>                
                </div>
                <div class="tab-pane fade" id="create">
                  <form id="tab" class="form-horizontal" action="action/addNewTeacher" method="POST">
                    <fieldset>
                      <div id="legend">
                        <legend class="">Yeni Öğretmen Kayıt Formu</legend>
                      </div>    
                      <div class="control-group">
                        <!-- Username -->
                        <label class="control-label"  for="username">İsim : </label>
                        <div class="controls">
                          <input type="text" id="username" name="name" required placeholder="İsim" class="input-xlarge">
                        </div>
                      </div>

                      <div class="control-group">
                        <!-- Username -->
                        <label class="control-label"  for="surname">Soyisim : </label>
                        <div class="controls">
                          <input type="text" id="username" name="surname" required placeholder="Soyisim" class="input-xlarge">
                        </div>
                      </div>

                     <div class="control-group">
                        <label class="control-label"  for="username">Branş : </label>
                        <div class="controls">
                            <select id="country" name="branch" class="input-xlarge">
                                <option value="0" selected="selected">(lütfen bir branş seçin)</option>
                                {teacher_branches}
                                <option value="{teacher_branch_id}">{teacher_branch_name}</option>
                                {/teacher_branches}
                            </select>
                        </div>
                     </div>   

                       <div class="control-group">
                        <!-- Username -->
                        <label class="control-label" for="username">E-Posta : </label>
                        <div class="controls">
                          <input type="text" id="username" name="email" required placeholder="E-Posta Adresi" class="input-xlarge">
                        </div>
                      </div>                                               
 
                      <div class="control-group">
                        <!-- Password-->
                        <label class="control-label" for="password"> Şifre : </label>
                        <div class="controls">
                          <input type="password" id="password" name="password" required placeholder="Şifre" class="input-xlarge">
                        </div>
                      </div>
 
 
                      <div class="control-group">
                        <!-- Button -->
                        <div class="controls">
                          <input type="submit" value="Kaydet" class="btn btn-success">
                        </div>
                      </div>
                    </fieldset>
                  </form>
                </div>
            </div>
          </div>
        </div>
        </center>





</body>
</html>
