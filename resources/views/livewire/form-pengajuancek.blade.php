<div>
    <body class="sub_page">
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-8">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
              <a class="navbar-brand" href="index.html">
                <span>
                  Sistem Pengajuan
                </span>
              </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="d-flex  flex-column flex-lg-row align-items-center">
                  <ul class="navbar-nav  ">
                    <li class="nav-item active">
                      <a class="nav-link" href="/index">Home <span class="sr-only">(current)</span></a>
                    </li>
                  </ul>
                  <!-- <form class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
                    <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
                  </form> -->
                </div>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </header>             
    <!-- end header section -->
  </div>
<section class="contact_section layout_padding">
    <div class="container contact_heading">
      <h2>
        Form Pengajuan Cek 
      </h2>
      <p>
        Pastikan mengisi data dengan benar dan bertanggung jawab <br>
        Data pengajuan cek akan diproses dan hasil pengecekan dikirim via email.
      </p>
    </div>
<div class = "container">
@if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message')}}
    </div>
    @endif
    <form wire:submit.prevent="savePengajuan">
        <div class="form-row">
            <div class="form-group col-md-6">
            <label>Nama Pengaju Pengecekan</label>
                <input  wire:model= "nama_pengaju" type="text" class="form-control @error('nama_pengaju') is-invalid @enderror"  placeholder="nama pengaju">
                    @error('nama_pengaju')
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
            </div>
            <div class="form-group col-md-6">
              <label>Alamat Pengaju Pengecekan</label>
                <input  wire:model= "alamat" type="text" class="form-control @error('alamat') is-invalid @enderror"  placeholder="alamat pengaju">
                    @error('alamat')
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
            <label>Nomor Telepon Pengaju</label>
                <input  wire:model= "no_tlp" type="text" class="form-control @error('no_tlp') is-invalid @enderror"  placeholder="kontak yang dapat dihubungi">
                    @error('no_tlp')
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
            </div>
            <div class="form-group col-md-6">
            <label>Email Pengaju</label>
                <input  wire:model= "email_pengaju" type="text" class="form-control @error('email_pengaju') is-invalid @enderror"  placeholder="email pengaju">
                    @error('email_pengaju')
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
            <label>Asal Instansi Pengaju</label>
                <input  wire:model= "asal_instansi" type="text" class="form-control @error('asal_instansi') is-invalid @enderror"  placeholder="asal instansi">
                    @error('asal_instansi')
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
            </div>
            <div class="form-group col-md-6">
            <label>Nama yang diajukan untuk dicek</label>
                <input  wire:model= "nama_diajukan" type="text" class="form-control @error('nama_diajukan') is-invalid @enderror"  placeholder="nama yang diajukan untuk dicek">
                    @error('nama_diajukan')
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
            <label>Relasi Pengaju dengan Nama yang diajukan</label>
                <input  wire:model= "relasi" type="text" class="form-control @error('relasi') is-invalid @enderror"  placeholder="relasi dengan nama yang diajukan">
                    @error('relasi')
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
            </div>
                <div class="form-group col-md-6">
                <label>Keperluan Pengecekan</label>
                    <input  wire:model= "keperluan" type="text" class="form-control @error('keperluan') is-invalid @enderror"  placeholder="maksud, tujuan, urgensi mengajukan cek">
                    @error('keperluan')
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
        </div>
        <button type="submit" class="btn btn-sm btn-primary">Submit Data</button>
    </form>
</div>
</div>
</section>

<!-- slider stylesheet -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css"/>

        <!-- bootstrap core css -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>

        <!-- fonts style -->
        <link href="https://fonts.googleapis.com/css?family=Dosis:400,500|Poppins:400,700&amp;display=swap" rel="stylesheet"/>
        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet"/>
        <!-- responsive style -->
        <link href="css/responsive.css" rel="stylesheet"/>

        <section class="container-fluid footer_section">
            <p>
                © 2019 All Rights Reserved By
                <a href="https://html.design/">Free Html Templates</a>
            </p>
            </section>
            <!-- footer section -->
        </div>