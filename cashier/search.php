<!--<button type="button" class="btn btn-info btn-lg" style="background-color:yellow;color:#000000" data-toggle="modal" data-target="#myModal">NEWSLETTER</button>
-->
<script>
function showResult(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","search-database.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" style="padding:10px;border-style:solid;border-width:5px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Search Product</h4>
      </div>
      <div class="modal-body">
	  
	  <form action="" method="post" >
	  <div class="form-group">
		
		<input onKeyUp="showResult(this.value)" class="form-control" placeholder="enter product code">
		 
	  </div>
        
		<!--<button type="submit" name="search" class="btn btn-warning" >SEARCH</button>-->
		</form>
      </div>
      
	  <div id="txtHint"><b>Product details will be shown here...</b></div>
	  
	  <!--<table class="table table-bordered">
	  <thead>
	  <th>product code</th>
	  <th>description</th>
	  <th>price</th>
	  </thead>
	  <tbody>
	  <tr>
	  <td>446647</td>
	  <td>food</td>
	  <td>$500</td>
	  
	  </tr>
	  
	  </tbody>
	  </table>-->
	  
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>