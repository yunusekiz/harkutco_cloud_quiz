<br />
<center>
<form class="form-vertical" action='{base}admin_console/addNewQuestion' method="POST">
<input type="hidden" name="count" value="1" />

<label class="control-label" for="field1"><h2>Yeni Soru Ekleme Sihirbazı</h2></label><br /><br />

<div class="control-group">
    <label class="control-label" for="username"> <b>Sorunun Bağlı Olduğu Konu </b></label>
    <div class="controls">
    <select id="country" name="subject_id" class="input-xlarge">
          <option value="0" selected="selected">(lütfen bir konu seçin)</option>
          {subjects}
          <option value="{subject_id}">{subject_name}</option>
          {/subjects}
  </select>
   </div>
</div> <br />
<div class="control-group" id="fields">
  <label class="control-label" for="username"> <b> Sorunun İçeriği</b></label>
           <div class="controls" id="profs"> 
             <div class="input-append">
               <textarea name="question" id="field1" class="input-xlarge span5" rows="5"></textarea>
             </div>
           </div>
</div>
      <div class="controls">
          <input type="submit" value="Kaydet ve Devam Et" class="btn btn-success">
      </div>         
<form>         
</center>