// 20:35 in the video
<div>
    <h1 class="text-2xl font-semibold text-gray-900">Dashboard</h1>

    <div class="py-4 space-y-4">
        <div>
            <div class="w-1/4">
                <x-input.text wire:model="search"
                              placeholder="Search Transactions"/>
            </div>
        </div>

        <div class="flex-col space-y-4">
            <x-table>
            <x-slot name="head">
                <x-table.heading sortable wire:click="sortBy('title')" :direction="$sortField === 'title' ? $sortDirection : null">Title</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('amount')" :direction="$sortField === 'amount' ? $sortDirection : null">Amount</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('status')" :direction="$sortField === 'status' ? $sortDirection : null">Status</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('date')" :direction="$sortField === 'date' ? $sortDirection : null">Date</x-table.heading>
                <x-table.heading />
            </x-slot>

            <x-slot name="body">
                @forelse ($transactions as $transaction)
                <x-table.row wire:loading.class.delay="opacity-25">
                    <x-table.cell>
                        <span href="#" class="inline-flex space-x-2 truncate text-sm leading-5">
                            <x-icon.cash class="text-cool-gray-400"/>

                            <p class="text-cool-gray-600 truncate">
                                {{ $transaction->title }}
                            </p>
                        </span>
                    </x-table.cell>

                    <x-table.cell>
                        <span class="text-cool-gray-900 font-medium">${{ $transaction->amount }} </span> USD
                    </x-table.cell>

                    <x-table.cell>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-{{ $transaction->status_color }}-100 text-{{ $transaction->status_color }}-800 capitalize">
                            {{ $transaction->status }}
                        </span>
                    </x-table.cell>

                    <x-table.cell>
                        {{ $transaction->date_for_humans }}
                    </x-table.cell>

                    <x-table.cell>
                        <x-button.link wire:click="edit({{ $transaction->id }})">Edit</x-button.link>
                    </x-table.cell>
                </x-table.row>
                @empty
                    <x-table.row wire:loading.class.delay="opacity-25">
                        <x-table.cell colspan="4">
                            <div class="flex justify-center items-center space-x-2">
                                <x-icon.inbox class="h-8 w-8 text-cool-gray-400"/>
                                <span class="py-8 font-medium text-cool-gray-400 text-xl">No transactions found...</span>
                            </div>
                        </x-table.cell>
                    </x-table.row>
                @endforelse
            </x-slot>
        </x-table>

            <div>
                {{ $transactions->links() }}
            </div>
        </div>
    </div>

    <form wire:submit.prevent="save">
        <x-modal.dialog wire:model.defer="showEditModal">
        <x-slot name="title">Edit Transaction</x-slot>

        <x-slot name="content">
            <x-input.group for="title" label="Title" :error="$errors->first('editing.title')">
                <x-input.text wire:model="editing.title" id="title" />
            </x-input.group>

            <x-input.group for="amount" label="Amount" :error="$errors->first('editing.amount')">
                <x-input.money wire:model="editing.amount" id="amount" />
            </x-input.group>

            <x-input.group for="status" label="Status" :error="$errors->first('editing.status')">
                <x-input.select wire:model="editing.status" id="status">
                    @foreach(\App\Models\Transaction::STATUSES as $value => $label)
                    <option value="{{ $value }}">{{ $label }}</option>
                    @endforeach
                </x-input.select>
            </x-input.group>

            <x-input.group for="date" label="Date" :error="$errors->first('editing.date')">
                <x-input.text wire:model="editing.date" id="date" />
            </x-input.group>
        </x-slot>

        <x-slot name="footer">
            <x-button.secondary>Cancel</x-button.secondary>
            <x-button.primary type="submit">Save</x-button.primary>
        </x-slot>
    </x-modal.dialog>
    </form>
</div>
