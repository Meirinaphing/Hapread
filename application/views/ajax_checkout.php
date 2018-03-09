<?php $gtotal=0; ?>            
                    <?php
                    foreach ($temp as $row) {
						
						$que=$this->m_data->tampil_buku($row['idbuku']);
						foreach ($que as $buk) {
							
							
					?> 
						<tr>
							<td style="width: 120pt;" class="cart_product">
                            
								<a href=""><img width="120pt" src="<?php echo base_url().'assets/buku/'.$buk["gambar"]; ?>" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo $buk["judul"]; ?></a></h4>
								<p>Product ID: <?php echo $buk["idbuku"]; ?></p>
							</td>
							<td class="cart_price">
								<p><?php echo $row['harga']; ?></p>
							</td>
							<td class="cart_quantity">
								<div class="btn-group">
                                	<a class="btn btn-success" onClick="kurang('<?php echo $row['idbuku']; ?>')"> - </a>
									<input class="btn" type="text" name="quantity" value="<?php echo $row['jumlah']; ?>" autocomplete="off" size="2" disabled >
									<a class="btn btn-success"  onClick="tambah('<?php echo $row['idbuku']; ?>')"> + </a>
                                    
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"><?php echo $row['totharga']; ?></p>
							</td>
							<td class="cart_delete">
                            
								
							</td>
						</tr>
                        
					<?php
					$gtotal+=$row['totharga'];
						}
                    }
                    ?>
                    <tr>
						<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Cart Sub Total</td>
										<td>Rp.<?php echo $gtotal ?></td>
									</tr>
                                    <?php
									$email=$this->session->userdata('email');
                                    $acc=$this->m_data->get_account($email);
										foreach ($acc as $account) {
										$pro=$account['provinsi'];
									}
									if($pro=='Jakarta'){$sp=10000;}else{$sp=30000;}
									$t_akhir=$sp+$gtotal;
									?>
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td>Rp.<?php echo $sp ?></td>										
									</tr>
									<tr>
										<td>Total</td>
										<td><span>Rp.<?php echo $t_akhir; ?></span></td>
									</tr>
                                    
                        
                                    <tr>
										<td></td>
										<td>
                                        <?php if($gtotal>0){ ?>
                                        	<button class="btn btn-success" onclick="proses()">Proses</button>
                                        <?php } ?></td>
                                    </tr>
								</table>
                                
							</td>
						</tr>
                    