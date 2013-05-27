 <br />
<br />
<div class="container" style="width:35%">
  <label class="control-label" for="field1"><h2>Kayıtlı Tüm Konular ve Sorular</h2></label>
</div>
<br /><br /><br />
<div class="container" style="width:70%">
<form method="POST" action="{base}exam/addNewExam">
<table class="table table-condensed table-hover">
  <thead>
    <tr>
      <th class="span2"><h4>Soru Seçin</h4></th>
      <th class="span2"><h4>Konular</h4> </th>
      <th class="span1"></th>
      <th class="span9"><h4>Soru Detayları</h4></th>
    </tr>
  </thead>
  <tbody>
    {subject_and_question}
    <tr>
      <td><input type="checkbox" name="exam_questions[]" value="{question_id}"></td>
      <td><span class="label pull-left">{subject_name}</span></td>
       <td></td>
      <td>{question_detail}</td>
    </tr>
    {/subject_and_question}
  </tbody>
</table>
<!-- <input type="submit" value="Seçili Soruları Kullanarak Yeni Sınav Oluştur" class="btn btn-block btn-success">  -->



<a href="#advanced" role="button" data-toggle="modal" class="btn btn-large btn-success">Seçili Soruları Kullanarak Yeni Sınav Oluştur</a>
 
<!-- Advanced Modal -->
<div id="advanced" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="advancedSort" aria-hidden="true">
  <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <ul class="nav nav-pills pull-right">
        <li class="active">
          <a href="#date" data-toggle="pill"><i class="icon-calendar icon-black"></i> Tarih</a>
        </li>
        <li><a href="#relevance" data-toggle="pill"><i class="icon-time icon-black"></i> Süre</a></li>
      </ul>
      <h4>Sınav Detayları</h4>  
  </div>
  <div class="modal-body">
      <div class="row-fluid">
      <div class="tab-content">
        <div class="tab-pane active" id="date">
              <div class="controls controls-row">
                  <div><b>Sınav Tarihi : </b><input type="text" name="exam_date" id="datepicker" value="{default_exam_date}"></div>
              </div>
            
          </div>
          <div class="tab-pane" id="relevance">
              <div class="controls controls-row">
                  <div><b>Sınav Süresi : </b><input type="text" name="exam_time" value="{default_exam_time}" style="width:40px;"> <b>(dakika)</b></div>
              </div>               
          </div>
          <br />
          <input type="submit" value="Sınavı Kaydet" class="btn btn-block btn-primary">
        </div>          
      </div>
  </div>
</div>

</form>
</div> 