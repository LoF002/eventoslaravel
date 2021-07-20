const app = Vue.createApp({
    data() {
        return {
            qtyK: 0,
            qtyA: 0,
            total: 0,
            availabel: true,
            isValidName: false,
            isValidEmail: false,
        }
    },
    methods: {
        showEventDetails(index) {
            this.selectedEvent = index;
        },
        checkInventory(){
            let allqty = 0;
            allqty += Number(this.qtyK) + Number(this.qtyA);
            console.log(allqty);
            if(allqty > this.events[this.selectedEvent].inventory){
                this.availabel=false;
            }else{
                this.availabel=true;
            }
        },
        chargeTotal(total) {
            this.total = total;
        },
        checkName(){
            if(this.name.length >= 3){
                this.isValidName=true;
            }else{
                this.isValidName=false;
            }
        },
        validateEmail (email) {
            return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)
        },
        checkEmail(){
            if(this.validateEmail(this.email)){
                this.isValidEmail=true;
            }else{
                this.isValidEmail=false;
            }
        }
    }
});