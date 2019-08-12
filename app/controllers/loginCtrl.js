angular.module(module).controller('loginCtrl', function ($rootScope, $scope, $location, authenticationAPI, genericAPI, SweetAlert, $uibModal, $timeout) {
    //Verifica Sessao e permissão de acesso
    if ($rootScope.usuario) { $location.path("/home"); return false; }

    $scope.obj = {
        usuario: null,
        senha: null,
        remember: null
    }

    $scope.logar = function(obj) {

        $rootScope.loadon();
        
        $timeout(function () {
            if (obj.usuario == 'flex' && obj.senha == 'peak') {
                authenticationAPI.createSession(obj, obj.remember);
                $rootScope.loadoff();
                $location.path("/home");
                $rootScope.setValuesMyMenu();
            } else {
                $rootScope.loadoff();
                SweetAlert.swal({ html: true, title: "Atenção", text: "Acesso não permitido<br> Tente Usuario <b>Flex</b> e Senha <b>Peak</b>?", type: "error" });
            }
        }, 600);

    }
});