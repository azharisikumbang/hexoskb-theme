<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800">Detail Transaksi</h1>
   <div class="d-none d-sm-inline-block">
       <?php if (strtoupper($data['status']->transaction_status) == 'PENDING'): ?>
           <a href="<?= base_url(). 'account/seller/transaction/cancel/' . $data['status']->transaction_id ?>" class="btn btn-sm btn-danger shadow-sm"><i class="fas fa-close fa-sm text-white-50"></i> Batalkan Transaksi</a>
        <?php endif; ?>
       <a href="#" class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
   </div>
</div>

         <!-- Content Row -->
         <div class="row">

           <!-- Earnings (Monthly) Card Example -->
           <div class="col-xl-3 col-md-6 mb-4">
             <div class="card border-left-primary shadow h-100 py-2">
               <div class="card-body">
                 <div class="row no-gutters align-items-center">
                   <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Invoice ID</div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $data['status']->order_id ?></div>
                   </div>
                   <div class="col-auto">
                     <i class="fas fa-hashtag fa-2x text-gray-300"></i>
                   </div>
                 </div>
               </div>
             </div>
           </div>

           <!-- Earnings (Monthly) Card Example -->
           <div class="col-xl-3 col-md-6 mb-4">
             <div class="card border-left-success shadow h-100 py-2">
               <div class="card-body">
                 <div class="row no-gutters align-items-center">
                   <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Amout</div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?= number_format($data['status']->gross_amount, 2, ",", ".") ?></div>
                   </div>
                   <div class="col-auto">
                     <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                   </div>
                 </div>
               </div>
             </div>
           </div>

           <!-- Earnings (Monthly) Card Example -->
           <div class="col-xl-3 col-md-6 mb-4">
             <div class="card border-left-info shadow h-100 py-2">
               <div class="card-body">
                 <div class="row no-gutters align-items-center">
                   <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Metode Pambayaran</div>
                      <div class="mb-0 font-weight-bold text-gray-800"><?= strtoupper(str_replace("_", " ", $data['status']->payment_type)) ?></div>
                   </div>
                   <div class="col-auto">
                     <i class="fas fa-money-check-alt fa-2x text-gray-300"></i>
                   </div>
                 </div>
               </div>
             </div>
           </div>

           <!-- Pending Requests Card Example -->
           <div class="col-xl-3 col-md-6 mb-4">
             <div class="card bg-<?= $this->template->get_class($data['status']->transaction_status); ?> shadow h-100 py-2">
               <div class="card-body">
                 <div class="row no-gutters align-items-center">
                   <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-white text-uppercase mb-1">Status</div>
                     <div class="h5 mb-0 font-weight-bold text-white"><?= strtoupper($data['status']->transaction_status) ?></div>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>

         <!-- Content Row -->

         <div class="row">

           <!-- Area Chart -->
           <div class="col-xl-6 col-lg-6 col-sm-12">
             <div class="card shadow mb-4">
               <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                 <h6 class="m-0 font-weight-bold text-primary">Detail Transaksi</h6>
               </div>
               <div class="card-body">
                   <table class="table table-borderless table-sm">
                       <tr>
                           <td>Invoice</td>
                           <td>: <?= $data['status']->order_id ?> </td>
                       </tr>
                       <tr>
                           <td>Pembayaran</td>
                           <td>: <?= strtoupper($this->template->get_payment_type($data['status'])); ?> </td>
                       </tr>
                       <tr>
                           <td>Total</td>
                           <td>: <?= number_format($data['status']->gross_amount, 2, ",", ".") ?></td>
                       </tr>
                       <tr>
                           <td>ID Transaksi</td>
                           <td>: <?= $data['status']->transaction_id ?></td>
                       </tr>
                       <tr>
                           <td>Tanggal</td>
                           <td>: <?= date("d/m/Y H:i:s", strtotime($data['status']->transaction_time)) ?> WIB</td>
                       </tr>
                       <tr>
                           <td>Expired</td>
                           <td>: <?= date("d/m/Y H:i:s", strtotime("+1 days" . $data['status']->transaction_time)) ?> WIB</td>
                       </tr>
                       <tr>
                           <td>Status</td>
                           <td>:  <?= ucfirst($data['status']->transaction_status) ?></td>
                       </tr>
                   </table>
               </div>
             </div>
           </div>


           <!--  -->
           <div class="col-xl-6 col-lg-6 col-sm-12">
             <div class="card shadow mb-4">
               <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                 <h6 class="m-0 font-weight-bold text-primary">Detail Customer</h6>
               </div>
               <div class="card-body">
                   <table class="table table-borderless table-sm">
                       <tr>
                           <td>Nama</td>
                           <td>: <?= $data['customer_detail']->firstname_user ?> <?= $data['customer_detail']->lastname_user ?> </td>
                       </tr>
                       <tr>
                           <td>Email</td>
                           <td>: <?= $data['customer_detail']->email_user ?> </td>
                       </tr>
                       <tr>
                           <td>Alamat</td>
                           <td>: <?= $data['customer_detail']->address_user ?></td>
                       </tr>
                       <tr>
                           <td>Handphone</td>
                           <td>: <?= $data['customer_detail']->phone_number ?></td>
                       </tr>
                   </table>
               </div>
             </div>
           </div>


           <!--  -->
           <div class="col-sm-12">
             <div class="card shadow mb-4">
               <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                 <h6 class="m-0 font-weight-bold text-primary">Detail Pengiriman</h6>
               </div>
               <div class="card-body">
                   <table class="table table-borderless table-sm">
                       <tr>
                           <td>Nama</td>
                           <td>: <?= $data['customer_detail']->firstname_user ?> <?= $data['customer_detail']->lastname_user ?> </td>
                       </tr>
                       <tr>
                           <td>No. Handphone</td>
                           <td>: <?= $data['customer_detail']->phone_number ?> </td>
                       </tr>
                       <tr>
                           <td>Pengirim</td>
                           <td>: <?= $data['shipping_detail']->name_shipping ?></td>
                       </tr>
                       <tr>
                           <td>Deskripsi</td>
                           <td>: <?= $data['shipping_detail']->service_shipping ?> / <?= $data['shipping_detail']->description_shipping ?></td>
                       </tr>
                       <tr>
                           <td>Cost</td>
                           <td>: Rp. <?= number_format($data['shipping_detail']->cost_shipping, 2, ",", ".") ?></td>
                       </tr>
                       <tr>
                           <td>Estimasi Waktu</td>
                           <td>: <?= $data['shipping_detail']->etd_shipping ?> hari</td>
                       </tr>
                       <tr>
                           <td>Tujuan</td>
                           <td>: <?= $data['shipping_detail']->dest_address_shipping ?>, <?= $data['shipping_detail']->dest_city_shipping ?>, <?= $data['shipping_detail']->dest_province_shipping ?>, <?= $data['shipping_detail']->dest_postal_shipping ?></td>
                       </tr>
                       <tr>
                           <td>Catatan Pengiriman</td>
                           <td>: <?= $data['shipping_detail']->noted_shipping ?></td>
                       </tr>
                   </table>
               </div>
             </div>
           </div>

           <!--  -->
           <div class="col-sm-12">
             <div class="card shadow mb-4">
               <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                 <h6 class="m-0 font-weight-bold text-primary">Detail Produk</h6>
               </div>
               <div class="card-body p-0">
                   <table class="table">
                       <thead class="thead-light">
                           <tr>
                               <th class="text-center">No</th>
                               <th>Item</th>
                               <th>Harga</th>
                               <th>Qty</th>
                               <th class="text-center">Total</th>
                           </tr>
                       </thead>
                       <tbody>
                           <?php
                           $no = 1;
                           $subtotal = 0;
                           foreach ($data['produk_detail'] as $r): ?>
                               <tr>
                                   <td class="text-center"><?= $no++ ?></td>
                                   <td><?= "{$r->name_product} <i>( {$r->size_transaction} - {$r->color_transaction} )</i>" ?></td>
                                   <td>Rp. <?= number_format($r->amout_transaction /  $r->quantity_transaction, 0, ",", ".") ?></td>
                                   <td><?= $r->quantity_transaction ?></td>
                                   <td class="text-right">Rp. <?= number_format($r->amout_transaction, 0, ",", ".") ?></td>
                               </tr>
                           <?php
                           $subtotal += $r->amout_transaction;
                          endforeach; ?>
                       </tbody>
                       <tfoot>
                           <tr>
                               <td colspan="4" class="text-right">Subtotal</td>
                               <td class="text-right">Rp. <?= number_format($subtotal, 2, ",", ".") ?></td>
                           </tr>
                           <tr>
                               <td colspan="4"  class="text-right">Ongkos Kirim</td>
                               <td class="text-right">Rp. <?= number_format($data['shipping_detail']->cost_shipping, 0, ",", ".") ?></td>
                           </tr>
                           </tr>
                           <tr>
                               <td colspan="4"  class="text-right">Total</td>
                               <td class="text-right">Rp. <?= number_format($data['shipping_detail']->cost_shipping + $subtotal, 0, ",", ".") ?></td>
                           </tr>
                       </tfoot>
                   </table>
               </div>
             </div>
           </div>

       </div>
