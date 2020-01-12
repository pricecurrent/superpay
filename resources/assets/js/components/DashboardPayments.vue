<template>
    <div>
        <nav class="mb-6">
            <ul class="flex list-reset">
                <li :class="{'border-b-2 border-teal-500 font-bold': activeTab == 'new'}" @click.prevent="activateTab('new')" class="flex-1 text-center px-10 py-2 sm:flex-grow-0 sm:text-left text-gray-700"><a href="#">New</a></li>
                <li :class="{'border-b-2 border-teal-500 font-bold': activeTab == 'sent'}" @click.prevent="activateTab('sent')" class="flex-1 text-center px-10 py-2 sm:flex-grow-0 sm:text-left text-gray-700"><a href="#">Sent</a></li>
                <li :class="{'border-b-2 border-teal-500 font-bold': activeTab == 'paid'}" @click.prevent="activateTab('paid')" class="flex-1 text-center px-10 py-2 sm:flex-grow-0 sm:text-left text-gray-700"><a href="#">Paid</a></li>
            </ul>
        </nav>
        <div class="sm:flex">
            <div v-for="payment in payments" class="mb-12 rounded shadow bg-white overflow-y-hidden sm:w-1/3 sm:mr-4">
                <div class="p-4 flex justify-between items-center">
                    <div>
                        <span class="text-gray-700 text-lg">$</span><span class="text-gray-700 text-xl font-semibold">{{ payment.amount }}</span>
                    </div>
                    <span class="text-sm text-teal-700 bg-teal-100 px-1 rounded-sm">{{ payment.created_at }}</span>
                </div>
                <div class="px-4 py-4 text-base text-gray-600">{{ payment.email }}</div>
                <div class="flex items-center justify-between">
                    <a :href="`/payments/${payment.id}`" class="flex items-center w-full text-sm text-center px-4 py-3 bg-teal-500 text-white hover:bg-gray-100 hover:text-teal-500">
                        <span class="inline-block w-full text-center">view payment</span>
                        <svg class="w-3 h-3 stroke-current text-teal-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 16 16 12 12 8"></polyline><line x1="8" y1="12" x2="16" y2="12"></line></svg>
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
