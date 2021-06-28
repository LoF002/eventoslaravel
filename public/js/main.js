const app = Vue.createApp({
    data() {
        return {
            qtyK: 0,
            qtyA: 0,
            selectedEvent: 0,
            total: 0,
            inventory: 0,
            availabel: true,
            isValidName: false,
            isValidEmail: false,
            email: "",
            name: "",
            events: [{
                    id: 101,
                    image: './img/event01.png',
                    title: 'Bajando la montaña',
                    'description': 'Let\'s get together to discuss the future of getting together. Introducing RECONVENE, a two-day virtual summit made by and for independent event makers and doers (we call them “creators”), featuring some of the most forward-thinking entrepreneurs, artists, producers, and promoters in the event world. You’ll also hear from some of the biggest stars in health, equity, and wellness. On Day One, you\'ll get access to the latest guidelines for re-opening. On Day Two, you\'ll get your hands dirty at workshops with some of your industry heroes and peers. We hope you\'ll join us to explore where the event world is heading — or better yet, where you\'d like to take it.',
                    location: 'Río Frío',
                    date: 'Thu, May 20, 2021, 1:00 PM CST',
                    category: 'Ciclismo',
                    priceA: 10000,
                    priceK: 5000,
                    available: true,
                    inventory: 10
                },
                {
                    id: 102,
                    image: './img/event02.png',
                    title: 'Ruta de los conquitadores',
                    'description': 'Let\'s get together to discuss the future of getting together. Introducing RECONVENE, a two-day virtual summit made by and for independent event makers and doers (we call them “creators”), featuring some of the most forward-thinking entrepreneurs, artists, producers, and promoters in the event world. You’ll also hear from some of the biggest stars in health, equity, and wellness. On Day One, you\'ll get access to the latest guidelines for re-opening. On Day Two, you\'ll get your hands dirty at workshops with some of your industry heroes and peers. We hope you\'ll join us to explore where the event world is heading — or better yet, where you\'d like to take it.',
                    location: 'Cariari',
                    date: 'Thu, May 20, 2021, 1:00 PM CST',
                    category: 'Ciclismo',
                    priceA: 20000,
                    priceK: 10000,
                    available: true,
                    inventory: 200
                },
                {
                    id: 103,
                    image: './img/event03.png',
                    title: 'Carrera de Atletismo',
                    'description': 'Let\'s get together to discuss the future of getting together. Introducing RECONVENE, a two-day virtual summit made by and for independent event makers and doers (we call them “creators”), featuring some of the most forward-thinking entrepreneurs, artists, producers, and promoters in the event world. You’ll also hear from some of the biggest stars in health, equity, and wellness. On Day One, you\'ll get access to the latest guidelines for re-opening. On Day Two, you\'ll get your hands dirty at workshops with some of your industry heroes and peers. We hope you\'ll join us to explore where the event world is heading — or better yet, where you\'d like to take it.',
                    location: 'Buenos Aires',
                    date: 'Thu, May 20, 2021, 1:00 PM CST',
                    category: 'Atletismo',
                    priceA: 8000,
                    priceK: 3000,
                    available: true,
                    inventory: 200
                },
                {
                    id: 103,
                    image: './img/event04.png',
                    title: 'Voleibol de playa',
                    'description': 'Let\'s get together to discuss the future of getting together. Introducing RECONVENE, a two-day virtual summit made by and for independent event makers and doers (we call them “creators”), featuring some of the most forward-thinking entrepreneurs, artists, producers, and promoters in the event world. You’ll also hear from some of the biggest stars in health, equity, and wellness. On Day One, you\'ll get access to the latest guidelines for re-opening. On Day Two, you\'ll get your hands dirty at workshops with some of your industry heroes and peers. We hope you\'ll join us to explore where the event world is heading — or better yet, where you\'d like to take it.',
                    location: 'Jicaral',
                    date: 'Thu, May 20, 2021, 1:00 PM CST',
                    category: 'Voleibol playa',
                    priceA: 5000,
                    priceK: 0,
                    available: true,
                    inventory: 200
                },
                {
                    id: 103,
                    image: './img/event05.png',
                    title: 'Natación',
                    'description': 'Let\'s get together to discuss the future of getting together. Introducing RECONVENE, a two-day virtual summit made by and for independent event makers and doers (we call them “creators”), featuring some of the most forward-thinking entrepreneurs, artists, producers, and promoters in the event world. You’ll also hear from some of the biggest stars in health, equity, and wellness. On Day One, you\'ll get access to the latest guidelines for re-opening. On Day Two, you\'ll get your hands dirty at workshops with some of your industry heroes and peers. We hope you\'ll join us to explore where the event world is heading — or better yet, where you\'d like to take it.',
                    location: 'Nauyaca',
                    date: 'Thu, May 20, 2021, 1:00 PM CST',
                    category: 'Natación',
                    priceA: 10000,
                    priceK: 0,
                    available: true,
                    inventory: 200
                },
                {
                    id: 103,
                    image: './img/event06.png',
                    title: 'Baloncesto',
                    'description': 'Let\'s get together to discuss the future of getting together. Introducing RECONVENE, a two-day virtual summit made by and for independent event makers and doers (we call them “creators”), featuring some of the most forward-thinking entrepreneurs, artists, producers, and promoters in the event world. You’ll also hear from some of the biggest stars in health, equity, and wellness. On Day One, you\'ll get access to the latest guidelines for re-opening. On Day Two, you\'ll get your hands dirty at workshops with some of your industry heroes and peers. We hope you\'ll join us to explore where the event world is heading — or better yet, where you\'d like to take it.',
                    location: 'Esparza',
                    date: 'Thu, May 20, 2021, 1:00 PM CST',
                    category: 'Baloncesto',
                    priceA: 12000,
                    priceK: 0,
                    available: true,
                    inventory: 200
                }
            ]
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