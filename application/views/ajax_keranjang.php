<?php
                    foreach ($temp as $row) {
						
						$que=$this->m_data->tampil_buku($row['idbuku']);
						foreach ($que as $buk) {
							
							
					?> 
						<tr>
							<td class="cart_product">
                            
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
								<div class="cart_quantity_button">
									<a class="cart_quantity_up"  onClick="tambah('<?php echo $row['idbuku']; ?>')"> + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="<?php echo $row['jumlah']; ?>" autocomplete="off" size="2" disabled >
									
                                    <a class="cart_quantity_down" onClick="kurang('<?php echo $row['idbuku']; ?>')"> - </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"><?php echo $row['totharga']; ?></p>
							</td>
							<td class="cart_delete">
                            
								<a href="<?php echo base_url().'home/hapus_cart/'.$row['idbuku']; ?>" class="btn cart_quantity_delete"><i class="fa fa-times"></i></a>
							</td>
						</tr>
					<?php
						}
                    }
                    ?>