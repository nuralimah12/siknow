@extends('layouts.base')

@section('title', 'Welcome')

@section('custom_css_link', asset('Css/Home_style/main.css'))

@section('main-content')
<form action="{{route('home')}}" class="form-search">
  <div class="row justify-content-center h-100">
    <div class="d-flex flex-column align-items-center main-content col-10 col-lg-8">
      <div class="logo-wrapper d-flex align-items-center justify-content-center gap-3">
        <img src="{{asset('img/logopal.png')}}" class="jti-logo" />
        <div class="text-wrapper gap-1">
          <p class="m-0 head-title">Sistem Informasi</p>
          <h1 class="fw-bold m-0 main-title">Knowledge Sharing</h1>
          <h1 class="fw-bold m-0 main-title">Divisi Teknologi Informasi</h1>
        </div>
      </div>
      <div class="search-wrapper pb-2 mt-4 rounded rounded-3 w-100">
        <div class="input-group">
          <input type="text" class="form-control py-2 px-3 search-input border-0" placeholder="Search" name="title" />
          <button type="submit" class="input-group-text btn btn-primary d-flex align-items-center fs-5 px-3"
            id="basic-addon2">
            <i class="ri-search-line"></i>
          </button>
        </div>
        <div class="suggestion-box mt-3 w-100">
        </div>
      </div>
    </div>
  </div>
</form>
@endsection

@push('js')
<script>
  $('.search-input').on('input', debounce(function (e) {
    let searchInput = e.target.value;

    if(searchInput == ''){
      $('.suggestion-box').empty();
    }else{
      $.get("{{route('getSuggestionTitle')}}", {
      title : searchInput
    },
      function (data, textStatus, jqXHR) {
        if (data.length !== 0) {
          $('.suggestion-box').empty();
          $('.search-wrapper').addClass('active')
        }
        data.forEach(e => {
          $('.suggestion-box').append(`<div class="suggestion-item py-2 ps-3">${e.title}</div>`)
          });

          $(".suggestion-item").on("click", (e) => {
          $(".search-input").val(e.target.innerHTML);

          $(".form-search").submit();
        }); 
      },
    );
    }

  }, 300));

  $("body").on("click", () => {
      $(".search-wrapper").removeClass("active");
    });
</script>
@endpush
@push('style')
    <style>
    body{
    background: url('/img/gambarpal.jpg') no-repeat center center fixed;
    background-size: cover;
    position: relative;
    /* Menambahkan gradien transparan */
  }
  
  /* Tambahkan overlay transparan dengan gradien */
  body::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
     /* background: linear-gradient(
      rgba(73, 74, 75, 0.258), 
      rgba(71, 71, 72, 0.267)
    );  */
    background: linear-gradient(
      rgba(235, 231, 231, 0.815), 
      rgba(255, 253, 253, 0.815)
    ); 
    /* Gradien transparan overlay  */
    z-index: -1; /* Pastikan overlay di belakang konten */
  
      /* background: linear-gradient(
      rgba(255, 255, 255, 0.5), 
      rgba(255, 255, 255, 0.5)
    ), url('/img/gambarpal.jpg');
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center center;
  background-blend-mode: overlay; */
    }

  
    </style>
@endpush  