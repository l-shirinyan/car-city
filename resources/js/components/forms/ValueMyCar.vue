<template>
    <div>

        <div v-if="formState === 'success'"
            class="top-0 left-0 backdrop-blur-lg bg-blure-bg z-max fixed w-full h-screen flex justify-center items-center">
            <div class="bg-white w-full tab-small:w-2/3 HD:w-1/3 mx-8 text-center p-8 flex flex-col items-center gap-8">
                <img src="/storage/images/icons/request-received.svg" />
                <h1 class="font-bold text-xl">Request received</h1>
                <p>
                    We will contact you shortly to clarify the details. Don’t forget to check the spam folder in the
                    mail
                </p>
                <button @click="previousPage"
                    class="bg-primary  w-full h-[52px] rounded-[40px] tab-small:w-[205px] tab-small:h-[68px] 2K:w-[245px] 2K:h-[84px]">
                    <div class="flex items-center justify-center text-sm font-bold leading-6 text-white content">
                        Back to Car details
                    </div>
                </button>
            </div>
        </div>

        <div class="flex flex-col HD:flex-row gap-4">
            <custom-input placeholder="First Name" :errorMessage="getFieldErrorMessage('firstName')"
                :inputValue="formData.firstName" @update:inputValue="formData.firstName=$event"></custom-input>
            <custom-input placeholder="Last Name" :errorMessage="getFieldErrorMessage('lastName')"
                :inputValue="formData.lastName" @update:inputValue="formData.lastName=$event"></custom-input>
        </div>
        <div class="flex flex-col HD:flex-row gap-4">
            <custom-input placeholder="Email" :errorMessage="getFieldErrorMessage('email')" :inputValue="formData.email"
                @update:inputValue="formData.email=$event"></custom-input>
            <custom-input placeholder="Phone" :errorMessage="getFieldErrorMessage('phone')" :inputValue="formData.phone"
                @update:inputValue="formData.phone=$event"></custom-input>
        </div>

        <h2 class="font-bold text-lg HD:text-xl mt-8 mb-4">Vehicle</h2>    

        <p class="text-gray/400">
            For us to provide you with the most competitive valuation, please state the condition of your car as accurately as possible
        </p>


        <div class="flex flex-col HD:flex-row gap-4 mt-8">
            <custom-input placeholder="Manufacturer" :errorMessage="getFieldErrorMessage('manufacturer')"
                :inputValue="formData.manufacturer" @update:inputValue="formData.manufacturer=$event"></custom-input>
            <custom-input placeholder="Model" :errorMessage="getFieldErrorMessage('model')"
                :inputValue="formData.model" @update:inputValue="formData.model=$event"></custom-input>
        </div>
        <div class="flex flex-col HD:flex-row gap-4">
            <custom-input placeholder="Year" :errorMessage="getFieldErrorMessage('year')"
                :inputValue="formData.year" @update:inputValue="formData.year=$event"></custom-input>
            <custom-input placeholder="Vehicule condition" :errorMessage="getFieldErrorMessage('vehicleCondition')" :inputValue="formData.vehicleCondition"
                @update:inputValue="formData.vehicleCondition=$event"></custom-input>
        </div>

        <button @click="submitForm()"
            class="mt-8 w-full h-[52px] rounded-[40px] tab-small:w-[205px] tab-small:h-[68px] 2K:w-[245px] 2K:h-[84px]"
            :class="[v$.$invalid ? 'bg-gray/400':'bg-primary ']" :disabled="v$.$invalid || formState === 'loading'">
            <div
                class="flex items-center justify-center text-xs font-bold leading-6 text-white content tab-small:text-x20 tab-small:leading-normal 2K:leading-9 2K:text-m">
                <img v-if="formState === 'loading'" src="/storage/images/icons/loading-spin.svg" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" width="20"/>  Value my car
            </div>
        </button>

    </div>
</template>

<script>
import customInput from "../shared/ui-elements/CustomInput.vue"
import blueBtn from "../shared/ui-elements/BlueBtn.vue"
import useVuelidate from '@vuelidate/core'
import { required, email } from '@vuelidate/validators'
import axios from "axios";

export default {

    data: () => {
        return {
            v$: useVuelidate(),
            formData: {},
            formState: null,
            loading: true
        }
    },
    components: {
        customInput,
        blueBtn
    },
    methods: {
        getFieldErrorMessage(input) {
            let errorMessage = this.v$.formData[input].$silentErrors[0]?.$message;
            return this.v$.formData[input].$invalid ? errorMessage : '';
        },
        previousPage() {
            window.history.back()
        },
        async submitForm() {


            if (typeof grecaptcha !== undefined) {
                this.formState = 'loading';

                const token = await grecaptcha.execute('6Ld6dr8hAAAAAF9J5fcxNdvJE5fvibl-rhQOJxDX', { action: 'value-my-car' });

                try {
                    const response = await axios.post('/form/value-my-car', {
                        ...this.formData,
                        captchaResponse: token
                    });
                    if (response.status === 200 && response.data.success) {
                        this.formState = 'success';
                    } else {
                        this.formState = 'error';
                    }
                } catch (error) {
                    this.formState = 'error';
                }
            }
        }
    },
    validations: {
        formData: {
            firstName: {
                required
            },
            lastName: {
                required
            },
            email: {
                required,
                email
            },
            phone: {
              required
            },
            model: {
              required
            },
            manufacturer: {
              required
            },
            year: {
              required
            },
            vehicleCondition: {
              required
            }
        }
    }
}
</script>

<style>

</style>