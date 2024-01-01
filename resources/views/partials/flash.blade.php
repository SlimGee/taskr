<div
    {{ stimulus_controller('flash', [
        'error' =>
            session()->get('err') ??
            (session()->get('error') ??
                ($errors->any() ? 'There was an error processing your request please try again' : '')),
        'success' => session()->get('success') ?? (session()->get('status') ?? ''),
    ]) }}>

</div>
