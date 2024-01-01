<input
    {{ $attributes->merge([
        'class' =>
            $attributes->has('error') &&
            $errors->{$attributes->has('bag') ? $attributes->get('bag') : 'default'}->has($attributes->get('error'))
                ? 'animate__animated animate__shakeX block border border-gray dark:text-slate-300 dark:placeholder:text-slate-400 focus:border-red-300 focus:ring-red-400 p-2.5 rounded-sm text-sm border-red-400 dark:bg-slate-800'
                : 'block border border-gray dark:border-slate-700 dark:text-slate-300 dark:placeholder:text-slate-400  focus:border-deep-purple-300 rounded-sm p-2.5 border-gray-300 dark:bg-slate-800 text-sm',
    ]) }}>

@if ($attributes->has('error'))
    @error($attributes->get('error'), $attributes->has('bag') ? $attributes->get('bag') : null)
        <p class="mt-2 text-sm italic font-semibold text-red-400">
            {{ $message }}
        </p>
    @enderror
@endif
