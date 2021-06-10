<div class="mb-5" id="element" x-data="select()" x-init="init('{{$selected}}')">
    <label id="element-label" class="block text-sm font-medium text-gray-700">
        {{$label}}
    </label>
    <div class="mt-1 relative">
        <button type="button" x-spread="toggle" class="cursor-pointer relative w-full bg-white border border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" aria-haspopup="listbox" aria-expanded="true" aria-labelledby="element-label">
            <span class="flex items-center">
                <span class="capitalize" x-html="selected" class="ml-3 block truncate">
                </span>
            </span>
            <span class="ml-3 absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </span>
        </button>
        <ul class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-56 rounded-md py-1 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm" x-spread="isOpen" tabindex="-1" role="listbox">
            <template x-for="element in {{$elements}}" :key="element">
                <li class="capitalize text-gray-900  transition relative py-2 pl-3 pr-9" @click="update($event, {{$updateFunction}})" :class="{ 'select-none cursor-default':isSelected({{$isSelected}}), 'cursor-pointer hover:text-white hover:bg-indigo-500':!isSelected({{$isSelected}})}" :name="{{$elementName}}" {{$elementAttributes ?? ''}} role="option">
                    <div class="flex items-center">
                        <span x-text="{{$isSelected}}" class="font-normal ml-3 block truncate"></span>
                    </div>
                    <span x-show="isSelected({{$isSelected}})" class="text-indigo-600 absolute inset-y-0 right-0 flex items-center pr-4">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                    </span>
                </li>
            </template>
        </ul>
    </div>
</div>
