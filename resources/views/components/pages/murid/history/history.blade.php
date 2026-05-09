<div class="min-h-screen mt-5 space-y-5">
    <div class="filter flex gap-4 sm:flex-row flex-col">
        {{-- search --}}
        <div class="search flex relative flex-1">
            <iconify-icon icon="mdi:search" width="24" height="24" class="absolute right-4 top-1"></iconify-icon>
            <input type="text" name="search" id="search" placeholder="Search..."
                class="rounded-xl shadow-md bg-card border-card font-label px-4 py-1 w-full">
        </div>
        <div class="flex gap-4 justify-center">
            {{-- filter-type --}}
            <div class="flex justify-center font-label shadow-md">
                <div x-data="{
                    open: false,
                    toggle() {
                        if (this.open) {
                            return this.close()
                        }
                
                        this.$refs.button.focus()
                
                        this.open = true
                    },
                    close(focusAfter) {
                        if (!this.open) return
                
                        this.open = false
                
                        focusAfter && focusAfter.focus()
                    }
                }" x-on:keydown.escape.prevent.stop="close($refs.button)"
                    x-on:focusin.window="! $refs.panel.contains($event.target) && close()" x-id="['dropdown-button']"
                    class="relative">
                    <!-- Button -->
                    <button x-ref="button" x-on:click="toggle()" :aria-expanded="open"
                        :aria-controls="$id('dropdown-button')" type="button"
                        class="relative flex items-center whitespace-nowrap justify-center gap-2 py-1 rounded-lg shadow-sm bg-muted hover:bg-gray-300 text-muted-foreground border border-card hover:border-card px-4">
                        <iconify-icon icon="mdi:filter-outline" width="24" height="24"></iconify-icon>
                        <span>Semua Tipe</span>

                        <!-- Heroicon: micro chevron-down -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                            <path fill-rule="evenodd"
                                d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>

                    <!-- Panel -->
                    <div x-ref="panel" x-show="open" x-transition.origin.top.left
                        x-on:click.outside="close($refs.button)" :id="$id('dropdown-button')" x-cloak
                        class="absolute left-0 min-w-48 rounded-lg shadow-sm mt-2 z-10 origin-top-left bg-muted p-1.5 outline-none border border-gray-200">
                        <a href="#pemasukan"
                            class="px-2 lg:py-1.5 py-2 w-full flex items-center rounded-md transition-colors text-left text-muted-foreground hover:bg-gray-300 focus-visible:bg-gray-300 disabled:opacity-50 disabled:cursor-not-allowed">
                            Pemasukan
                        </a>

                        <a href="#pengeluaran"
                            class="px-2 lg:py-1.5 py-2 w-full flex items-center rounded-md transition-colors text-left text-muted-foreground hover:bg-gray-300 focus-visible:bg-gray-300 disabled:opacity-50 disabled:cursor-not-allowed">
                            Pengeluaran
                        </a>
                    </div>
                </div>
            </div>
            {{-- filter time --}}
            <div class="flex justify-center font-label shadow-md">
                <div x-data="{
                    open: false,
                    toggle() {
                        if (this.open) {
                            return this.close()
                        }
                
                        this.$refs.button.focus()
                
                        this.open = true
                    },
                    close(focusAfter) {
                        if (!this.open) return
                
                        this.open = false
                
                        focusAfter && focusAfter.focus()
                    }
                }" x-on:keydown.escape.prevent.stop="close($refs.button)"
                    x-on:focusin.window="! $refs.panel.contains($event.target) && close()" x-id="['dropdown-button']"
                    class="relative">
                    <!-- Button -->
                    <button x-ref="button" x-on:click="toggle()" :aria-expanded="open"
                        :aria-controls="$id('dropdown-button')" type="button"
                        class="relative flex items-center whitespace-nowrap justify-center gap-2 py-1 rounded-lg shadow-sm bg-muted hover:bg-gray-300 text-muted-foreground border border-card hover:border-card px-4">
                        <iconify-icon icon="mdi:filter-outline" width="24" height="24"></iconify-icon>
                        <span>Waktu</span>

                        <!-- Heroicon: micro chevron-down -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                            <path fill-rule="evenodd"
                                d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>

                    <!-- Panel -->
                    <div x-ref="panel" x-show="open" x-transition.origin.top.left
                        x-on:click.outside="close($refs.button)" :id="$id('dropdown-button')" x-cloak
                        class="absolute left-0 min-w-48 rounded-lg shadow-sm mt-2 z-10 origin-top-left bg-muted p-1.5 outline-none border border-gray-200">
                        <a href="#pemasukan"
                            class="px-2 lg:py-1.5 py-2 w-full flex items-center rounded-md transition-colors text-left text-muted-foreground hover:bg-gray-300 focus-visible:bg-gray-300 disabled:opacity-50 disabled:cursor-not-allowed">
                            Pemasukan
                        </a>

                        <a href="#pengeluaran"
                            class="px-2 lg:py-1.5 py-2 w-full flex items-center rounded-md transition-colors text-left text-muted-foreground hover:bg-gray-300 focus-visible:bg-gray-300 disabled:opacity-50 disabled:cursor-not-allowed">
                            Pengeluaran
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- history list --}}
    <div class="history flex">
        <div class="onMonth shadow-md rounded-xl bg-card text-cardForeground w-full p-4">
            <div class="title flex justify-between items-center">
                <div class="relative">
                    <div class="left flex items-center">
                        <iconify-icon icon="mdi:calendar" width="24" height="24" class="absolute"></iconify-icon>
                        <h2 class="ml-8 font-heading font-md text-lg">Bulan Ini</h2>
                    </div>
                </div>
                <div class="right">
                    <h2 class="font-label text-primary text-xl font-medium">Rp 150.000</h2>
                </div>
            </div>
            <hr class="mt-3 h-0.5 border-muted">
            <div class="historyList font-label flex gap-2 flex-col">
                {{-- pemasukan --}}
                <div
                    class="pemasukan flex mt-2 px-4 py-2 bg-success-secondary/15 rounded-full justify-between items-center">
                    {{-- left --}}
                    <div class="left flex items-center gap-4">
                        <div class="icon">
                            <div class="bg-success rounded-full p-2 flex justify-center items-center">
                                <iconify-icon icon="mdi:chevron-up" width="24" height="24"
                                    class="text-white"></iconify-icon>
                            </div>
                        </div>
                        <div class="text">
                            <h3 class="text-cardForeground text-md">Bayar Kas - Name</h3>
                            <p class="text-mutedForeground text-sm">6 Mei 2026</p>
                        </div>
                    </div>
                    {{-- right --}}
                    <div class="right">
                        <h3 class="text-success text-md">+Rp 100.000</h3>
                    </div>
                </div>
                {{-- pengeluaran --}}
                <div
                    class="pengeluaran flex px-4 py-2 bg-destructive-secondary/15 rounded-full justify-between items-center">
                    {{-- left --}}
                    <div class="left flex items-center gap-4">
                        <div class="icon">
                            <div class="bg-destructive rounded-full p-2 flex justify-center items-center">
                                <iconify-icon icon="mdi:chevron-down" width="24" height="24"
                                    class="text-white"></iconify-icon>
                            </div>
                        </div>
                        <div class="text">
                            <h3 class="text-cardForeground text-md">Pengeluaran - Name</h3>
                            <p class="text-mutedForeground text-sm">6 Mei 2026</p>
                        </div>
                    </div>
                    {{-- right --}}
                    <div class="right">
                        <h3 class="text-destructive">-Rp 50.000</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- month list --}}
    <div class="month flex">
        <div class="onMonth shadow-md rounded-xl bg-card text-cardForeground w-full p-4">
            <div class="title flex justify-between items-center">
                <div class="relative">
                    <div class="left flex items-center">
                        <iconify-icon icon="mdi:calendar" width="24" height="24"
                            class="absolute"></iconify-icon>
                        <h2 class="ml-8 font-heading font-md text-lg">April</h2>
                    </div>
                </div>
                <div class="right">
                    <h2 class="font-label text-primary text-xl font-medium">Rp 150.000</h2>
                </div>
            </div>
            <hr class="mt-3 h-0.5 border-muted">
            <div class="historyList font-label flex gap-2 flex-col">
                {{-- pemasukan --}}
                <div
                    class="pemasukan flex mt-2 px-4 py-2 bg-success-secondary/15 rounded-full justify-between items-center">
                    {{-- left --}}
                    <div class="left flex items-center gap-4">
                        <div class="icon">
                            <div class="bg-success rounded-full p-2 flex justify-center items-center">
                                <iconify-icon icon="mdi:chevron-up" width="24" height="24"
                                    class="text-white"></iconify-icon>
                            </div>
                        </div>
                        <div class="text">
                            <h3 class="text-cardForeground text-md">Bayar Kas - Name</h3>
                            <p class="text-mutedForeground text-sm">6 Mei 2026</p>
                        </div>
                    </div>
                    {{-- right --}}
                    <div class="right">
                        <h3 class="text-success text-md">+Rp 100.000</h3>
                    </div>
                </div>
                {{-- pengeluaran --}}
                <div
                    class="pengeluaran flex px-4 py-2 bg-destructive-secondary/15 rounded-full justify-between items-center">
                    {{-- left --}}
                    <div class="left flex items-center gap-4">
                        <div class="icon">
                            <div class="bg-destructive rounded-full p-2 flex justify-center items-center">
                                <iconify-icon icon="mdi:chevron-down" width="24" height="24"
                                    class="text-white"></iconify-icon>
                            </div>
                        </div>
                        <div class="text">
                            <h3 class="text-cardForeground">Pengeluaran - Name</h3>
                            <p class="text-mutedForeground">6 Mei 2026</p>
                        </div>
                    </div>
                    {{-- right --}}
                    <div class="right">
                        <h3 class="text-destructive">-Rp 50.000</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
