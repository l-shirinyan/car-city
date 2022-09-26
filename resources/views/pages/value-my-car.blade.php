@extends('layout')


@section('content')

<div class="flex flex-row mob-428:flex-col-reverse HD:flex-row pt-[80px]">
    <div class="container-center w-full HD:w-2/3 flex flex-col HD:pr-24 gap-5">
        <a href="{{url()->previous()}}" class="text-m font-bold mb-12">
                ← <u>Back</u>
            </a>

            <h1 class="text-xl HD:text-3xl font-bold">
                Value my car
            </h1>

            <div class="p-4 bg-bg-light">
                <h2 class="font-bold text-lg HD:text-xl flex flex-row gap-3"><img src="/storage/images/icons/red-notice.svg" width="20" height="20" alt=""> Note</h2>    
                <p class="text-xs HD:text-base">Please know that we do not accept cars over 10 years old. </p>
            </div>   

            <h2 class="font-bold text-lg HD:text-xl">Contact info</h2>    


            <div id="v-form-value-my-car">
                <form-value-my-car/>
            </div>
        </div>
    </div>

    <x-layout.footer />
@endsection
