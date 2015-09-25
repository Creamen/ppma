angular.module('ppma').controller('CategoryIndexController', [

  '$scope', '$rootScope', '$location', '$routeParams', '$route', 'DaoService', 'page',
  ($scope,   $rootScope,  $location,   $routeParams,   $route,   DaoService,   page) ->

    # pass models to scope
    $scope.models = page.data

    # sort table
    $scope.sort = (param) ->
      direction = if $routeParams.s == param and $routeParams.d != 'desc' then 'desc' else 'asc'
      $location.search(s: param, d: direction)

    $scope.delete = (id) ->
      DaoService.Category.delete(id: id, ->
        # send update event
        $rootScope.$broadcast('CategoriesUpdated')

        $route.reload()
      )

])