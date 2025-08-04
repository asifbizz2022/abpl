@extends('frontend.layout.app')
@section('content')   

<!-- <div class="container-fluid " style="background: url('{{ url("/") }}/public/event-bg.jpg'); "> 
   <div class="row container-fluid">
    <h1 class="text-white text-center text-capitalize">{{$data->title}}</h1>
     <div class="col d-flex p-3"> 
       <img src="{{ url('/') }}/public/assets/images/awards.png" class="  img-thumbnail rounded" style="width: 500px; height: 500px;">
       <span class="text-light px-3" style="filter: brightness(200%);">
        <?php printf("%s", $data->description) ?> 
       </span>
     </div>
   </div>
</div>  -->
    <style>
        .content-img {
            width: 1.9375in;
            height: 1.9375in;
            float: left;
            margin-right: 20px;
            margin-bottom: 10px;
        }
        .content-section {
            clear: both;
            padding-top: 20px;
        }
    </style>
<section class="bg-dark" style="background: url('{{ url("/") }}/public/event-bg2.jpg'); ">
    <div class="container mt-5 mb-5  ">
        <div class="row text-light">
            <div class="col-lg-12">
                <article class="py-5">
                    <header class="mb-4 text-center">
                        <header class="mb-4 text-center">
                        <h1 class="display-4"> {{$data->title}} </h1>
                        <hr>
                       
                    </header>
                    </header>
                    
                    <section class="content-section">
                        <img src="{{ url('/') }}/public/assets/images/awards.png" style="width: 500px; height: 500px;" alt="Lorem Ipsum illustration" class="content-img img-fluid rounded">
                        
                         <p class="mx-5 text-justified  ">
                            <?php printf("%s", $data->description) ?> 
                         </p>
                         
                    </section>
                    
                </article>
            </div>
        </div>
    </div>
</section>

@endsection