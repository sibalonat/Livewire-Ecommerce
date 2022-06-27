<form action="">
    <div class="grid grid-flow-col grid-cols-6 gap-4 overflow-hidden sm:rounded-lg">
        <div class="self-start col-span-3 p-6 space-y-6 bg-white border-b border-gray-200">
            <div class="space-y-3">
                <div class="text-lg font-semibold"> Account details </div>
            </div>
            <label for="email">Email</label>
            <x-input id="email" class="block w-full mt-1" type="text" name="email" />
            <div class="mt-2 font-semibold text-red-500">An error occured</div>

        </div>
    </div>
    <div class="space-y-3">
        <div class="text-lg font-semibold"> Shipping </div>
        <x-select class="w-full">
            <option value="">Chose pre-saved address</option>
            <option value="">Chose pre-saved address</option>
        </x-select>

        <div class="space-y-3">
            <div>
                <label for="address">Address</label>
                <x-input id="address" class="block w-full mt-1" type="text" name="address" />
                <div class="mt-2 font-semibold text-red-500">An error occured</div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="col-span-1">
                    <label for="address">City</label>
                    <x-input id="address" class="block w-full mt-1" type="text" name="address" />
                    <div class="mt-2 font-semibold text-red-500">An error occured</div>
                </div>
            </div>
        </div>
    </div>
</form>
