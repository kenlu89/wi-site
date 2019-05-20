<br>

<table width="800" border="0" align="center" cellpadding="0" cellspacing="0" class="images">
  <!--DWLayoutTable-->
  <tr>
    <td width="800" height="455" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="text" >
            <!--DWLayoutTable-->
            <form action="new_cate_pro.php" enctype="multipart/form-data"  method="post">
              <input type="hidden"  name="cate_id" value="<?php echo $_GET['id']; ?>" />
              <input type="hidden" name="chk" value="1">
              <tr>
                <td height="20" colspan="8" align="center" valign="middle" class="bar"><?PHP echo NEW_CATEGORY;?></td>
              </tr>
              <tr>
                <td width="15" height="4"></td>
                <td width="16"></td>
                <td width="188"></td>
                <td width="156"></td>
                <td width="48"></td>
                <td width="224"></td>
                <td width="146"></td>
                <td width="7"></td>
              </tr>
              <tr>
                <td height="24"></td>
                <td colspan="7" align="center" valign="middle" class="text"><?PHP echo CATEGORY_MSG;?></td>
              </tr>
              <tr>
                <td height="16"></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              
              <tr>
                <td height="24">&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="3" valign="middle" class="Heading"><?php echo NEW_CATEGORY;?></td>
                <td colspan="3" valign="middle" class="Heading"><?php echo NEW_CATE_CH;?></td>
              </tr>
              
              
              <tr>
                <td height="24">&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="3" valign="middle"><input name="cate" type="text" class="text" size="45" /></td>
                <td colspan="3" valign="middle"><input type="text" class="text"  name="cate_ch" size="45"></td>
              </tr>
              <tr>
                <td height="19"></td>
                <td></td>
                <td colspan="4" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td height="24">&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="4" valign="middle" class="Heading"><?php echo IMAGE;?> </td>
                <td>&nbsp;</td>
                <td></td>
              </tr>
              <tr>
                <td height="24">&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="2" valign="middle"><input  type="file" name="file" class="text" /></td>
                <td colspan="3" valign="middle" class="text"><input type="radio" name="cate_type" value="1"  checked="checked"/><?php echo ACTIVE;?> &nbsp; <input type="radio" name="cate_type" value="2" /><?php echo INACTIVE;?></td>
                <td></td>
              </tr>
              <tr>
                <td height="19"></td>
                <td></td>
                <td colspan="4" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td height="24">&nbsp;</td>
                <td>&nbsp;</td>
                <td valign="middle" class="Heading"><?PHP echo SORT_ORDER;?> </td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td></td>
              </tr>
              <tr>
                <td height="24"></td>
                <td></td>
                <td colspan="4" valign="middle"><input type="text" name="sorts" class="text"  size="10" /></td>
              <td></td>
              <td></td>
              </tr>
              <tr>
                <td height="12"></td>
                <td></td>
                <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              </tr>
              
              <tr>
                <td height="30">&nbsp;</td>
                <td>&nbsp;</td>
                <td valign="top"><input type="submit" value="<?php echo SUBMIT;?>" /></td>
                <td colspan="3" valign="top"><input type="reset" value="<?php echo RESET;?>" /></td>
                <td>&nbsp;</td>
                <td></td>
              </tr>
              <tr>
                <td height="173">&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td></td>
              </tr>
        </form>
            
          
    </table></td>
  </tr>
</table>
</body>
</html>
