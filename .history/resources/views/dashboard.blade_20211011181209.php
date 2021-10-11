<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mon profile') }}
        </h2>
    </x-slot>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="py-8">
        <!-- end row -->
        <div class="row">
            <div class="col-lg-4">
                <div class="text-center card-box">
                    <div class="member-card pt-2 pb-2">
                        <div class="thumb-lg member-thumb mx-auto"><img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="rounded-circle img-thumbnail" alt="profile-image"></div>
                        <div class="">
                           
                            @if(isset(Auth::user()->id))
                           
                            <h4>{{$name}}</h4> <h4>{{$lastname}}</h4>
                        
                            <p class="text-muted">@if($admin == 1) Administrateur @else utilisateurs @endif {{$id}}<span> | </span><span><a href="#" class="text-pink">Fastdem.com</a></span></p>
                        </div>
                       
                        <button type="button" class="btn btn-primary mt-3 btn-rounded waves-effect w-md waves-light">Devis</button>
                        <div class="mt-4">
                            <div class="row">
                                <div class="col-4">
                                    <div class="mt-3">
                                       
                                        <p class="mb-0 text-muted">@if($admin == 0) Mes devis @else total devis créer par les utilisateurs @endif</p>
                                        <h4> @if($admin == 1) {{$nbDevis}} @endif</h4>
                                        {{$$$dev}}
                                    </div>
                                </div>
                                @if($admin == 1)
                                <div class="col-4">
                                    <div class="mt-3">
                                        
                                        <p class="mb-0 text-muted">Nombre total des devis payée par les utilisateurs</p>
                                        <h4> {{$devisPayer}}</h4>
                          
                               
                                    </div>
                                </div>
                                @endif
                              
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <!-- end col -->
 
</div>
</div>
<style>

.card-box {
    padding: 20px;
    border-radius: 3px;
    margin-bottom: 30px;
    background-color: #fff;
}

.social-links li a {
    border-radius: 50%;
    color: rgba(121, 121, 121, .8);
    display: inline-block;
    height: 30px;
    line-height: 27px;
    border: 2px solid rgba(121, 121, 121, .5);
    text-align: center;
    width: 30px
}

.social-links li a:hover {
    color: #797979;
    border: 2px solid #797979
}
.thumb-lg {
    height: 88px;
    width: 88px;
}
.img-thumbnail {
    padding: .25rem;
    background-color: #fff;
    border: 1px solid #dee2e6;
    border-radius: .25rem;
    max-width: 100%;
    height: auto;
}
.text-pink {
    color: #ff679b!important;
}
.btn-rounded {
    border-radius: 2em;
}
.text-muted {
    color: #98a6ad!important;
}
h4 {
    line-height: 22px;
    font-size: 18px;
}
</style>
</x-app-layout>
