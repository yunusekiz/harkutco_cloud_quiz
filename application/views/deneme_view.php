<br />
<center>
<form class="form-vertical" action='{base}admin_console/addNewAnswer' method="POST">
<input type="hidden" name="count" value="1" />
<label class="control-label" for="field1"><h2>Yeni Soru Ekleme Sihirbazı</h2></label><br /><br />

<div class="control-group" id="fields">
  <label class="control-label" for="username"> <b> Sorunun İçeriği</b></label>
           <div class="controls" id="profs"> 
             <div class="input-append">
            {last_question}
               <textarea name="question" id="field1" class="input-xlarge span5" rows="5" readonly>{question_detail}</textarea>
            {/last_question}
             </div>
           </div>
</div>

<table>
  <thead>
    <tr>
      <th>Seçenekler</th>
      <th class="span2"></th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <td><input type="radio" name="radio"></td>
        <td><textarea name="option_d" id="field1" class="input-xlarge span5" rows="3" readonly></textarea></td>
    </tr>
    <tr>
      <td><input type="radio" name="radio"></td>
      <td><textarea name="option_d" id="field1" class="input-xlarge span5" rows="3" readonly></textarea></td>
    </tr>
  </tbody>
</table>
<br/>
<div class="controls">
        <input type="submit" value="Kaydet" class="btn btn-success">
</div> 

</form>
</center> 
