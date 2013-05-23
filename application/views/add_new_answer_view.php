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
<div class="control-group" id="fields">
  <label class="control-label" for="username"> <b> Cevap Şıkkı (A)</b></label>
           <div class="controls" id="profs"> 
             <div class="input-append">
               <textarea name="option_a" id="field1" class="input-xlarge span5" rows="2"></textarea>
             </div>
           </div>
</div>
<div class="control-group" id="fields">
  <label class="control-label" for="username"> <b> Cevap Şıkkı (B)</b></label>
           <div class="controls" id="profs"> 
             <div class="input-append">
               <textarea name="option_b" id="field1" class="input-xlarge span5" rows="2"></textarea>
             </div>
           </div>
</div>
<div class="control-group" id="fields">
  <label class="control-label" for="username"> <b> Cevap Şıkkı (C)</b></label>
           <div class="controls" id="profs"> 
             <div class="input-append">
               <textarea name="option_c" id="field1" class="input-xlarge span5" rows="2"></textarea>
             </div>
           </div>
</div>
<div class="control-group" id="fields">
  <label class="control-label" for="username"> <b> Cevap Şıkkı (D)</b></label>
           <div class="controls" id="profs"> 
             <div class="input-append">
               <textarea name="option_d" id="field1" class="input-xlarge span5" rows="2"></textarea>
             </div>
           </div>
</div>
<!-- <div class="control-group">
    <label class="control-label"  for="username">Doğru Cevap : </label>
        <div class="controls">
            <select id="country" name="branch" class="input-xlarge span5">
                <option value="A" selected="selected">A Şıkkı</option>
                <option value="B">B Şıkkı</option>
                <option value="C">C Şıkkı</option>
                <option value="D">D Şıkkı</option>                
            </select>
        </div>
</div>  -->


<div class="controls">
   <label class="control-label" for="username"> <b> Doğru Cevap</b></label>
    <input type="radio" name="right_answer" value="A"><b style="margin-right:15px;">A </b> 
    <input type="radio" name="right_answer" value="B"><b style="margin-right:15px;">B </b> 
    <input type="radio" name="right_answer" value="C"><b style="margin-right:15px;">C </b> 
    <input type="radio" name="right_answer" value="D"><b style="margin-right:15px;">D </b>     
</div>
<br/>
<div class="controls">
        <input type="submit" value="Kaydet" class="btn btn-success">
</div> 

</form>
</center> 
