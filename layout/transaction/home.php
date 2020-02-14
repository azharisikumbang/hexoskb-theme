<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800">Semua Transaksi</h1>
   <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>


<div class="row">
   <div class="col-sm-12">
       <div class="card shadow mb-4">
           <!-- Card Body -->
           <div class="card-body">
               <table id="product-all-table" class="table table-striped" style="width:100%">
                   <thead>
                       <tr>
                           <th>Pembayaran</th>
                           <th>Tanggal</th>
                           <th>Order ID</th>
                           <th>Email</th>
                           <th>Amout</th>
                           <th>Status</th>
                       </tr>
                   </thead>
                   <tbody>
                       <?php foreach($data['transactions'] as $r) { ?>
                           <tr>
                               <td><?= strtoupper(str_replace("_", " ", $r->type_transaction))  ?></td>
                               <td><?= date("d/m/Y", strtotime($r->created_at)) ?></td>
                               <td><a href="<?= base_url() ?>account/seller/transaction/detail/<?= $r->code_transaction ?>/<?= $r->buyer_code ?>"><?= $r->order_id ?></a></td>
                               <td><?= $r->email_user ?></td>
                               <td>Rp. <?= number_format($r->total_transaction, 0, ",", ".")  ?></td>
                               <td>
                               <span class="btn btn-<?= $this->template->get_class($r->status_transaction); ?> btn-sm"><?= strtoupper($r->status_transaction) ?></span>
                           </td>
                       </tr>
                       <?php } ?>
                   </tbody>
               </table>
           </div>
       </div>
   </div>
</div>
