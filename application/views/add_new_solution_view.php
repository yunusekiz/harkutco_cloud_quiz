 <br />
<center>
<form class="form-vertical" action='{base}admin_console/addNewSolution' method="POST">
<input type="hidden" name="count" value="1" />
<label class="control-label" for="field1"><h2>Yeni Soru Ekleme Sihirbazı</h2></label><br /><br />

<table>
  <thead>
    <tr>
      <th>Doğru Cevap Şıkkı</th>
      <th class="span1">(lütfen şıklardan birini seçin)</th>
    </tr>
  </thead>
  <tbody>{last_answers}
    <tr>
        
        <td><input type="radio" name="answer_id" value="{answer_id}"></td>
        <td><textarea name="answers[]" id="field1" class="input-xlarge span5" rows="3" readonly>{answer_detail}</textarea></td>
        
    </tr>{/last_answers}
  </tbody>
</table>

<br/><br/>

 <div class="control-group" id="fields">
  <label class="control-label" for="username"> <h3> Sorunun İçeriği </h3> </label>
           <div class="controls" id="profs"> 
             <div class="input-append">
            {last_question}
               <textarea name="question" id="field1" class="input-xlarge span7" rows="5" readonly>{question_detail}</textarea>
               <input type="hidden" name="question_id" value="{question_id}">
            {/last_question}
             </div>
           </div>
</div> 

<div class="controls">
        <input type="submit" value="Doğru Cevabı Seç ve Kaydı Tamamla" class="btn btn-block btn-success btn-large">
</div> 

</form>
</center> 

 


<br>
<br>


<!-- {last_question}

    {question_detail}

{/last_question}  -->