@php
$contacts = json_decode(Page::option('business_information')->contact);
@endphp

<header class="fixed w-full z-max" id="v-header">
    <c-header :dropdown="dropdown">
        @if ($contacts && count($contacts))
            <template v-slot:header-information>
                <div class="header-information" @mouseenter="dropdown=false">
                    <ul>
                        @foreach ($contacts as $contact)
                            <li>
                                {{ $contact->attributes->contact_title }} :
                                {{ $contact->attributes->contact_phone_number }}
                                @if (!$loop->last)
                                    <span>|</span>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </template>
        @endif

        <template v-slot:navigation>
            <div class="navigation">
                <ul>
                    <li class="primary-arrow" @mouseenter="dropdown='inventory'">
                        Inventory
                        <img src="{{ asset('/images/icons/c-arrow.svg') }}" alt="arrow" />
                    </li>
                    <li class="primary-arrow" @mouseenter="dropdown='showroom'">
                        Showroom
                        <img src="{{ asset('/images/icons/c-arrow.svg') }}" alt="arrow" />
                    </li>

                    <li @mouseenter="dropdown=false">
                        Schedule service
                    </li>
                    <li>
                        Bodyshop
                    </li>
                    <li @mouseenter="dropdown=false">
                        Parts & Accessories
                    </li>
                    <li @mouseenter="dropdown=false">
                        <a href="{{ route('contact') }}">
                            Contacts
                        </a>
                    </li>
                </ul>
            </div>
        </template>

        <template v-slot:dropdown-menu>
            <c-dropdown-menu @mouseleave="dropdown=false" :brands="{{ App\Models\Brand::select('name', 'slug')->get() }}"
                v-if="dropdown" :cars="{{ App\Models\Vehicle::featured()->get()->pluck('card') }}" />
        </template>
    </c-header>
</header>
