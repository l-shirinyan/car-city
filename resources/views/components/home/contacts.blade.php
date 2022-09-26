<div class="absolute mt-12 right-0">

<div class="absolute top-20 right-0 2K:top-x100">
    <div class="contacts-vertical">
        <div class="uppercase text-grey-900 font-medium text-m leading-[31px] 2K:text-xl 2K:leading-x42">
            contacts
        </div>
        <div class="w-[70px] border-b border-secondary 2K:w-[98px] 2K:border-t"></div>
        <div class="flex items-center gap-6 2K:gap-8">
            @foreach ($contacts as $contact)
                <img class="w-[24px] 2K:w-[32px] rotate-[270deg]" src="{{ $contact['path'] }}"
                    alt="{{ $contact['title'] }}" />
            @endforeach
        </div>
    </div>
</div>
</div>
