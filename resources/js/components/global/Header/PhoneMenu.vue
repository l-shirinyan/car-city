<template>
  <div class="bg-white HD:hidden">
    <div
      class="flex justify-between py-4 border-b header px-sm border-border-color mob-360:px-6 tab-small:px-x60"
    >
      <img
        src="/images/c-logo.svg"
        alt="logo"
        class="w-[102px] cursor-pointer"
        onclick="window.location='/'"
      />
      <img
        src="/images/icons/c-close.svg"
        alt="close"
        class="w-6 cursor-pointer"
        @click="$emit('close-menu')"
      />
    </div>
    <div
      class="relative content px-sm py-li mob-360:px-6 tab-small:px-x60 tab-small:py-normal"
    >
      <div
        class="
          bg-box
          absolute
          z-[1]
          left-0
          right-0
          bottom-0
          h-[190px]
          tab-small:h-[222px]
        "
      ></div>
      <div class="font-bold leading-9 text-m text-grey-900 tab-small:text-lg">
        Need a hand?
      </div>
      <div
        class="mt-4 text-xs leading-6 text-gray/600 tab-small:text-base tab-small:leading-m"
      >
        We're ready to help 9am-6pm the week and 9am-2pm on saturdays
      </div>
      <div class="contacts py-li tab-small:py-normal">
        <div
          class="flex items-center justify-between border-b border-border-color"
          v-for="(item, i) in phoneMenuItems"
          :class="i === 0 ? 'pb-sm tab-small:pb-6' : 'py-sm tab-small:py-6'"
          :key="`item_${i}`"
        >
          <div
            class="flex items-center text-base text-grey-500 leading-m tab-small:leading-normal tab-small:text-x20"
          >
            <img
              class="mr-x10 w-[20px] tab-small:w-[24px]"
              :src="item.imgUrl"
              :class="{ icon: i === 3 }"
              alt="price-icon"
            />
            <span>
              {{ item.label }}
            </span>
          </div>
          <div
            class="text-base text-grey-900 leading-m tab-small:leading-normal tab-small:text-x20"
          >
            {{ item.phoneNumber }}
          </div>
        </div>
      </div>
      <div class="relative z-10 address pt-li tab-small:pt-normal">
        <div
          class="font-bold leading-normal text-x20 text-grey-900 tab-small:leading-9 tab-small:text-m"
        >
          Address
        </div>
        <div
          class="text-xs leading-6 mt-x10 text-gray/700 tab-small:leading-m tab-small:text-base"
        >
          151 Industrial Way, George Town, Grand Cayman.
        </div>
        <div class="mt-6">
          <span
            class="text-xs font-bold leading-6 border-b cursor-pointer select-none text-grey-900 border-grey-900 tab-small:leading-7 tab-small:text-base"
          >
            Get direction
          </span>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";

export default defineComponent({
  name: "phone-menu",
  data() {
    return {
      phoneMenuItems: [
        {
          imgUrl:
            require("/images/icons/contact-icons/c-price.svg")
              .default,
          label: "Sales",
          phoneNumber: "(345) 949 0440",
        },
        {
          imgUrl:
            require("/images/icons/contact-icons/c-car.svg")
              .default,
          label: "Service",
          phoneNumber: "(345) 949 5525",
        },
        {
          imgUrl:
            require("/images/icons/contact-icons/c-settings.svg")
              .default,
          label: "Parts",
          phoneNumber: "(345) 949 7730",
        },
        {
          imgUrl:
            require("/images/icons/contact-icons/c-brush.svg")
              .default,
          label: "Bodyshop",
          phoneNumber: "(345) 949 5728",
        },
      ],
    };
  },
});
</script>
<style scoped>
.icon {
  filter: invert(68%) sepia(9%) saturate(327%) hue-rotate(179deg)
    brightness(93%) contrast(93%);
}
.bg-box {
  background-image: url("/images/c-phone-menu-bg.svg");
}
</style>
