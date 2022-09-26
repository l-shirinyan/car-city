<template>
    <div class="flex flex-col w-full HD:flex-row">
        <div class="w-full p-10 text-black bg-white HD:w-1/2">
            <h3 class="mb-10 text-lg font-bold">Financing calculator</h3>
            <div class="flex flex-col gap-8">
                <div class="flex flex-row justify-between w-full">
                    <p class="font-medium uppercase text-s text-grey-900">Deposit</p>
                    <div class="pb-3 border-b border-gray/400">
                        $<input type="number" v-model="deposit" min="0">
                    </div>
                </div>
                <div class="flex flex-row justify-between w-full">
                    <p class="font-medium uppercase text-s text-grey-900">Interest rate%</p>
                    <div class="pb-3 border-b border-gray/400">
                        %<input type="number" v-model="interest">
                    </div>
                </div>
                <div class="flex flex-row justify-between w-full">
                    <p class="font-medium uppercase text-s text-grey-900">Term in Month</p>
                    <div class="pb-3 border-b border-gray/400">
                        <input type="number" step="6" v-model="payments" min="6">
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col w-full gap-8 p-10 text-black HD:w-1/2 bg-light">
            <div class="flex flex-col justify-between w-full text-lg font-bold HD:mb-10 HD:flex-row">
                <p>Monthly payment:</p>
                <p>{{monthlyPayment}}</p>
            </div>

            <a
                href="/car-finance"
                class="cursor-pointer flex gap-3 items-center justify-center w-full text-white bg-primary rounded-[40px] px-10 py-5 text-base HD:text-m font-bold">
                <span>Apply to finance</span>
            </a>

            <p class="font-medium text-xxs text-grey-500">
                These calculations are for guidance only. You will need to contact a mortgage lender
                directly to find out exactly how much your monthly payments would be.
            </p>
        </div>
    </div>
</template>

<script>
export default {
    props:{
        carPrice:{
            type: Number
        },
        defaultInterest:{
            type: Number,
            default: 5
        },
        defaultPeriod:{
            type: Number,
            default: 12
        }
    },
    data: () => {
        return {
            deposit: 5000,
            interest: 9,
            payments: 12,
        }
    },
    computed:{
        monthlyPayment(){
            const p = this.carPrice - this.deposit;
            const i = this.interest / 100 / 12;
            const n = this.payments;

            let monthlyPayment = p * i * (Math.pow(1 + i, n)) / (Math.pow(1 + i, n) - 1);

            if (isNaN(monthlyPayment) || monthlyPayment<0) {
                monthlyPayment = 0;
            }
            return new Intl.NumberFormat("en-US", {style: "currency", currency: "USD"}).format(monthlyPayment)
        }
    },
    mounted() {
        this.interest = this.defaultInterest;
        this.payments = this.defaultPeriod;
    }
}
</script>

<style>

</style>