<template>
    <div class="container">

        <Toolbar>
            <template #start>
                <span class="font-semibold text-2xl">Gift Cards</span>
            </template>


            <template #end>
                <Button icon="pi pi-sign-out" @click="signOut" />
            </template>
        </Toolbar>

        <div class="mt-3">
            <DataTable id="datatable-facturas" v-model:filters="dataTableConfig.filters" :value="giftCards" paginator
                showGridlines :rows="dataTableConfig.rows" :rowsPerPageOptions="dataTableConfig.rowsPerPageOptions"
                dataKey="id" filterDisplay="menu" class="p-datatable-sm" tableStyle="min-width: 65rem;"
                :globalFilterFields="dataTableConfig.globalFilterFields"
                :paginatorTemplate="dataTableConfig.paginatorTemplate"
                currentPageReportTemplate="Página {currentPage} de {totalPages}">
                <template #header>
                    <div class="flex flex-column md:flex-row justify-content-between">
                        <Button icon="pi pi-plus" label="Nueva Gift Card" severity="success"
                            @click="toggleNewGiftCardFormModal" />

                        <span class="p-input-icon-left mt-2 xl:mt-0">
                            <i class="pi pi-search" />
                            <InputText v-model="dataTableConfig.filters['global'].value" class="w-full xl:w-auto"
                                placeholder="Buscador general" />
                        </span>
                    </div>
                </template>
                <Column field="code" sortable header="CÓDIGO" headerClass="w-8rem">
                    <template #body="{ data }" class="text-center">
                        <div class="font-semibold">{{ data.code }}</div>
                    </template>
                </Column>
                <Column field="name" sortable header="PERSONA" headerClass="w-12rem"></Column>
                <Column field="mount" sortable header="MONTO" headerClass="w-6rem">
                    <template #body="{ data }" class="text-center">
                        <div class="text-center">{{ formatMonto(data.mount) }}</div>
                    </template>
                </Column>
                <Column field="dateIssue" filterField="dateIssue" dataType="date" sortable header="FECHA DE EMISIÓN"
                    headerClass="w-12rem">
                    <template #body="{ data }" class="text-center">
                        <div class="text-center">{{ formatDate(data.dateIssue) }}</div>
                    </template>
                    <template #filter="{ filterModel }">
                        <Calendar v-model="filterModel.value" dateFormat="dd/mm/yy" placeholder="mm/dd/yyyy"
                            mask="99/99/9999" />
                    </template>
                </Column>
                <Column field="dateExpired" filterField="dateExpired" dataType="date" sortable header="FECHA DE EXPIRACIÓN"
                    headerClass="w-12rem">
                    <template #body="{ data }" class="text-center">
                        <div class="text-center">{{ formatDate(data.dateExpired) }}</div>
                    </template>
                    <template #filter="{ filterModel }">
                        <Calendar v-model="filterModel.value" dateFormat="dd/mm/yy" placeholder="mm/dd/yyyy"
                            mask="99/99/9999" />
                    </template>
                </Column>
                <Column field="status.description" sortable header="ESTADO" headerClass="w-6rem">
                    <template #body="{ data }" class="text-center">
                        <div class="w-full flex justify-content-center">
                            <Tag :value="data.status.description.toUpperCase()" class="text-md"
                                :severity="status.find(s => s.keycode == data.status.keycode).severity" />
                        </div>
                    </template>
                </Column>
                <Column header="" headerClass="w-3rem" bodyClass="w-5rem">
                    <template #body="{ data }" class="text-center">
                        <div class="w-full text-center">
                            <Button icon="pi pi-eye" severity="info" @click="toggleDetailGiftCardFormModal(data)" />
                            <Button icon="pi pi-trash" class="ml-2" severity="danger" @click="deleteGiftCard(data.id)" />
                        </div>
                    </template>
                </Column>



                <template #footer> Mostrando un total de {{ giftCards.length }} facturas </template>

            </DataTable>
        </div>
    </div>
    <NewGiftCardForm :visible="showNewGiftCardForm" @onSaveUser="reloadGiftCards" @closeModal="toggleNewGiftCardFormModal">
    </NewGiftCardForm>
    <DetailGiftCardForm :visible="showDetailGiftCardForm" :giftCardSelected="giftCardSelected" @onSaveUser="reloadGiftCards"
        @closeModal="toggleDetailGiftCardFormModal"></DetailGiftCardForm>
</template>
<script>
import { TokenManagment } from '../../shared/classes/TokenManagment';
import { FilterMatchMode, FilterOperator } from 'primevue/api';
import NewGiftCardForm from './components/NewGiftCardForm.vue';
import DetailGiftCardForm from './components/DetailGiftCardForm.vue';
export default {
    components: {
        NewGiftCardForm,
        DetailGiftCardForm
    },
    data() {
        return {
            giftCards: [],
            dataTableConfig: {
                rows: 20,
                rowsPerPageOptions: [10, 20, 50, 100],
                globalFilterFields: ['code', 'name', 'status.description'],
                paginatorTemplate: "RowsPerPageDropdown FirstPageLink PrevPageLink CurrentPageReport NextPageLink LastPageLink",
                filters: {
                    global: { value: null, matchMode: FilterMatchMode.CONTAINS },
                    dateIssue: { operator: FilterOperator.AND, constraints: [{ value: null, matchMode: FilterMatchMode.DATE_IS }] },
                    dateExpired: { operator: FilterOperator.AND, constraints: [{ value: null, matchMode: FilterMatchMode.DATE_IS }] },
                }
            },
            status: [
                {
                    keycode: 'vigente',
                    severity: 'info'
                },
                {
                    keycode: 'canjeado',
                    severity: 'warning'
                },
                {
                    keycode: 'anulado',
                    severity: 'danger'
                },
                {
                    keycode: 'vencido',
                    severity: 'success'
                },
            ],
            showNewGiftCardForm: false,
            showDetailGiftCardForm: false,
            giftCardSelected: null,
        }
    },
    created() {
        this.loadGiftCards();
    },
    methods: {
        signOut() {
            TokenManagment.clear();
            this.$router.push({ name: 'Login' });
        },
        loadGiftCards() {
            this.$axios.get('/api/gift-card/all').then(response => {

                this.giftCards = response.data.map(d => {
                    return {
                        ...d,
                        dateExpired: new Date(d.dateExpired),
                        dateIssue: new Date(d.dateIssue)
                    }
                });
            })
        },
        formatMonto(value) {
            return new Intl.NumberFormat('es-PE', { style: 'currency', currency: 'PEN' }).format(
                value
            )
        },
        formatDate(value) {
            try {
                return new Date(value).toLocaleDateString('es-PE', {
                    day: '2-digit',
                    month: '2-digit',
                    year: 'numeric'
                });
            } catch {
                return ''
            }
        },
        deleteGiftCard(id) {
            this.$axios.post('/api/gift-card/delete/' + id).then(response => {
                this.reloadGiftCards();
            })
        },
        toggleNewGiftCardFormModal() {
            this.showNewGiftCardForm = !this.showNewGiftCardForm;
        },
        toggleDetailGiftCardFormModal(giftCard) {
            this.giftCardSelected = giftCard
            this.showDetailGiftCardForm = !this.showDetailGiftCardForm;
        },
        reloadGiftCards() {
            this.loadGiftCards();
            this.showDetailGiftCardForm = false;
            this.showNewGiftCardForm = false;
        }
    }
}
</script>
<style scoped>
.container {
    margin-left: 8rem;
    margin-right: 8rem;
    margin-top: 2rem;
    margin-bottom: 2rem;

}
</style>