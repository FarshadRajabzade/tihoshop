/*----------------------------------*
Range Slider
*----------------------------------- */
let rangeSlider = document.getElementById('range-slider');

noUiSlider.create(rangeSlider, {
    start: [1000, 10000],
    step: 1000,
    range: {
        'min': [1000],
        'max': [10000]
    },
    format: wNumb({
        decimals: 2,
        thousand: '.',
        prefix: ' $'
    })
});

//range slider value
let nonLinearStepSliderValueElement = document.getElementById('rage-slider-value');

rangeSlider.noUiSlider.on('update', function (values) {
    nonLinearStepSliderValueElement.innerHTML = values.join(' - ');
});
