<?php
function load_css(){
    echo'
    <link href="css/960.css" rel="stylesheet" type="text/css">
    <link href="css/common.css" rel="stylesheet" type="text/css">
    <link href="css/ui-lightness/jquery-ui-1.8.18.custom.css" rel="stylesheet" type="text/css">
    ';
}
function load_scripts($ENV){
        if($ENV=='DEVELOPMENT'){
        echo'
          <script type="text/javascript" src="js/lib/jquery-1.7.1.js"></script>
          <script type="text/javascript" src="js/lib/jquery-ui-1.8.18.custom.min.js"></script>
          '; 
        }
        else if($ENV=='PRODUCTION'){
          echo'
            <script type="text/javascript" src="js/lib/jquery-1.7.1.min.js"></script>
            <script type="text/javascript" src="js/lib/jquery-ui-1.8.18.custom.min.js"></script>
            ';   
        }
    
    
}
function load_header(){
    ?>
    <header class="grid_16">
            <div class="headerbar">
                <div class="banner"></div>
                <div class="mainmenu">
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="about-us.html">About Us</a></li>
                        <li><a href="hospitals.html">Hospitals</a></li>
                        <li><a href="doctors.html">Doctors</a></li>
                        <li><a href="contact-us.html">Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <div>
              <table>
                   <tr>
                    <td width="80px"><span style="font-weight: bold;">Share Us - </span></td>    
                    <td width="50px"><a class='facebook' href='http://www.facebook.com/share.php?u=www.hospitalsindia.net&title=Hospital India - Doctors, Phone Number, Hospital Ratings & List, Appointments' target='_blank'><img src="images/facebook.png" title="Share On Facebook" /></a></td>
                    <td width="50px"><a class='twitter' href='https://twitter.com/intent/tweet?hashtags=HospitalsIndia.net&source=tweetbutton&text=Hospitals%20India%20-%20Doctors,%20Phone%20Number,%20Hospital%20Ratings%20&%20List,%20Appointments.&url=www.hospitalsindia.net&via=HospitalsIndia.Net' target='_blank'><img src="images/twitter.png" title="Share On Twitter" /></a></td>
                    </tr>
                 </table>
                  <table>
                   <tr>
                    <td width="80px"><span style="font-weight: bold;">Like Us - </span></td>    
                    <td width="100px">
                       <iframe allowtransparency="true" frameborder="0" hspace="0" id="I1_1332188889389" marginheight="0" marginwidth="0" name="I1_1332188889389" scrolling="no" src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.hospitalsindia.net&amp;layout=button_count&amp;show_faces=false&amp;width=85&amp;action=like&amp;font=verdana&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" style="width: 90px; margin: 0px; border-style: none;height: 20px;  visibility: visible; " allowTransparency="true"></iframe>
                    </td>
                    <td width="100px">
                    <iframe allowtransparency="true" frameborder="0" hspace="0" id="I1_1332188889389" marginheight="0" marginwidth="0" name="I1_1332188889389" scrolling="no" src="https://plusone.google.com/_/+1/fastbutton?url=http%3A%2F%2Fwww.hospitalsindia.net&amp;size=medium&amp;count=true&amp;hl=en-US&amp;jsh=m%3B%2F_%2Fapps-static%2F_%2Fjs%2Fgapi%2F__features__%2Frt%3Dj%2Fver%3D5LDYIFIy5nU.en.%2Fsv%3D1%2Fam%3D!brN6X75-Zu-IDRYPeA%2Fd%3D1#id=I1_1332188889389&amp;parent=http%3A%2F%2Fwww.ideophone.in&amp;rpctoken=153519974&amp;_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart" style="width: 90px; margin: 0px; border-style: none;height: 20px;  visibility: visible; "  title="+1"></iframe>
                       </td>
                    </tr>
                 </table>
                 </div>
        </header>
        <?php
}
function load_footer(){
    ?>
    <footer class="grid_16">
            <div class="footerbar">
                <div align="center" style="padding: 20px;font-weight: bold;">www.hospitalsindia.net | 2012 </div>
            </div>
        </footer>
    <?php
    load_analytics();
}
function load_analytics(){
    echo'
    <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(["_setAccount", "UA-11990376-13"]);
  _gaq.push(["_trackPageview"]);

  (function() {
    var ga = document.createElement("script"); ga.type = "text/javascript"; ga.async = true;
    ga.src = ("https:" == document.location.protocol ? "https://ssl" : "http://www") + ".google-analytics.com/ga.js";
    var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
    ';
}
function get_cityname($id){
    include("config/dbinfo.php");
    $result=mysql_query("select * from $tbl_city where id='$id'");
    $city=mysql_fetch_array($result);
    return $city['name']; 
}
function get_statename($id){
    include("config/dbinfo.php");
    $result=mysql_query("select * from $tbl_states where id='$id'");
    $state=mysql_fetch_array($result);
    return $state['name'];
}
function display_hospitals(){
    include("config/dbinfo.php");
    $result=mysql_query("select * from $tbl_hospitals order by created_at");
    if(mysql_num_rows($result)==0){
        echo 'No Record Found';
    }
    while($hospital=mysql_fetch_array($result))
    {  $hospitalname=str_replace(' ','_', $hospital['name']);
        $hoscity=get_cityname($hospital['city_id']);
       $city=  str_replace(' ','_', $hoscity);
     ?>
        <div ><a href="hospital-<?php echo $hospital['id']; ?>-<?php echo $hospitalname; ?>-<?php echo $city; ?>.html" title="" ><?php echo $hospital['name']; ?></a></div>
        <div ><span><?php echo get_cityname($hospital['city_id']); ?></span>,&nbsp;<span><?php echo get_statename($hospital['state_id']); ?></span></div>
     
        <?php
    }
    
}
function hospitals_by_state($id,$state){
    include("config/dbinfo.php");
    $result=mysql_query("select * from $tbl_hospitals where state_id='$id' order by created_at");
    if(mysql_num_rows($result)==0){
        echo 'No Record Found';
    }
    while($hospital=mysql_fetch_array($result))
    {  $hospitalname=str_replace(' ','_', $hospital['name']);
        $hoscity=get_cityname($hospital['city_id']);
       $city=  str_replace(' ','_', $hoscity);
     ?>
        <div ><a href="hospital-<?php echo $hospital['id']; ?>-<?php echo $hospitalname; ?>-<?php echo $city; ?>.html" title="" ><?php echo $hospital['name']; ?></a></div>
        <div ><span><?php echo get_cityname($hospital['city_id']); ?></span>,&nbsp;<span><?php echo get_statename($hospital['state_id']); ?></span></div>
     
        <?php
    }
    
}
function hospitals_by_city($id,$city){
    include("config/dbinfo.php");
    $result=mysql_query("select * from $tbl_hospitals where city_id='$id' order by created_at");
    if(mysql_num_rows($result)==0){
        echo 'No Record Found';
    }
    while($hospital=mysql_fetch_array($result))
    {  $hospitalname=str_replace(' ','_', $hospital['name']);
        $hoscity=get_cityname($hospital['city_id']);
       $city=  str_replace(' ','_', $hoscity);
     ?>
        <div ><a href="hospital-<?php echo $hospital['id']; ?>-<?php echo $hospitalname; ?>-<?php echo $city; ?>.html" title="" ><?php echo $hospital['name']; ?></a></div>
        <div ><span><?php echo get_cityname($hospital['city_id']); ?></span>,&nbsp;<span><?php echo get_statename($hospital['state_id']); ?></span></div>
     
        <?php
    }
    
}
function get_hospitalname($id){
    include("config/dbinfo.php");
    $result=mysql_query("select * from $tbl_hospitals where id='$id' ") or die(mysql_error());
    $row=mysql_fetch_array($result);
    $name=$row['name'];
    return  $name;
}
function show_hospital($id){
    include("config/dbinfo.php");
    $result=mysql_query("select * from $tbl_hospitals where id='$id' ") or die(mysql_error());
    $row=mysql_fetch_array($result);
    echo  "<table border=2 cellspacing=1 cellpadding=2>";
echo '<tr>'  .'<td>Name</td>' .'<td>'. $row['name'] .'</td>' .'</tr>';
        $state=$row['state_id'];         
        $res = mysql_query("SELECT * FROM $tbl_states where id='$state'");
        
        $sname=mysql_fetch_array($res);  
echo '<tr>' .'<td>State</td>' .'<td>'. $sname['name'] .'</td>' .'</tr>';
        
        $city=$row['city_id'];       
        $resc = mysql_query("SELECT * FROM $tbl_city where id='$city'");
        
        $cname=mysql_fetch_array($resc);  
echo '<tr>'  .'<td>City</td>' .'<td>'. $cname['name'] .'</td>' .'</tr>';


echo '<tr>'.'<td>Departments</td>';

       $deptt=mysql_query("select * from $tbl_hosdepart where hospital_id='$row[0]' ");
        echo '<td>';
        
        while($dep=mysql_fetch_array($deptt))
        
         {
                $departid= $dep['depart_id'];
                $resultd = mysql_query("SELECT * FROM $tbl_departments where id='$departid'");
                $depart=mysql_fetch_array($resultd)        
                or die(mysql_error());  
                echo $depart['name'] ."<br/>";
            
         }
                
         echo '</td>';

   echo '</tr>';
echo '<tr>'  .'<td>Address</td>' .'<td>'. $row['address'] .'</td>' .'</tr>';
echo '<tr>'  .'<td>Email</td>' .'<td>'. $row['email'] .'</td>' .'</tr>';
echo '<tr>' .'<td>Phone</td>' .'<td>'.$row['phone'] .', '.$row['phone1'].'</td>' .'</tr>';
echo '<tr>' .'<td>Fax</td>' .'<td>'.$row['fax'] .'</td>' .'</tr>';
echo "</table>";
    
}
function states_list(){
    include("config/dbinfo.php");   
    $result=mysql_query("select * from $tbl_states");
    echo'<div class="box"><ul>';
    while($state=mysql_fetch_array($result)){
        $sname=str_replace(' ', '_', $state['name']);
        echo'<a href="hospitals-in-'.$state['id'].'-'.$sname.'-state.html"><li>Hospitals in '.$state['name'].'</li></a>';
    }
    echo'</ul></div>';
}
function city_list(){
    include("config/dbinfo.php");   
    $result=mysql_query("select * from $tbl_city");
    echo'<div class="box"><ul>';
    while($city=mysql_fetch_array($result)){
        $sname=str_replace(' ', '_', $city['name']);
        echo'<a href="hospitals-in-'.$city['id'].'-'.$sname.'-city.html"><li>Hospitals in '.$city['name'].'</li></a>';
    }
    echo'</ul></div>';
}
function get_totalstates(){
    include("config/dbinfo.php");   
    $result=mysql_query("select * from $tbl_states");
    $total_states=mysql_num_rows($result);
    return $total_states;
}
function is_state($id,$name){
    return TRUE;
}
function is_city($id,$name){
    return TRUE;
}
function get_totalcity(){
    include("config/dbinfo.php");   
    $result=mysql_query("select * from $tbl_city");
    $total_city=mysql_num_rows($result);
    return $total_city;
    
}
function get_totaldepartments(){
    include("config/dbinfo.php");   
    $result=mysql_query("select * from $tbl_department");
    $total_department=mysql_num_rows($result);
    return $total_department;
    
}
function get_totalhospitals(){
    include("config/dbinfo.php");   
    $result=mysql_query("select * from $tbl_hospitals");
    $total_hospitals=mysql_num_rows($result);
    return $total_hospitals;
    
}
function show_states(){
     include("config/dbinfo.php");
       $result = mysql_query("SELECT * FROM $tbl_states order by created_at") 
                or die(mysql_error());  
        echo "<table border='1' cellpadding='5' cellspacing='0'>";
        echo "<tr> <th>ID</th> <th>State</th> <th></th> <th></th> </tr>";

        $count=0;
        while($row = mysql_fetch_array( $result )) 
        {
         $count=$count+1;
                echo "<tr>";
                echo '<td>' . $count . '</td>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td><a href="edit.php?id=' . $row['id'] . '"><input type=button value=Edit></a></td>';
                echo '<td><a href="delete.php?id=' . $row['id'] . '"><input type=button value=Delete></a></td>';
                echo "</tr>"; 
        } 
        
        echo "</table>";
    
}
function show_city(){
    include("config/dbinfo.php");
        $result = mysql_query("SELECT * FROM $tbl_city order by created_at") 
                or die(mysql_error());  
                
        
        echo "<table border='1' cellpadding='5' cellspacing='0'>";
        echo "<tr> <th>ID</th> <th>State</th> <th>City</th> <th></th> <th></th> </tr>";

        $count=0;
        while($row = mysql_fetch_array( $result )) 
        {
         $count=$count+1;
                echo "<tr>";
                echo '<td>' . $count . '</td>';
                
                $stateid=$row['state_id'];
                $resultstate=mysql_query("Select * from $tbl_states where id='$stateid'");
                $state=mysql_fetch_array($resultstate)
                or die(mysql_error());              
                echo '<td>' . $state['name'] . '</td>';
                
                echo '<td>' . $row['name'] . '</td>';
                
                echo '<td><a href="edit.php?id=' . $row['id'] . '"><input type=button value=Edit></a></td>';
                echo '<td><a href="delete.php?id=' . $row['id'] . '"><input type=button value=Delete></a></td>';
                echo "</tr>"; 
        } 
        
        
        echo "</table>";
}
function show_departments(){
     include("config/dbinfo.php");
        $result = mysql_query("SELECT * FROM $tbl_departments order by created_at") 
                or die(mysql_error());  
                
        
        echo "<table border='1' cellpadding='5' cellspacing='0'>";
        echo "<tr> <th>ID</th> <th>Department</th> <th></th> <th></th> </tr>";

        $count=0;
        while($row = mysql_fetch_array( $result )) 
        {
         $count=$count+1;
                echo "<tr>";
                echo '<td>' . $count . '</td>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td><a href="edit.php?id=' . $row['id'] . '"><input type=button value=Edit></a></td>';
                echo '<td><a href="delete.php?id=' . $row['id'] . '"><input type=button value=Delete></a></td>';
                echo "</tr>"; 
        } 
        
        echo "</table>";
}
?>