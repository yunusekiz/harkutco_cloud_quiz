<br />
<center>
<form class="form-vertical" action='{base}admin_console/addNewAnswer' method="POST">
<input type="hidden" name="count" value="1" />
<label class="control-label" for="field1"><h2>Yeni Soru Ekleme Sihirbazı</h2></label><br /><br />


<div class="control-group" id="fields">
  <label class="control-label" for="username"> <h3> Cevaplar </h3></label>
           <div class="controls" id="profs"> 
             <div class="input-append">
              <textarea name="answers[]" id="field1" class="input-xlarge span5" rows="2"></textarea>
            <br />
              <button id="b1" onClick="addFormField()" class="btn btn-info" type="button"> Yeni Cevap Kutucuğu Ekle </button> 
             </div>
             <br />
           </div>
</div>

<br/>

<div class="control-group" id="fields">
  <label class="control-label" for="username"> <h3> Sorunun İçeriği </h3> </label>
           <div class="controls" id="profs"> 
             <div class="input-append">
            {last_question}
               <textarea name="question" id="field1" class="input-xlarge span5" rows="5" readonly>{question_detail}</textarea>
               <input type="hidden" name="question_id" value="{question_id}">
            {/last_question}
             </div>
           </div>
</div>

<div class="controls">
        <input type="submit" value="Kaydet ve Devam Et" class="btn btn-success">
</div> 

</form>
</center>

<script type="text/javascript">
            var next = 1;
        function addFormField(){
            var addto = "#field" + next;
          next = next + 1;
            var newIn = '<br /><br /><textarea autocomplete="off" class="input-xlarge span5" rows="2" id="field' + next + '" name="answers[]' + next + '" type="text" data-provide="typeahead" data-items="8"></textarea>';
            var newInput = $(newIn);
          $(addto).after(newInput);
            $("#field" + next).attr('data-source',$(addto).attr('data-source'));
            $("#count").val(next);  
        }
</script> 