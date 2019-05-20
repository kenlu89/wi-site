<?php 
		$i=1;
	while($orders_row=mysql_fetch_array($orders)){
?>
          
          <table width="100%" border="0" cellpadding="0" cellspacing="0"  <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>>
            <!--DWLayoutTable-->
            <tr>
              <td width="20" height="24">&nbsp;</td>
                  <td width="115" align="left" valign="middle" class="style5"><?php echo $orders_row['products_model']; ?></td>
                <td width="389" align="center" valign="middle" class="style5"><?php echo $orders_row['products_name']; ?></td>
                  <td width="68" align="center" valign="middle" class="text">$ <?php echo number_format($orders_row['products_price'], 2);?></td>
                  <td width="52" align="center" valign="middle" class="style5">
                  <?php echo $orders_row['products_quantity'];
		?></td>
                <td width="117" align="center" valign="middle" class="style5">$<?php echo number_format($orders_row['products_quantity']*$orders_row['products_price'], 2); ?></td>
                </tr>
          </table>          <?php $i++;}?>