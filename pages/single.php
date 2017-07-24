 <?php
include "../koneksi.php";


 ?>

 <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            SMS Single And Blast
                        </div>
                        <div class="panel-body">



<div id="accordion" role="tablist" aria-multiselectable="true">
  <div class="card">
    <div class="card-header" role="tab" id="headingOne">
      <h5 class="mb-0">
        <a data-toggle="collapsed" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          SINGLE SMS
        </a>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
      <div class="card-block">
     

         <form role="form" method="POST" action="index.php?IDNE=single_action">
                                       
              <div class="form-group">
                  <label>Masukkan No.HP</label>
                  <input class="form-control" placeholder="+62.." required="" name='HP'>
              </div>

          
               <div class="form-group">
                  <label>Pesan</label>
        <textarea class="form-control" rows="3" name="PESAN" required="" onkeyup="countChar(this)"></textarea>
          <div id="textarea_feedback">160 characters remaining</div>
          </div>


              <input type="submit" class="btn btn-default" value="SEND" name="SEND_SINGLE">

          </form><br><br>

      </div>
    </div>
  </div>





  <div class="card">
    <div class="card-header" role="tab" id="headingTwo">
      <h5 class="mb-0">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          SMS BLAST/BOMBER
        </a>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo"><!--baris untuk nutup collapse-->
      <div class="card-block">

 


<form method="POST" action="index.php?IDNE=import" enctype="multipart/form-data">
<input type="file" name="IMPORT">
<input type="submit" value="upload" name="SUBMIT">
</form>


 <div class="panel-body">
    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No HP</th>
                                        <th>SMS</th>
                                        <th>SDT</th>
                                    </tr>
                                </thead>
                                <tbody>

        <?php
        
            $sql_log = "SELECT * FROM sentitems ORDER BY InsertIntoDB DESC";
            $hasil_log = mysqli_query($mysqli, $sql_log);

           $no=1;
            while($data_log = mysqli_fetch_assoc($hasil_log)){

                 echo "<tr class='odd gradeX'>";
                 echo  "<td>".$no."</td>";
                 echo  "<td>".$data_log[DestinationNumber]."</td>";
                 echo  "<td>".$data_log[Text]."</td>";
                 echo  "<td>".$data_log[SendingDateTime]."</td>";
               echo "</tr>";

               $no++;
            }//end while



        ?>                        
                         
                                   
                 
                                    
          </tbody>
      </table>
    </div><!--end panel body-->




       
      </div>
    </div>
  </div>
 
</div>














                        </div><!--end pabel body-->
                    </div><!--end panel padefault--> 

 </div><!--end class row-->


 <script>
   function countChar(val) {
  var len = val.value.length;
  var text_max = 160;

  if (len >= text_max) {
    val.value = val.value.substring(0, text_max);
    $('#textarea_feedback').text(((text_max - len) + 1) + ' characters remaining - out of limit');
  } else {
    $('#textarea_feedback').text((text_max - len) + ' characters remaining');
  }
};



 </script>