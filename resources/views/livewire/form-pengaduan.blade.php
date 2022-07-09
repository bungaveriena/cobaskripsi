<div>
    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message')}}
    </div>
    @endif

    <!-- kenapa div alert mau jalan kalo diatas doang ya -->

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
                  Sistem Pengaduan
                </span>
              </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="d-flex  flex-column flex-lg-row align-items-center">
                  <ul class="navbar-nav  ">
                    <li class="nav-item active">
                      <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="about.html">About </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="service.html">Services </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="contact.html">Contact</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#"> Login</a>
                    </li>
                  </ul>
                  <form class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
                    <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
                  </form>
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
        Form Pengaduan
      </h2>
      <p>
        Pastikan mengisi data dengan benar dan bertanggung jawab
      </p>
    </div>
<div class = "container">
<form wire:submit.prevent="saveData">
    <div class="form-row">    
        <div class="form-group col-md-6">
                <label>Nama Korban</label>
                <input  wire:model= "nama_korban" type="text" class="form-control @error('nama_korban') is-invalid @enderror"  placeholder="nama korban">
                @error('nama_korban')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label>Alamat Korban</label>
                <input  wire:model= "alamat_korban" type="text" class="form-control @error('alamat_korban') is-invalid @enderror"  placeholder="alamat korban">
                @error('alamat_korban')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Email Korban</label>
            <input  wire:model= "email_korban" type="text" class="form-control @error('email_korban') is-invalid @enderror"  placeholder="email korban">
            @error('email_korban')
                <span class="invalid-feedback">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label>Kontak Korban</label>
            <input  wire:model= "notlp_korban" type="text" class="form-control @error('notlp_korban') is-invalid @enderror"  placeholder="no tlp korban">
            @error('notlp_korban')
                <span class="invalid-feedback">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Nama Pembuat Pengaduan</label>
            <input  wire:model= "pembuat_pengaduan" type="text" class="form-control @error('pembuat_pengaduan') is-invalid @enderror"  placeholder="nama pembuat pengaduan">
            @error('pembuat_pengaduan')
                <span class="invalid-feedback">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label>Rekasi Pembuat dengan Korban</label>
            <input  wire:model= "relasi_korban" type="text" class="form-control @error('relasi_korban') is-invalid @enderror"  placeholder="relasi pembuat pengaduan dengan korban">
            @error('relasi_korban')
                <span class="invalid-feedback">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Nama Pelaku</label>
            <input  wire:model= "nama_pelaku" type="text" class="form-control @error('nama_pelaku') is-invalid @enderror"  placeholder="nama pelaku">
            @error('nama_pelaku')
                <span class="invalid-feedback">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label>Alamat Pelaku</label>
            <input  wire:model= "alamat_pelaku" type="text" class="form-control @error('alamat_pelaku') is-invalid @enderror"  placeholder="alamat pelaku">
            @error('alamat_pelaku')
                <span class="invalid-feedback">
                    <strong>{{$message}}</strong>
                </span>
             @enderror
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Email Pelaku</label>
            <input  wire:model= "email_pelaku" type="text" class="form-control @error('email_pelaku') is-invalid @enderror"  placeholder="email pelaku">
            @error('email_pelaku')
                <span class="invalid-feedback">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label>Kontak Pelaku</label>
            <input  wire:model= "notlp_pelaku" type="text" class="form-control @error('notlp_pelaku') is-invalid @enderror"  placeholder="no tlp pelaku">
            @error('notlp_pelaku')
                <span class="invalid-feedback">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Bukti</label>
            <input  wire:model= "bukti" type="file" class="form-control @error('bukti') is-invalid @enderror"  placeholder="bukti">
            @error('bukti')
                <span class="invalid-feedback">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label>Bantuan</label>
            <input  wire:model= "bantuan" type="text" class="form-control @error('bantuan') is-invalid @enderror"  placeholder="bantuan">
            @error('bantuan')
                <span class="invalid-feedback">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div>
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



  <!-- end contact section -->
  <!-- <div class="footer_bg"> -->
    <!-- info section -->
    <!-- <section class="info_section layout_padding2-bottom">
      <div class="container">
        <h3 class="">
          BigWing
        </h3>
      </div>
      <div class="container info_content">

                <div>
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                    <div class="d-flex">
                        <h5>
                        Useful Link
                        </h5>
                    </div>
                    <div class="d-flex ">
                        <ul>
                        <li>
                            <a href="">
                            About Us
                            </a>
                        </li>
                        <li>
                            <a href="">
                            About services
                            </a>
                        </li>
                        <li>
                            <a href="">
                            About Departments
                            </a>
                        </li>
                        <li>
                            <a href="">
                            Services
                            </a>
                        </li>
                        <li>
                            <a href="">
                            Contact Us
                            </a>
                        </li>
                        </ul>
                    </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                    <div class="d-flex">
                        <h5>
                        The Services
                        </h5>
                    </div>
                    <div class="d-flex ">
                        <ul>
                        <li>
                            <a href="">
                            About Us
                            </a>
                        </li>
                        <li>
                            <a href="">
                            About services
                            </a>
                        </li>
                        <li>
                            <a href="">
                            About Departments
                            </a>
                        </li>
                        <li>
                            <a href="">
                            Services
                            </a>
                        </li>
                        <li>
                            <a href="">
                            Contact Us
                            </a>
                        </li>
                        </ul>
                    </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                    <div class="d-flex">
                        <h5>
                        Contact Us
                        </h5>
                    </div>
                    <div class="d-flex ">
                        <ul>
                        <li>
                            <a href="">
                            About Us
                            </a>
                        </li>
                        <li>
                            <a href="">
                            About services
                            </a>
                        </li>
                        <li>
                            <a href="">
                            About Departments
                            </a>
                        </li>
                        <li>
                            <a href="">
                            Services
                            </a>
                        </li>
                        <li>
                            <a href="">
                            Contact Us
                            </a>
                        </li>
                        </ul>
                    </div>
                    </div>
                </div>
                </div>
                <div class="d-flex flex-column flex-lg-row justify-content-between align-items-center align-items-lg-baseline">
                </div>
            </div>

    </section> -->

    <!-- end info_section -->

    <!-- footer section -->
    <section class="container-fluid footer_section">
      <p>
        © 2019 All Rights Reserved By
        <a href="https://html.design/">Free Html Templates</a>
      </p>
    </section>
    <!-- footer section -->
  </div> -->


  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
</body></html>
