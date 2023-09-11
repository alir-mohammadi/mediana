@props([
    'internals',
    'operators',
    'inputName'
])

<div {{ $attributes }}>
    <select wire:model="internals.{{$inputName}}" type="text" id="default-input"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option {{(data_get($internals,$inputName)) == null ? "selected":"" }} value="">هیچکدام</option>
        @foreach($operators as $operator)
            <option {{(data_get($internals,$inputName)) == $operator['id'] ? "selected":"" }} value="{{$operator['id']}}">{{$operator['name'] .' - '.$operator['phone_number'] }}</option>
        @endforeach
    </select>
</div>
