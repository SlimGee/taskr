<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Cropper extends Component
{
    /**
     * Default attributes value.
     *
     * @var array
     */
    protected $componentAttributes = [
        'value' => null,
        'target' => 'url',
        'url' => null,
        'width' => null,
        'height' => null,
        'minWidth' => 0,
        'minHeight' => 0,
        'maxWidth' => 'Infinity',
        'maxHeight' => 'Infinity',
        'maxFileSize' => 2,
        'staticBackdrop' => false,
        'acceptedFiles' => 'image/*',
        'keepOriginalType' => false,
        'maxSizeValidateMessage' => 'The upload file is too large. Max size: {value} MB',
    ];

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cropper', $this->componentAttributes);
    }
}
