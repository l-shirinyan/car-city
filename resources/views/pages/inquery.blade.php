@extends('layout')


@section('content')
<div class="flex flex-row mob-428:flex-col-reverse HD:flex-row pt-[80px]">
    <div class="container-center w-full HD:w-2/3 flex flex-col HD:pr-24 gap-5">
            <a href="{{ url()->previous() }}" class="text-m font-bold mb-12">
                ← <u>Back</u>
            </a>

            <h1 class="text-xl HD:text-3xl font-bold">
                Please, fill the form
            </h1>

            <p class="text-base font-normal">
                We will contact you as soon as possible to help
            </p>

            <div id="v-form-inquery">
                <form-inquery />
            </div>
        </div>
        <div class="hidden w-full HD:w-1/3 mob-428:flex bg-bg-light p-28 justify-center items-center" id="v-car-card">
            <car-card :car="{{ json_encode($vehicle->card) }}" />
        </div>
    </div>

    <x-layout.footer />
@endsection
