<?php 
$lan=$_GET['language'];
if($lan=="" || $lan=="en"){
include("config_en.php"); 
include("../language/english/survey.php");
$lang=1;
}else{
include("config_ch.php");
include("../language/chinese/survey.php");
$lang=3;
}
include("config.php");
session_start();
if(!session_is_registered("username")){
		echo "<meta http-equiv='Refresh' content='0;url=login.php'>";
}else{	

	include("db.php");
	global $dbServer, $dbUser, $dbPass, $dbName;
        $cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);

$ids=$_GET['id'];
$survey=@mysql_query("select * from  survey where ids='$ids'");
$view=mysql_fetch_array($survey);





?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo TITLES; ?></title>
<link  rel="stylesheet" href="stylesheet.css" type="text/css" />
<style type="text/css">
<!--
.style1 {
	font-size: 14px;
	color: #ffffff;
	font-weight: bold;
}
a {
	font-size: 14px;
	color: #006600;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #006600;
}
a:hover {
	text-decoration: none;
	color: #00CC00;
}
a:active {
	text-decoration: none;
	color: #006600;
}
.style3 {color: #006600}
-->
</style>
</head>

<body>
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0" class="images">
  <!--DWLayoutTable-->
  <tr>
    <td width="500" height="8"></td>
    <td width="298"></td>
  </tr>
  <tr>
    <td height="80" valign="middle" ><a href="index.php"><img src="images/Top.png" width="500" height="80" /></a></td>
  <td align="right" valign="top">
  <a href="view_survey.php?language=en&id=<?php echo $ids; ?>">
  English</a> | <a href="view_survey.php?language=3&id=<?php echo $ids; ?>" >Chinese </a></td>
  </tr>
  <tr>
    <td height="23">&nbsp;</td>
    <td></td>
  </tr>
  
  <tr>
    <td height="1689" colspan="2" valign="top"><table   width="100%" class="text" border="1">
                <!--DWLayoutTable-->
             <tr>
                  <td  height="18" colspan="2" align="center" valign="top" class="ERROR" ><!--DWLayoutEmptyCell-->&nbsp;</td>
                  </tr>
                  <tr >
                    <td width="97"  height="26" align="right" class="text_small" ><?PHP echo NAME;?>
                    <td width="597"  height="26" align="left" class="text_small" ><?php echo $view['name']; ?>
                       <?php echo SEX;?>
                        <?php echo $view['sex']; ?></td>
      </tr>
                  <tr >
                    <td  height="25" align="right" class="text_small" ><?php echo DATE_OF_BIRTH;?></td>
        <td align="left"  height="25" ><?php echo $view['birth']; ?>      </td>
      </tr>
                  <tr >
                    <td  height="25" align="right" class="text_small" ><?php echo ADDRESS;?></td>
        <td  height="25" align="left" class="text_small" ><?php echo ZIP;?><?php echo $view['zip']; ?>  
          <?php echo ADDRESS;?><?php echo $view['address']; ?>             </td>
      </tr>
                  <tr >
                    <td  height="26" align="right" class="text_small" ><?php echo TELEPHONE;?></td>
        <td  height="26" align="left" class="text_small" ><?php echo TELEPHONE;?><?php echo $view['tel']; ?>  
          <?php echo MOBILE;?><?php echo $view['mobile']; ?>  
          <br>         </td>
      </tr>
                  <tr>
                    <td  height="25" align="right" class="text_small" ><?php echo CONTACT_TIME;?></td>
        <td  height="25" align="left" class="text_small" >
          <?php echo $view['time1']; ?>   <?php echo TO;?><?php echo $view['time2']; ?>  <?php echo BEST_CONTACT_TIME;?>
          <?php echo $view['best_time']; ?>  
          <?php echo SAMPLE_TIME; ?><br>
          
        <?PHP echo TIME_MESSAGE;?></td>
      <tr >
        <td  height="25" align="right" class="text_small" ><?PHP echo EMAIL; ?></td>
        <td  height="25" align="left" class="text_small" ><?php echo $view['email']; ?>  
          <?php echo AMMEDIATELY_COMMUNICATION;?><?php echo $view['dail']; ?>             </tr>
                  <tr >
                    <td  height="25" align="right" class="text_small" >M S N</td>
        <td  height="25" align="left" class="text_small" ><?php echo $view['msn']; ?>  Skype：<?php echo $view['skype']; ?>  </td>
      </tr>
                  <tr >
                    <td  height="23" align="right" class="text_small" ><?php echo PRESENT_JOB;?></td>
        <td  height="23" align="left" class="text_small" >
          <?php echo $view['current_job']; ?></td>
      </tr>
                  <tr >
                    <td  height="25" align="right" class="text_small" ><?php echo TIMES_SHIFT;?></td>
        <td  height="25" align="left" class="text_small" ><?php echo $view['shift']; ?></td>
      </tr>
                  <tr >
                    <td  height="25" align="right" class="text_small" >
                      ＊<?php echo HEIGHT;?></td>
        <td  height="25" align="left" class="text_small" >
          <?php echo $view['height']; ?><?php echo CEMTAMETER;?>&nbsp;<?php echo WEIGHT;?>
            <?php echo $view['weight']; ?><?php echo KILOGRAM;?></td>
      </tr>
                  <tr >
                    <td colspan="2" align="left"  height="21" > </td>
      </tr>
                  <tr >
                    <td  height="25" colspan="2" align="left" class="text_small" >
					<?php echo WHAT_TIME_DO_YOU_GET_UP_AT_THE_MORNING;?><?php echo $view['get_up']; ?>					 </td>
      </tr>
                  <tr >
                    <td  height="25" colspan="2" align="left" class="text_small" ><?PHP echo WHAT_TIME_DO_YOU_GO_TO_BED;?><?php echo $view['night_sleep']; ?>                   </td>
      </tr>
                  <tr >
                    <td  height="25" colspan="2" align="left" class="text_small" ><?php echo BREAKFAST;?><?php echo " ";echo $view['breakfast']; ?></td>
      </tr>
                  <tr >
                    <td  height="25" colspan="2" align="left" class="text_small" ><?php echo CONTENT_BREAKFAST;?>
					<?php echo $view['lunch']; ?>                      </td>
      </tr>
                  <tr >
                    <td  height="25" colspan="2" align="left" class="text_small" ><?PHP echo CHINESE_MEAL; echo " ";?></td>
      </tr>
                  <tr >
                    <td  height="25" colspan="2" align="left" class="text_small" >
					<?PHP echo CONTENT_CHINESE_MEAL?><?php echo $view['lunch_eat']; ?>
                      </small></td>
      </tr>
                  <tr >
                    <td  height="25" colspan="2" align="left" class="text_small" >
					<?php echo DINNER; echo " ";?>
					
					
					<?php echo $view['diner']; ?></td>
      </tr>
                  <tr >
                    <td  height="25" colspan="2" align="left" class="text_small" ><?PHP echo CONTENT_DINNER;?>
					<?php echo $view['dinner_eat']; ?>                  </td>
      </tr>
                  <tr >
                    <td  height="25" colspan="2" align="left" class="text_small" ><?php echo CONTENT_SNACK;?>  <?php echo $view['junk']; ?>    </td>
      </tr>
                  <tr >
                    <td  height="25" colspan="2" align="left" class="text_small" ><?PHP echo EAT_LATE;?><?php echo $view['snack']; ?><?php echo $view['snack_eat']; ?>                    </td>
      </tr>
                  <tr >
                    <td  height="25" colspan="2" align="left" class="text_small" ><?PHP echo CUPS_OF_DRINK;?><?php echo $view['drink']; ?>                      </td>
      </tr>
                  <tr >
                    <td  height="25" colspan="2" align="left" class="text_small" ><?PHP echo WATER;?>
                     <?php echo $view['water']; ?>                      </td>
      </tr>
                  <tr>
                    <td  height="21" colspan="2" align="left" class="text_small" ><?php echo STATUS_SLEEP;?><?php echo $view['feel_sleep']; ?>                      </td>
      </tr>
                  <tr>
                    <td  height="21" colspan="2" align="left" class="text_small" ><?php echo CONDITION_STOMACH;?>
                      <?php echo $view['stmoach_feel']; ?></td>
      </tr>
                  <tr>
                    <td  height="21" colspan="2" align="left" class="text_small" ><?php BELOW_ILLNESS;?>
					<?php echo $view['ill']; ?> </td>
      </tr>
                  <tr >
                    <td  height="21" colspan="2" align="left" class="text_small" >
					 <?php echo FREQUENTLY_SLEEP_LATE;?>				
       <?php echo $view['work_late']; ?></td>
      </tr>
                  <tr >
                    <td  height="21" colspan="2" align="left" class="text_small" >
					<?php echo THE_WORK_OR_THE_STUDY_PRESSURE_HIGH;?>
                    <?php echo $view['pressure']; ?> </td>
      </tr>
                  <tr >
                    <td  height="21" colspan="2" align="left" class="text_small" ><?php echo USUALLY_ILL;?>
                     <?php echo $view['offten_ill']; ?></td>
      </tr>
                  <tr >
                    <td  height="21" colspan="2" align="left" class="text_small" >
					<?php echo UEUALLY_HAVE_BOILS;?>
     <?php echo $view['offten_pimple']; ?></td>
      </tr>
                  <tr >
                    <td  height="25" colspan="2" align="left" class="text_small" >
					  <?php echo ALLERGY;?>
       <?php echo $view['food_allergy']; ?>                      </tr>
                  <tr >
                    <td  height="21" colspan="2" align="left" class="text_small" >
					<?php echo OFTEN_DO_SPORT;?>
     <?php echo $view['sporty']; ?></td>
      </tr>
                  <tr >
                    <td  height="21" colspan="2" align="left" class="text_small" ><?php echo OFTENS_EAT_GRESY_FRISE_IN_OIL_FOOD;?>  
	 <?php echo $view['fried']; ?>  </tr>
                  <tr >
                  <td colspan="2" align="left"  height="21" ><hr color="#008000" noshade="noshade" size="1">      </td>
      </tr>
                  <tr >
                  <td height="15" colspan="2" align="left" bgcolor="#ffd9d9" class="text_small" >＊<?php echo THE_MAN_DOES_NOT_FILL_IN_THE_PINK_PARTIAL;?></td>
      </tr>
                  <tr >
                    <td height="21" colspan="2" align="left" bgcolor="#ffd9d9" class="text_small" ><?php echo THE_MENSTURAL_PERIOD_IS_NORMAI;?>
   <?php echo $view['normal_m']; ?></td>
      </tr>
                  <tr >
                  <td height="21" colspan="2" align="left" bgcolor="#ffd9d9" class="text_small" >
				 <?php echo THE_MENSTRUATION_COMES_WHEN_BELLY_PAIN;?>
   <?php echo $view['m_pain']; ?></td>
      </tr>
                  <tr >
                    <td height="21" colspan="2" align="left" bgcolor="#ffd9d9" class="text_small" >
				<?php echo PREGNANT;?>
  
  <?php echo $view['pregant']; ?></td>
      </tr>
                  <tr >
                    <td height="25" colspan="2" align="left" bgcolor="#ffd9d9" class="text_small" ><?php echo HAVE_A_BABY;?>
  
  <?php echo $view['kid']; ?> <?php echo $view['num_kid']; ?></td>
      </tr>
                  <tr >
                    <td colspan="2" align="left"  height="21" ><hr color="#008000" noshade="noshade" size="1">      </td>
      </tr>
                  <tr >
                    <td height="14" colspan="2" align="left" bgcolor="#e1f0ff" class="text_small" >
	＊<?php echo IF_YOU_ARE_NOT_AIM_AT_THE_SKIN_TO_INPROVE_THE_PALE_BLUE_REGION_MAY_NOT_FILL_IN;?>    </tr>
                  <tr >
                  <td height="21" colspan="2" align="left" bgcolor="#e1f0ff" class="text_small" >
				<?php echo THE_SKIN_NATURE_BELIONGS;?>
  
  <?php echo $view['face_belong']; ?> </td>
      </tr>
                  <tr >
                    <td height="21" colspan="2" align="left" bgcolor="#e1f0ff" class="text_small" >
			    <?php echo THE_FACE_CAN_BE_VERY_EASY_THE_OIL;?>
 <?php echo $view['face_oil']; ?></td>
      </tr>
                  <tr >
                    <td height="21" colspan="2" align="left" bgcolor="#e1f0ff" class="text_small" >
			    <?PHP echo UEUALLY_HAVE_BOILS_IN_FACE;?>
  
  <?php echo $view['face_pimple']; ?> </td>
      </tr>
                <tr >
     <td height="21" colspan="2" align="left" bgcolor="#e1f0ff" class="text_small" >
	            <?php echo PIMPLE_TOO_MANY;?>
  <?php echo $view['face_scale']; ?></td>
      </tr>
                  <tr >
                    <td height="21" colspan="2" align="left" bgcolor="#e1f0ff" class="text_small" >
				<?php echo SOCKET;?>
  <?php echo $view['b_eye']; ?></td>
      </tr>
                  <tr >
                    <td height="21" colspan="2" align="left" bgcolor="#e1f0ff" class="text_small" >
			   <?php echo THE_SKIN_HAS_ALLERGRY;?>
 <?php echo $view['skin_allergy']; ?></td>
      </tr>
                  <tr >
                    <td height="21" colspan="2" align="left" bgcolor="#e1f0ff" class="text_small" >
			   <?php echo SENISTIVS_SKIN;?>
<?php echo $view['sensetive_skin']; ?></td>
      </tr>
                <tr >
                <td colspan="2" align="left"  height="21" ><hr color="#008000" noshade="noshade" size="1">      </td>
      </tr>
                <tr>
                <td  height="21" colspan="2" align="left" class="text_small" >
                <?php echo HAS_USE_THE_HUO_BAO_FU_PRODUCT;?>
                      
<?php echo $view['use_herbal']; ?></td>
      </tr>
                  <tr>
                    <td colspan="2" align="left"  height="21" ><hr color="#008000" noshade="noshade" size="1">      </td>
      </tr>
                  <tr >
                    <td  height="21" colspan="2" align="left" class="text_small" ><?php echo THINKS_ONESELF;?>
 <?php echo $view['self']; ?></td>
      </tr>
                  <tr >
                   <td  height="25" colspan="2" align="left" class="text_small" >
			   <?php echo HOPE;?>
 <?php echo $view['hope']; ?></td>
      </tr> 
                  <td  height="94" colspan="2" align="left" class="text_small"  >
			   <?php echo HOPE_CHANGE_BODY;?> <br />
			  
 <?php echo $view['chang']; ?>                      </td>
      </tr>
                  <tr >
                    <td  height="52" colspan="2" align="left" class="text_small" >
				<?php echo BUDGET;?>
<?php echo $view['budget']; ?></td>
      </tr>
                  <tr >
                    <td colspan="2" align="left"  height="21" ><hr color="#008000" noshade="noshade" size="1">      </td>
      </tr>
                  <tr >
                    <td  height="100" align="left" class="text_small"><?php echo OTHER_NOTES;?>：</td>
        <td  height="100" align="left" class="text_small"><?php echo $view['notes']; ?>         </td>
      </tr>
                  <tr></tbody>
                    <td>&nbsp;</td>
    </table></td>
  </tr>
</table>
</body>
</html>
<?php }?>