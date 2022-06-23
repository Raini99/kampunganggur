<?php if ($head !== "Beranda") { ?>
    <div class="content-header pt-5">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> <?= $head; ?></h1> <!-- <span class="badge badge-info badge-pill text-bold">50</span> -->
                </div><!-- /.col -->
                <div class="col-sm-6">

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
<?php } else { ?>
    <div class="content-header pt-0">
    </div>
<?php } ?>