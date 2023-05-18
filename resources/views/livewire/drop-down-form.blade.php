<div>
    <div class="my-6 space-y-2 text-center text-xl">
        <label for="make" class="capitalize">make</label>
        <select wire:model="selectedMake" name="make_id" class="px-8 py-2 rounded-md bg-gray-200 block">
            <option selected value="">Choose make</option>
            @foreach ($makes as $make)
                <option value="{{ $make->id }}">{{ $make->name }}</option>
            @endforeach
        </select>
        @error('make')
            <p class="text-red-500">{{ $message }}</p>
        @enderror
    </div>
    <div class="my-6 space-y-2 text-center text-xl">
        <label for="model" class="capitalize">model</label>
        <select name="model_id" class="px-8 py-2 rounded-md bg-gray-200 block">
            <option selected value="">Choose model</option>
            @foreach ($models as $model)
                <option value="{{ $model->id }}">{{ $model->name }}</option>
            @endforeach
        </select>
        @error('model')
            <p class="text-red-500">{{ $message }}</p>
        @enderror
    </div>
</div>