<template>
    <div>
        <nav class="mb-6">
            <ul class="flex list-reset">
                <li :class="{'active-tab': activeTab == 'new'}" @click.prevent="activateTab('new')" class="px-10 py-2"><a href="#">New</a></li>
                <li :class="{'active-tab': activeTab == 'sent'}" @click.prevent="activateTab('sent')" class="px-10 py-2"><a href="#">Sent</a></li>
                <li :class="{'active-tab': activeTab == 'paid'}" @click.prevent="activateTab('paid')" class="px-10 py-2"><a href="#">Paid</a></li>
            </ul>
        </nav>
        <div class="lg:flex">
            <div v-for="payment in payments" class="flex flex-col justify-between lg:w-1/3 h-48 rounded-lg shadow bg-white p-6 mr-5 mb-12">
                <h2 class="font-normal text-lg text-grey-dark">{{ payment.email }}</h2>
                <div class="text-3xl font-bold text-black"><span class="text-2xl">$</span>{{ payment.amount }}</div>
                <div class="flex-end flex items-center justify-between -m-6 px-6 py-3 bg-grey-lighter text-right shadow-inner">
                    <span class="text-grey-dark text-sm">{{ payment.created_at }}</span>
                    <a :href="`/payments/${payment.id}`" class="flex items-center px-4 rounded-full text-teal">
                        <span>view payment</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-4 ml-1 icon-arrow-thin-right-circle"><circle cx="12" cy="12" r="10" class="primary"/><path class="secondary" d="M14.59 13H7a1 1 0 0 1 0-2h7.59l-2.3-2.3a1 1 0 1 1 1.42-1.4l4 4a1 1 0 0 1 0 1.4l-4 4a1 1 0 0 1-1.42-1.4l2.3-2.3z"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    const payments = [
        {id: 1, email: 'jason@gmail.com', amount: 50, created_at: '09 Jan 2019', code: 'TESTCODE12345'},
        {id: 2, email: 'bradley@cooper.com', amount: 70.5, created_at: '04 Jan 2019', code: 'TESTCODE54321'},
        {id: 3, email: 'jason@backs.com', amount: 103, created_at: '01 Jan 2019', code: 'SOMECODE123'},
    ]
    export default {
        data() {
            return {
                payments: payments,
                activeTab: 'new'
            }
        },
        methods: {
            fetch() {
                // axios.get('...')
            },
            activateTab(tab) {
                this.activeTab = tab
                this.fetch()
            }
        },
    }
</script>
