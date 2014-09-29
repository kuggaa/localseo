<script>
$(document).ready(function(){
    $('#businessname').focus();
});

</script>

<?php
if(isset($_POST['basic']) && $_POST['basic'] == '3/3'){
//    printarray($_POST);
    $website = $_POST['website'];
}

?>

<h3>Kindly Give Us Some More Details</h3>
<h4 class="label label-important" style="padding:10px; word-spacing: 1px;">NOTE :- PLEASE INSERT ONLY VALID DATA BELOW, OTHERWISE YOU WILL EITHER GET WRONG RESULTS OR NO RESULT AT ALL.
   <br/> Valid Data is in the eg. format for every field</h4>


<form action="index.php?page=prepareReport" method="post" onsubmit="return validate();">
    <input type="hidden" name="prepareReport" value="4/3"/>
    
    <table cellpadding="10">
        <tr>
            <td>Business Name<sup>*</sup><br>
            <input type="text" required="yes" class="txtBox" style="width:250px;" id="businessname" name="businessname" placeholder="eg. Northwestern Memorial Hospital"></td>
            
            <td>Street Address<sup>*</sup><br>
            <input type="text" required="yes" class="txtBox" style="width:250px;"  name="street_address" placeholder="eg. 251 E Huron St"></td>
        </tr>

        <tr>
            <td>City<sup>*</sup><br>
             <input type="text" required="yes" class="txtBox" style="width:250px;"  name="city" placeholder="eg. Chicago"></td>

            <td>State<sup>*</sup><br>
               <select name="state" id="state"> 
                    <?php include_once('StatesofAmerica.html'); ?>
               </select>
               <span style="color:red;" id="state_error"></span>
            </td>
        </tr>
        
        <tr>
            <td>Website<sup>*</sup><br>
             <input type="text" required="yes" class="txtBox" style="width:250px;" value="<?php echo $website; ?>" name="website" placeholder="eg. http://www.nmh.org"></td>

            <td>Telephone Number<sup>*</sup><br>
            <input type="text" required="yes" class="txtBox" style="width:250px;" name="telephone" placeholder="eg. (312) 926-2000"></td>
        </tr>
        
        <tr>
            <td>Main Keyword<sup>*</sup><br>
            <input type="text" required="yes"  style="width:250px;" name="main_keyword" placeholder="eg. Hospital">
              <br>
            <small>Keywords goes without Locations.</small></td>

            <td>Zip Code<br>
                <input type="text"  style="width:250px;" name="zipcode" required="yes" placeholder="eg. 60611" maxlength="5"></td>

        </tr>
          
        <tr>
            <td style="padding-top:10px;" colspan="2"><h3>More Information About You</h3></td>
        </tr>
          
        <tr>
            <td>Full Name<sup>*</sup><br>
            <input type="text" required="yes" style="width:250px;" name="fullname" placeholder="eg. Nortwestern Memorial Hosp"></td>
            
            <td>Email Address<sup>*</sup><br>
            <input type="email" required="yes" class="txtBox" style="width:250px;" name="resemail" placeholder="eg. northwestern@mail.com">
            </td>

        </tr>
          
        <tr>
            <td></td>
            <td><input type="text" disabled="disabled" id="captcha" value="<?php echo random_captcha(); ?>" style="font-size: 30px; letter-spacing: 6px; height: 40px; width: 150px;" /></td>
        </tr>
        
        <tr>

            <td>You are a<sup>*</sup>...<br>
              <select style="width:250px;" name="account_type">
                <option vlaue="client">Business Owner</option>
                <option value="reseller">Reseller</option>
              </select>
            </td>
              
            <td>
		Enter the above code (It's case sensitive):<br> <input type="text" name="security_code" id="security_code">
                <span style="color:red;" id="captcha_error"></span>
            </td>

          </tr>
        
        <tr>
            <td align="center" colspan="2"><input class="btn btn-primary" type="submit" value="Generate Report"></td>
        </tr>
        
        
    </table>
    
</form>