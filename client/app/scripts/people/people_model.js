'use strict';

angular.module('People').factory('people_model', function(model) {
  return model('people_controller');
});