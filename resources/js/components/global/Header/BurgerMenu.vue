<template>
  <div class="bg-white HD:hidden">
    <div
      class="flex justify-between py-4 border-b header px-sm border-border-color mob-360:px-6 tab-small:px-x60"
    >
      <img
        src="images/c-logo.svg"
        alt="logo"
        class="w-[102px] cursor-pointer"
        onclick="window.location='/'"
      />
      <img
        src="images/icons/c-close.svg"
        alt="close"
        class="w-6 cursor-pointer"
        @click="$emit('close-menu')"
      />
    </div>
    <div
      class=" content px-sm py-x20 mob-360:px-6 tab-small:px-x60 tab-small:py-mobile-container"
    >
      <ul>
        <li
          v-for="item in listData"
          :key="item.id"
          @click="openAccordion(item)"
          class="py-5 cursor-pointer tab-small:py-6"
          :class="{ 'border-b border-border-color': item.id !== 'contacts' }"
        >
          <span class="flex items-center justify-between">
            <span
              class="font-medium leading-normal text-grey-900 text-x20 tab-small:leading-9 tab-small:text-lg tab-small:font-bold"
              >{{ item.label }}</span
            >
            <img
              v-if="item.children"
              :class="{ 'rotate-180': item.showChildrens }"
              class="w-[20px] mob-360:w-[24px]"
              src="/images/icons/c-arrow.svg"
              alt="arrow"
            />
          </span>
          <ul v-if="item.children && item.showChildrens" class="ml-6">
            <li
              class="cursor-pointer mt-x30 tab-small:mt-9"
              v-for="list in item.children"
              :key="list.id"
            >
              <span
                class="text-base font-normal leading-m tab-small:leading-9 tab-small:text-m"
                >{{ list.label }}</span
              >
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";
interface childData {
  id: string;
  label: string;
}
interface burgerData {
  id: string;
  label: string;
  showChildrens: boolean;
  children?: childData[];
}

export default defineComponent({
  data() {
    return {
      listData: [
        {
          id: "inventory",
          label: "Inventory",
          showChildrens: false,
          children: [
            {
              id: "all cars in stock",
              label: "All cars in stock",
            },
            {
              id: "honda",
              label: "Honda",
            },
            {
              id: "jeep",
              label: "Jeep",
            },
            {
              id: "ram",
              label: "Ram",
            },
            {
              id: "suzuki",
              label: "Suzuki",
            },
            {
              id: "mitsubishi",
              label: "Mitsubishi",
            },
            {
              id: "chrysler",
              label: "Сhrysler",
            },
            {
              id: "dodge",
              label: "Dodge",
            },
            {
              id: "mercedes-Benz",
              label: "Mercedes-Benz",
            },
          ],
        },
        {
          id: "schedule service",
          label: "Schedule service",
          showChildrens: false,
          children: [
            {
              id: "jeep",
              label: "Jeep",
            },
            {
              id: "ram",
              label: "Ram",
            },
            {
              id: "suzuki",
              label: "Suzuki",
            },
            {
              id: "ram",
              label: "Ram",
            },
            {
              id: "suzuki",
              label: "Suzuki",
            },
            {
              id: "mitsubishi",
              label: "Mitsubishi",
            },
            {
              id: "chrysler",
              label: "Chrysler",
            },
            {
              id: "dodge",
              label: "Dodge",
            },
            {
              id: "mercedes-Benz",
              label: "Mercedes-Benz",
            },
          ],
        },
        {
          id: "bodyshop",
          label: "Bodyshop",
          showChildrens: false,
        },
        {
          id: "parts & accessories",
          label: "Parts & Accessories",
          showChildrens: false,
        },
        {
          id: "contacts",
          label: "Contacts",
          showChildrens: false,
        },
      ],
    };
  },
  methods: {
    openAccordion(item: burgerData) {
      item.showChildrens = !item.showChildrens;
    },
  },
});
</script>
