<br />

<center>

<form class="form-vertical" action='{base}admin_console/addNewSubject' method="POST">
<input type="hidden" name="count" value="1" />

<label class="control-label" for="field1"><h2>Yeni Konu Ekleme Sihirbazı</h2></label><br /><br />

<div class="control-group">
    <label class="control-label" for="username"> <b>Konuların Bağlı Olduğu Dersler </b></label>
    <div class="controls">
    <select id="country" name="lecture_id" class="input-xlarge">
          <option value="0" selected="selected">(lütfen bir ders seçin)</option>
          {lectures}
          <option value="{lecture_id}">{lecture_name}</option>
          {/lectures}
  </select>
   </div>
</div> <br />  <br />
<div class="control-group" id="fields">
  <label class="control-label" for="username"> <b> Konular </b></label>
           <div class="controls" id="profs"> 
             <div class="input-append">
               <input autocomplete="off" class="input-xlarge" id="field1" name="subjects[]" type="text" placeholder="Sınav Konusu" data-provide="typeahead" data-items="8" 
data-source='["Konu 1","Konu 2","Konu 3","Konu 4","Konu 5"]'/><button id="b1" onClick="addFormField()" class="btn btn-info" type="button">+</button>

<!-- bu kodda dinamik olarak text area ekler
  <textarea name="subjects[]" id="field1" class="input-xlarge span5" rows="5"></textarea>

 <br />
<button id="b1" onClick="addFormField()" class="btn btn-info" type="button"> +1 Yeni Kutucuk Ekle </button> -->
             </div>
             <br /><small> + işaretine tıklayarak yeni kutucuk ekleyebilrsiniz :)</small>
           </div>
</div>
        
      <div class="controls">
          <input type="submit" value="Kaydet" class="btn btn-success">
      </div>         
<form>         
 
<script type="text/javascript">
        var next = 1;
        function addFormField(){
            var addto = "#field" + next;
	        next = next + 1;
            var newIn = '<br /><br /><input autocomplete="off" placeholder="Sınav Konusu" class="input-xlarge" id="field' + next + '" name="subjects[]' + next + '" type="text" data-provide="typeahead" data-items="8">';
            var newInput = $(newIn);
	        $(addto).after(newInput);
            $("#field" + next).attr('data-source',$(addto).attr('data-source'));
            $("#count").val(next);  
        }

/*    bu kodda dinamik olarak text area ekler          
            var next = 1;
        function addFormField(){
            var addto = "#field" + next;
          next = next + 1;
            var newIn = '<br /><br /><textarea autocomplete="off" placeholder="Sınav Konusu" class="input-xlarge span5" rows="5" id="field' + next + '" name="subjects[]' + next + '" type="text" data-provide="typeahead" data-items="8"> </textarea>';
            var newInput = $(newIn);
          $(addto).after(newInput);
            $("#field" + next).attr('data-source',$(addto).attr('data-source'));
            $("#count").val(next);  
        }*/
       

</script>

</center>