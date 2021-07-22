<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brand Name</title>

    <!--boostrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>

    

    <!--fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

    <!--icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">

    <!--css-->
    <link rel="stylesheet" href="{{ asset('css/styleEvent.css') }}" rel="stylesheet">

    <!--vue-->
    <!--<script src="https://unpkg.com/vue@next"></script>-->

</head>

<body>
    <div id="app" class="container-fluid">

        <!--background-->
        <div class="background-top">

            <!--header-->
            <header>
                <nav class="top-bar">

                    <a class="mob-menu fas fa-bars" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample"></a>

                    <div class="offcanvas offcanvas-start top-nav" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                        <div class="offcanvas-header">
                            <div class="background-search">
                                <input class="input-search" type="text" placeholder="Buscar">
                                <a class="icon-search" href="#"><i class="fas fa-search"></i></a>
                            </div>
                            <span type="button" class="mob-close far fa-times-circle" data-bs-dismiss="offcanvas" aria-label="Close"></span>
                        </div>
                        <div class="offcanvas-body">
                            <div>
                                <a class="top-nav-link tittle-categorias" href="#">Login</a>
                            </div>
                            <nav class="navbar">
                                <div class="dropdown mt-3">
                                    <a class="top-nav-link tittle-categorias dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">Categorías</a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        @foreach ($categories as $category)
                                        <li><a class="dropdown-item top-nav-link" href="{{ route('brand.show',$category->id) }}">{{ $category->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </nav>

                        </div>
                    </div>

                    <div class="navweb">
                        <ul class="top-nav">

                            <li class="top-nav-item">
                                <div class="background-search">
                                    <input class="input-search" type="text" placeholder="Buscar">
                                    <a class="icon-search" href="#"><i class="fas fa-search"></i></a>
                                    
                                </div>
                            </li>
                            
                            <li class="top-nav-item">
                                <nav class="navbar">
                                    <div class="dropdown">

                                        <a class="top-nav-link tittle-categorias dropdown-toggle" href="#" role="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Categorías</a>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            @foreach ($categories as $category)
                                            <li><a class="dropdown-item top-nav-link" href="{{ route('brand.show',$category->id) }}">{{ $category->name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </nav>
                            </li>

                        </ul>
                    </div>


                    <a href="/"><img class="logo-header" src="{{ asset('img/logoMobile.svg') }}" alt="logo"></a>
                </nav>
            </header>
            <!--header-->
            <!--event-section-->
            <section class="event-section">
                <h3 class="tittle-event">{{ $event->title }}</h3>
                <img class="img-event" src="{{ asset('storage/imgs/'.$event->image) }}" alt="img">
                <div class="container-price">
                    <p class="price">₡ {{ $event->priceAdult }}</p>
                </div>
                <button type="button" class="btn registration-btn" data-bs-toggle="modal" data-bs-target="#modalRegistration">registrarse</button>
            </section>
            <!--event-section-->

        </div>
        <!--background-->

        <!--restratration-section-->
        <div class="modal fade" id="modalRegistration" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content container-popup">
                    <div class="modal-header">
                        <div><img class="logo-header-popup" src="{{ asset('img/logoMobileModal.svg') }}" alt="logo"></div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h5 class="tittle-modal">{{ $event->title }}</h5>
                        <p class="sub-tittle-modal">revisar y realizar registro</p>

                        <div class="row">
                            <div class="col-auto">
                                <p>Menor de edad</p>
                                <p>Mayor de edad</p>
                            </div>
                            <div class="col-auto">
                                <p>Valor: ₡{{ $event->priceKid }}</p>
                                <p>Valor: ₡{{ $event->priceAdult }}</p>
                            </div>
                            <div class="col-1">
                                <label for="quantityK" class="visually-hidden">Qty</label>
                                <input type="number" min="0" max="{{ $event->inventory }}" class="input-C pt-sm-0 pb-sm-0" id="quantityK" placeholder="0" oninput="checkInventory('{{ $event->inventory }}', '{{ $event->priceKid }}', '{{ $event->priceAdult }}')">

                                <label for="quantityA" class="visually-hidden">Qty</label>
                                <input type="number" max="{{ $event->inventory }}" min="0" class="input-C pt-sm-0 pb-sm-0 mt-1" id="quantityA" placeholder="0" oninput="checkInventory('{{ $event->inventory }}', '{{ $event->priceKid }}', '{{ $event->priceAdult }}')">
                            </div>
                        </div>

                        <div class="line-modal"></div>
                        <div class="row">
                            <div class="col-9">Total por menores de edad</div>
                            <div class="col-3">
                                <p id="totalK"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-9">Total por mayores de edad</div>
                            <div class="col-3">
                                <p id="totalA"></p>
                            </div>
                        </div>
                        <div class="line-modal"></div>
                        <div class="row">
                            <div class="col-9">Total</div>
                            <div class="col-3">
                                <p id="total"></p>
                            </div>
                        </div>
                        <div class="line-modal"></div>
                        <p id="span_inventory" class="text-center text-danger visually-hidden">La cantidad de espacios solicitados supera los existentes</p>
                    </div>
                    <div class="modal-footer">
                        <button id="btnSig" click="chargeTotal((qtyK*events[selectedEvent].priceK) + (qtyA*events[selectedEvent].priceA))" disabled="true" type="button" class="btn modal-btn" data-bs-target="#modal2" data-bs-toggle="modal" data-bs-dismiss="modal">Siguiente</button>
                    </div>
                </div>
            </div>
        </div>
        <!--restratration-section-->

        <!--form-section-->
        <div class="modal fade" id="modal2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content container-popup">
                    <div class="modal-header">
                        <div><img class="logo-header-popup" src="{{ asset('img/logoMobileModal.svg') }}" alt="logo"></div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        
                        <!--------------------------------------------------------->
                        <form action="{{ route('brand.store') }}" method="POST">

                            <h5 class="tittle-modal" > {{ $event->title }} </h5>
                            <input class="visually-hidden" name="title" type="text" value="{{ $event->title }}" >
                            <p class="sub-tittle-modal">métodos de pago</p>

                            <div class="metodos-pago-mobile">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                    <img class="logo-visa-mobile" src="{{ asset('img/visaMobile.svg') }}" alt="logo visa">
                                    <label class="form-check-label" for="flexRadioDefault1">VISA</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                    <img class="logo-paypal-mobile" src="{{ asset('img/paypalMobile.svg') }}" alt="logo paypal">
                                    <label class="form-check-label" for="flexRadioDefault2">Paypal</label>
                                </div>
                            </div>
                            <div class="line-modal"></div>
                            <div class="row">
                                <div class="col-9">Total</div>
                                <div class="col-3">
                                    <p id="finalTotal"></p>
                                    <input class="visually-hidden" id="totalPago" name="total" type="text" value="">
                                    <input class="visually-hidden" id="qtyF" name="totalqty" type="text" value="">
                                    <input class="visually-hidden"  name="identificator" type="t" value="{{$event->id}}">
                                </div>
                            </div>

                            @csrf
                            <div class="line-modal"></div>
                            <div class="form-modal">
                                <p class="tittle-form">Registro a nombre de</p>
                                <input type="text" placeholder="Nombre completo" class="form-control mt-2 mb-2" id="fullname"name="fullname" oninput="checkName()" onkeyup="validateImputs()" required autofocus>
                                <p id="span_fullname" class="text-center text-danger visually-hidden">El nombres es demasiado corto</p>
                                @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif

                                <input type="text" placeholder="Correo electrónico" id="email" class="form-control mb-2" name="email" oninput="validateEmail()" onkeyup="validateImputs()" required autofocus>
                            
                                <p id="span_email" class="text-center text-danger visually-hidden">Formato de correo incorrecto (requiere '@' y '.')</p>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="modal-footer">
                                <div class="row">
                                    <div class="col">
                                        <button type="button" class="mb-2 btn modal-btn"  data-bs-target="#modalRegistration" data-bs-toggle="modal" data-bs-dismiss="modal">Regresar</button>
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="btn modal-btn" id="registro" disabled="true">Finalizar registro</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--------------------------------------------------------->

                    </div>

                </div>
            </div>
        </div>
        <!--form-section-->

        <!--resume-section-->
        <div class="modal fade" id="modal3" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content container-popup">
                    <div class="modal-header header-resume">
                        <div class="row">
                            <div class="col-12"><img class="check" src="{{ asset('img/check-resume-mobile.svg') }}" alt="check-resume-mobile"></div>
                            <div class="col-12">
                                <p class="tittle-resume">¡Registro finalizado!</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="resumen">
                            <div class="subtittle-resume">Resumen</div>

                            <div class="line-modal"></div>
                            <div class="row">
                                <div class="col-9">titulo evento</div>
                            </div>
                            <div class="row">
                                <div class="col-9">nombre</div>
                            </div>
                            <div class="row">
                                <div class="col-9">email</div>
                            </div>
                            <div class="row">
                                <div class="col-9">Método de pago</div>
                                <div class="col-3">VISA</div>
                            </div>
                            <div class="row">
                                <div class="col-9">Total</div>
                                <div class="col-3">0.0</div>
                            </div>
                            <div class="line-modal"></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--resume-section-->

        <!--description-section-->
        <section class="description-section">
            <h4 class="tittle-description">Descripción del evento</h4>
            <div class="row container-description">
                <div class="col-12">
                    <p class="info-event-description"><span class="fas fa-map-marker-alt icon-info"></span> {{ $event->location }}</p>
                </div>
                <div class="col-12">
                    <p class="info-event-description"><span class="far fa-calendar-alt icon-info"></span> {{ $event->dateTime }}</p>
                </div>
                <div class="col-12">
                    @foreach ($categories as $category)
                    @if($category->id==$event->categories_id)
                    <p class="info-event-description"><span class="fas fa-tag icon-info"></span>{{ $category->name }}</p>
                    @endif
                    @endforeach
                </div>
                <div class="col-12">
                    <p class="info-event">{{ $event->description }}</p>
                </div>
            </div>
        </section>
        <!--description-section-->

        <!--related-section-->
        <section class="related-section">
            <h4 class="tittle-related">Eventos relacionados</h4>
            <div class="container-event-related">

                <div id="carousel-related-event" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @for ($i=0; $i<count($events); $i++)
                            @if($event->categories_id == $id)
                                @if($i==0)
                                    <div class="carousel-item active">
                                        <img class="img-event-related" src="{{ asset('storage/imgs/'.$events[$i]->image) }}" alt="ruta-de-los-conquistadores">
                                        <h3 class="tittle-event-related">{{ $events[$i]->title }}</h3>
                                    </div>
                                @else
                                    <div class="carousel-item">
                                        <img class="img-event-related" src="{{ asset('storage/imgs/'.$events[$i]->image) }}" alt="ruta-de-los-conquistadores">
                                        <h3 class="tittle-event-related">{{ $events[$i]->title }}</h3>
                                    </div>
                                @endif
                            @endif
                        @endfor
                    </div>
                    <button class="carousel-control-prev" data-bs-target="#carousel-related-event" type="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </button>
                    <button class="carousel-control-next" data-bs-target="#carousel-related-event" type="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </button>
                </div>
            </div>
        </section>
        <!--related-section-->

        <!--footer-->
        <footer>
            <nav>
                <ul class="bottom-nav">
                    <li class="bottom-nav-iteam">
                        <p class="text-footer">Copyrigth © 2021 brand name</p>
                        <p class="text-footer">Todos los derechos reservados</p>
                        <p class="text-footer">Política de privacidad</p>
                    </li>
                    <li class="bottom-nav-iteam"><img src="{{ asset('img/logoMobile.svg') }}" alt="logo" class="logo-footer"></li>
                    <li class="bottom-nav-iteam-up"><a class="fas fa-chevron-up btn-up" href="#"></a></li>
                </ul>
            </nav>
        </footer>
        <!--footer-->

    </div>

    <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>