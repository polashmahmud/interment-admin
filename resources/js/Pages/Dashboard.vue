<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { reactive, ref } from 'vue'
const form = reactive({
  name: '',
  region: '',
  date1: '',
  date2: '',
  delivery: false,
  type: [],
  resource: '',
  desc: '',
})


const dialogTableVisible = ref(false)
const gridData = [
  {
    date: '2016-05-02',
    name: 'John Smith',
    address: 'No.1518,  Jinshajiang Road, Putuo District',
  },
  {
    date: '2016-05-04',
    name: 'John Smith',
    address: 'No.1518,  Jinshajiang Road, Putuo District',
  },
  {
    date: '2016-05-01',
    name: 'John Smith',
    address: 'No.1518,  Jinshajiang Road, Putuo District',
  },
  {
    date: '2016-05-03',
    name: 'John Smith',
    address: 'No.1518,  Jinshajiang Road, Putuo District',
  },
]
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #card>
            <div class="grid grid-cols-4 lg:gap-6 xl:gap-8">
                <div class="p-5 border border-gray-300 rounded-md shadow">1</div>
                <div class="p-5 border border-gray-300 rounded-md shadow">2</div>
                <div class="p-5 border border-gray-300 rounded-md shadow min-h-32">3</div>
                <div class="p-5 border border-gray-300 rounded-md shadow">3</div>
            </div>
        </template>

        <div class="p-5 border border-gray-300 shadow-md rounded-xl">

            <div class="mb-5">
                <el-button plain @click="dialogTableVisible = true">
                    Open a Table with Dialog
                </el-button>

                <el-dialog v-model="dialogTableVisible" title="Shipping address" width="800">
                <el-table :data="gridData">
                    <el-table-column property="date" label="Date" width="150" />
                    <el-table-column property="name" label="Name" width="200" />
                    <el-table-column property="address" label="Address" />
                </el-table>
                </el-dialog>
            </div>
            
            <div>
                <el-form :model="form" label-width="auto" >
                    <el-form-item label="Activity name" inline="false">
                        <el-input v-model="form.name" />
                    </el-form-item>
                    <el-form-item label="Activity zone">
                        <el-select v-model="form.region" placeholder="please select your zone">
                        <el-option label="Zone one" value="shanghai" />
                        <el-option label="Zone two" value="beijing" />
                        </el-select>
                    </el-form-item>
                    <el-form-item label="Activity time">
                        <el-col :span="11">
                        <el-date-picker
                            v-model="form.date1"
                            type="date"
                            placeholder="Pick a date"
                            style="width: 100%"
                        />
                        </el-col>
                        <el-col :span="2" class="text-center">
                        <span class="text-gray-500">-</span>
                        </el-col>
                        <el-col :span="11">
                        <el-time-picker
                            v-model="form.date2"
                            placeholder="Pick a time"
                            style="width: 100%"
                        />
                        </el-col>
                    </el-form-item>
                    <el-form-item label="Instant delivery">
                        <el-switch v-model="form.delivery" />
                    </el-form-item>
                    <el-form-item label="Activity type">
                        <el-checkbox-group v-model="form.type">
                        <el-checkbox value="Online activities" name="type">
                            Online activities
                        </el-checkbox>
                        <el-checkbox value="Promotion activities" name="type">
                            Promotion activities
                        </el-checkbox>
                        <el-checkbox value="Offline activities" name="type">
                            Offline activities
                        </el-checkbox>
                        <el-checkbox value="Simple brand exposure" name="type">
                            Simple brand exposure
                        </el-checkbox>
                        </el-checkbox-group>
                    </el-form-item>
                    <el-form-item label="Resources">
                        <el-radio-group v-model="form.resource">
                        <el-radio value="Sponsor">Sponsor</el-radio>
                        <el-radio value="Venue">Venue</el-radio>
                        </el-radio-group>
                    </el-form-item>
                    <el-form-item label="Activity form">
                        <el-input v-model="form.desc" type="textarea" />
                    </el-form-item>
                    <el-form-item>
                        <el-button type="primary" @click="onSubmit">Create</el-button>
                        <el-button>Cancel</el-button>
                    </el-form-item>
                </el-form>
            </div>
        </div>
        <div class="grid grid-cols-1 gap-4 p-4 mt-4 border border-gray-300 shadow-md md:grid-cols-2 lg:grid-cols-3 lg:mt-6 xl:mt-8 lg:gap-6 xl:gap-8 lg:p-6 xl:p-8 rounded-xl">
            <div class="p-5 border border-gray-300 rounded-md shadow">1</div>
            <div class="p-5 border border-gray-300 rounded-md shadow">2</div>
            <div class="p-5 border border-gray-300 rounded-md shadow">3</div>
        </div>
        <template #rightSidebar>
            <div class="p-5 border border-gray-300 rounded-lg shadow-md">
                <div class="h-[712px]">
                    your content goes here. remove this div and add your contents
                </div>
            </div>
        </template>
    </AuthenticatedLayout>
</template>
