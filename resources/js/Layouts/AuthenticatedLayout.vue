<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';
import { Search } from '@element-plus/icons-vue'
import {
  Document,
  Menu as IconMenu,
  Location,
  Postcard,
  Odometer,
  Connection,
  User,
  Coin,
  Message,
  Setting,
  Pointer
} from '@element-plus/icons-vue'

const showingNavigationDropdown = ref(false);
// bg-green-500 xs:bg-pink-500 sm:bg-blue-500 md:bg-orange-500 lg:bg-purple-500 xl:bg-emerald-500 2xl:bg-white
</script>

<template>
    <div>
        <div class="min-h-[calc(100vh-80px)] bg-white">
            <nav class="fixed z-50 top-0 lg:w-[calc(100%-256px)] xl:w-[calc(100%-288px)] px-4 mx-auto bg-white border-b border-gray-200 ml-64 xl:ml-72 sm:px-6 lg:px-8">
                <!-- Primary Navigation Menu -->
                <div class="">
                    <div class="flex justify-between h-20">
                        <div class="flex flex-col justify-center">
                            <h3 class="text-xl font-semibold text-gray-800 font-Inter">Hello, Neil 👋 </h3>
                            <p class="text-base font-semibold font-nunito">Welcome to your Dashboard</p>
                        </div>

                        <div class="sm:flex sm:items-center sm:ms-6">
                            <!-- Dropdowns -->
                            <div class="relative flex items-center gap-5 ms-3">

                                <el-input
                                    v-model="input2"
                                    style="width: 240px"
                                    placeholder="Please Input"
                                    size="large"
                                    :suffix-icon="Search"
                                    />

                                <!-- Settings -->
                                <Dropdown align="right">
                                    <template #trigger>
                                            <button
                                                type="button"
                                                class="p-2 text-gray-600 border border-gray-300 rounded-full"
                                            >
                                            <svg data-slot="icon" class="w-6 h-6" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527a1.125 1.125 0 0 1 1.45.12l.773.774c.39.389.44 1.002.12 1.45l-.527.737c-.25.35-.272.806-.107 1.204.165.397.505.71.93.78l.893.15c.543.09.94.559.94 1.109v1.094c0 .55-.397 1.02-.94 1.11l-.894.149c-.424.07-.764.383-.929.78-.165.398-.143.854.107 1.204l.527.738c.32.447.269 1.06-.12 1.45l-.774.773a1.125 1.125 0 0 1-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.398.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125 1.125 0 0 1-.12-1.45l.527-.737c.25-.35.272-.806.108-1.204-.165-.397-.506-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.108-1.204l-.526-.738a1.125 1.125 0 0 1 .12-1.45l.773-.773a1.125 1.125 0 0 1 1.45-.12l.737.527c.35.25.807.272 1.204.107.397-.165.71-.505.78-.929l.15-.894Z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path></svg>
                                            </button>
                                    </template>

                                    <template #content>
                                        <div class="w-40 p-3">
                                            Setting related contents
                                        </div>
                                    </template>
                                </Dropdown>

                                <!-- Notifications -->
                                <Dropdown align="right">
                                    <template #trigger>
                                            <button
                                                type="button"
                                                class="p-2 text-gray-600 border border-gray-300 rounded-full"
                                            >
                                            <svg data-slot="icon" class="w-6 h-6" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0M3.124 7.5A8.969 8.969 0 0 1 5.292 3m13.416 0a8.969 8.969 0 0 1 2.168 4.5"></path></svg>
                                            </button>
                                    </template>

                                    <template #content>
                                        <div class="w-40 p-3">
                                            Notifications goes here
                                        </div>
                                    </template>
                                </Dropdown>

                                <!-- User -->
                                <Dropdown align="right">
                                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button
                                                type="button"
                                                class="inline-flex items-center py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md hover:text-gray-700 focus:outline-none"
                                            >
                                                <img class="object-cover w-10 h-10 rounded-full" src="https://avatars.githubusercontent.com/u/8996190?v=4" alt="">

                                                <svg
                                                    class="ms-1 -me-0.5 h-6 w-6"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                >
                                                    <path
                                                        fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"
                                                    />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <DropdownLink :href="route('profile.edit')"> Profile </DropdownLink>
                                        <DropdownLink :href="route('logout')" method="post" as="button">
                                            Log Out
                                        </DropdownLink>
                                    </template>
                                </Dropdown>
                            </div>
                        </div>

                        <!-- Hamburger -->
                        <div class="flex items-center -me-2 sm:hidden">
                            <button
                                @click="showingNavigationDropdown = !showingNavigationDropdown"
                                class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500"
                            >
                                <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path
                                        :class="{
                                            hidden: showingNavigationDropdown,
                                            'inline-flex': !showingNavigationDropdown,
                                        }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"
                                    />
                                    <path
                                        :class="{
                                            hidden: !showingNavigationDropdown,
                                            'inline-flex': showingNavigationDropdown,
                                        }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div
                    :class="{ block: showingNavigationDropdown, hidden: !showingNavigationDropdown }"
                    class="sm:hidden"
                >
                    <div class="pt-2 pb-3 space-y-1">
                        <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">
                            Dashboard
                        </ResponsiveNavLink>
                    </div>

                    <!-- Responsive Settings Options -->
                    <div class="pt-4 pb-1 border-t border-gray-200">
                        <div class="px-4">
                            <div class="text-base font-medium text-gray-800">
                                {{ $page.props.auth.user.name }}
                            </div>
                            <div class="text-sm font-medium text-gray-500">{{ $page.props.auth.user.email }}</div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <ResponsiveNavLink :href="route('profile.edit')"> Profile </ResponsiveNavLink>
                            <ResponsiveNavLink :href="route('logout')" method="post" as="button">
                                Log Out
                            </ResponsiveNavLink>
                        </div>
                    </div>
                </div>
            </nav>

            <div>
                <!-- layout sidebar start-->
                <div class="fixed top-0 h-screen overflow-y-auto bg-white border-r border-gray-200 lg:w-64 xl:w-72">
                    <!-- Logo -->
                    <div class="fixed top-0 flex items-center justify-center py-5 mx-auto text-center left-5">
                        <Link :href="route('dashboard')">
                            <ApplicationLogo
                                class="block w-auto text-gray-800 fill-current h-9"
                            />
                        </Link>
                    </div>

                    <div class="pt-20">
                        <el-menu
                            default-active="1"
                            class="el-menu-vertical-demo"
                            @open="handleOpen"
                            @close="handleClose"
                        >
                            <el-menu-item index="1">
                                <el-icon><icon-menu /></el-icon>
                                <span>Dashboard</span>
                            </el-menu-item>
                            <el-menu-item index="2">
                                <el-icon><document /></el-icon>
                                <span>Document</span>
                            </el-menu-item>
                            <el-menu-item index="3">
                                <el-icon><Postcard /></el-icon>
                                <span>Funds</span>
                            </el-menu-item>
                            <el-menu-item index="4">
                                <el-icon><Coin /></el-icon>
                                <span>Investors</span>
                            </el-menu-item>
                            <el-menu-item index="5">
                                <el-icon><User /></el-icon>
                                <span>Contacts</span>
                            </el-menu-item>
                            <el-menu-item index="6">
                                <el-icon><Message /></el-icon>
                                <span>Communications</span>
                            </el-menu-item>
                            <el-menu-item index="7">
                                <el-icon><Connection /></el-icon>
                                <span>Reports</span>
                            </el-menu-item>
                            <el-menu-item index="8">
                                <el-icon><Odometer /></el-icon>
                                <span>Administration</span>
                            </el-menu-item>
                            <div class="w-[calc(100%-40px)] left-0 right-0 my-5 mx-auto h-px bg-gray-300"></div>
                            <el-menu-item index="9">
                                <el-icon><setting /></el-icon>
                                <span>Settings</span>
                            </el-menu-item>
                            <el-menu-item index="10">
                                <el-icon><Pointer /></el-icon>
                                <span>Logout</span>
                            </el-menu-item>
                        </el-menu>
                    </div>
                </div>
                <!-- layout sidebar end -->
                <!-- main content start -->
                <div class="lg:w-[calc(100%-256px)] xl:w-[calc(100%-288px)] mt-20 lg:ml-64 xl:ml-72 lg:p-6 xl:p-8">
                    <!-- Page Content -->
                    <main>
                        <!-- top cards starts -->
                        <div v-if="$slots.card">
                            <div class="lg:mb-6 xl:mb-8">
                                <slot name="card" />
                            </div>
                        </div>
                        <!-- top cards ends -->

                        <div class="grid grid-cols-12 lg:gap-6 xl:gap-8">
                            <!-- content start -->
                            <div class="col-span-8">
                                <div>
                                    <slot/>
                                </div>
                            </div>
                            <!-- content end -->
                            <!-- content sidebar start -->
                            <div class="col-span-4 offset-8" v-if="$slots.rightSidebar">
                                <div class="rounded-lg">
                                    <slot name="rightSidebar"/>
                                </div>
                            </div>
                            <!-- content sidebar end -->
                        </div>
                    </main>
                </div>
                <!-- main content end -->
            </div>
        </div>
    </div>
</template>

<style>
::-webkit-scrollbar {
  width: 0px;
}
.el-menu {
    border-right: 0;
}
.el-menu-item,
.el-sub-menu__title {
    font-size: 18px;
    font-family: "Nunito", 'sans-serif';
    font-weight: 500;
    line-height: 24px;
    color: #505968;
}

.el-menu-item:hover,
.el-sub-menu__title:hover {
    background-color: transparent;
    color: #092C4C;
}

.el-menu-item.is-active {
    position: relative;
    color: #092C4C;
}
.el-menu-item.is-active::before {
    position: absolute;
    content: "";
    width: 40px;
    height: 50%;
    background-color: #2370F8;
    left: -36px;
    top: 0;
    bottom: 0;
    margin: auto;
    border-top-right-radius: 7px;
    border-bottom-right-radius: 7px;
}

.el-input__wrapper {
    border-radius: 8px;
}

</style>
