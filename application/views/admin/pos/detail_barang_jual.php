					<?php 
						error_reporting(0);
						$b=$brg->row_array();
					?>
					
					</table>
					

			<div class="table-responsive p-0 mb-5">
                <table class="table align-items-center justify-content-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Barcode</th> 
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Product item</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Unit</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Stock</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Price</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Discount</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Qty</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
	                    <td><input type="text" name="nabar" value="<?php echo $b['barang_id'];?>" style="margin-right:5px;" class="form-control input-sm" readonly></td>
	                    <td><input type="text" name="nabar" value="<?php echo $b['barang_nama'];?>" style="margin-right:5px;" class="form-control input-sm" readonly></td>
	                    <td><input type="text" name="satuan" value="<?php echo $b['barang_satuan'];?>" style="margin-right:5px;" class="form-control input-sm" readonly></td>
	                    <td><input type="text" name="stok" value="<?php echo $b['barang_stok'];?>" style="margin-right:5px;" class="form-control input-sm" readonly></td>
	                    <td><input type="text" name="harjul" value="<?php echo number_format($b['barang_harjul']);?>" style="margin-right:5px;text-align:right;" class="form-control input-sm"></td>
	                    <td><input type="number" name="diskon" id="diskon" value="0" min="0" class="form-control input-sm" style="margin-right:5px;" required></td>
	                    <td><input type="number" name="qty" id="qty" value="1" min="1" max="<?php echo $b['barang_stok'];?>" class="form-control input-sm" style="margin-right:5px;" required></td>
	                    <td><button type="submit" id="additem" class="btn btn-sm btn-primary">Ok</button></td>
					</tr>
                  </tbody>
                </table>
              </div>