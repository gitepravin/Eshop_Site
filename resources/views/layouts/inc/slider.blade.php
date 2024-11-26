<!-- Carousel structure -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>

  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100 custom-carousel-image" src="{{ asset('adminmate/assets/img/discount (1).jpg')}}" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 custom-carousel-image" src="{{ asset('adminmate/assets/img/discount (2).jpg')}}" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 custom-carousel-image" src="{{ asset('adminmate/assets/img/discount (3).jpg')}}" alt="Third slide">
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

<!-- Custom CSS (can be in a style tag or external stylesheet) -->
<style>
  /* Ensure the carousel spans full width with no margins */
  #carouselExampleIndicators {
    margin-left: 0;
    margin-right: 0;
    width: 100%;
  }

  .custom-carousel-image {
    height: 520px;
    /* Adjust to preferred height */
    object-fit: cover;
    /* Ensures the image maintains aspect ratio and fills the height */
  }

  .carousel-inner {
    width: 100%;
  }

  /* Optional: Remove padding if added by container class */
  .container, .container-fluid {
    padding-left: 0;
    padding-right: 0;

  }
</style>
