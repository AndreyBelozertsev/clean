@props([
    'name'
])

<span
    class="text-red-500"
    style="display: none"
    x-show="response?.errors?.{{$name}} ? true : false"
    x-text="response?.errors?.{{$name}}"
></span>