import { createApp } from 'vue'
import blueBtn from '../components/shared/ui-elements/BlueBtn.vue'
import cCustomInput from '../components/shared/ui-elements/CustomInput.vue'
import phoneNumberInput from '../components/shared/ui-elements/PhoneNumberInput.vue'

if (document.querySelector('#v-positions')) {
    createApp({
        components: {
            blueBtn,
            cCustomInput,
            phoneNumberInput,
        }
    }).mount('#v-positions')
}
