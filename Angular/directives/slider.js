dashboard.directive('mySlider', function() {
  return {
    restrict: 'E',
    template: '<rzslider rz-slider-model="vm.model" rz-slider-options="vm.sliderOptions"></rzslider>',
    scope: {},
    controller: MySliderCtrl,
    controllerAs: 'vm',
    bindToController: {
      model: '=myModel',
      onChange: '&onChange'
    }
  }
})