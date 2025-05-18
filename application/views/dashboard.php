<!-- Default box -->
<div class="card card-success">

    <div class="card-header">
        <!-- <h3 class="card-title">Dashboard</h3> -->

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body">
   
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="<?=base_url()?>/assets//img/slider7.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?=base_url()?>/assets//img/slider8.jpg" alt="Second slide">
</div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<marquee bgcolor="yellow" style="color:black;"><font size="5rem" style="font-weight:bold;">Selamat datang di Sistem Informasi <i>E-Learning</i> Pembelajaran Fiqih Berbasis Web MTsN 7 Tanah Datar Mari kita belajar bersama dengan lebih mudah dan interaktif!</font></marquee>

<div class="row mx-1">
  <div class="col">
    <h5 style="color:black; font-weight:bold; font-size:2rem;" >Tentang Kami</h5>
    <p class="mx-3" id="typing-effect" style="color:black; font-weight:bold; font-size:1.5rem;">
      <i>E-Learning</i>
      <!-- Konten akan diisi oleh JavaScript -->
    </p>
  </div>
</div>



    </div>
    <!-- /.card-body -->
    <!-- /.card-footer-->
</div>
<!-- /.card -->

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const text = "ini berfungsi untuk membantu para peserta didik dalam mengikuti kegiatan belajar mengajar khususnya pada pembelajaran fiqih, siswa dapat mengetahui segala materi pembelajaran dengan mudah dan siswa dapat mengikuti pembelajaran berbantuan komputer sesuai dengan perkembangan zaman dan digitalisasi ICT";
    const element = document.getElementById("typing-effect");
    let index = 0;
    
    function typeWriter() {
      if (index < text.length) {
        element.innerHTML += text.charAt(index);
        index++;
        setTimeout(typeWriter, 2); // Ubah nilai 50 untuk kecepatan mengetik yang berbeda
      }
    }
    
    typeWriter();
  });
</script>