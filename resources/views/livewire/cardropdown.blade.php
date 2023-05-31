<div class="flex justify-around mb-10">
    <div>
        <label for="make" class="text-lg capitalize">make</label>
        <div>
            <select wire:model="selectedMake" class="bg-gray-200 px-4 py-1 rounded-md" name="make">
                    <option value="" selected>Choose make</option>
                    @foreach ($makes as $make)
                        <option value="{{ $make->id }}">{{ $make->name }}</option>
                    @endforeach
            </select>
        </div>
    </div> 
    <div>
        <label for="model" class="text-lg capitalize">model</label>
        <div>
            <select class="bg-gray-200 px-4 py-1 rounded-md" name="model">
                    <option value="" selected>Choose model</option>
                   @foreach ($models as $model)
                        <option value="{{ $model->id }}">{{ $model->name }}</option>
                   @endforeach
            </select>
        </div>
    </div>
</div>