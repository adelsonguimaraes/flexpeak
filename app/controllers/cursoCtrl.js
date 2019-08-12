angular.module(module).controller('cursoCtrl', function ($rootScope, $scope, authenticationAPI, genericAPI, $location, SweetAlert, $uibModal, $timeout) {
    //Verifica Sessao e permissão de acesso
    if (!$rootScope.usuario) { $location.path("/login"); return false; }

    $scope.title = 'Curso';

    $scope.obj = {
        id: 0,
        idprofessor: 0,
        nome: ''
    }

    $scope.ordenador = "id";
    $scope.reverse = "false";
    $scope.ordernar = function (column) {
        $scope.ordenador = column;
        $scope.reverse = !$scope.reverse;
    }

    $scope.pagination = {
        start: 0,
        limit: 20
    };

    $scope.cursos = [];
    $scope.listarCursos = function () {
        var dataRequest = {
            start: $scope.pagination.start,
            limit: $scope.pagination.limit
        };

        // verificando se o filtro está preenchido
        var data = { "metodo": "listarPaginado", "data": dataRequest, "class": "curso", request: 'GET' };

        $rootScope.loadon();

        genericAPI.generic(data)
            .then(function successCallback(response) {
                //se o sucesso === true
                if (response.data.success == true) {
                    $scope.cursos = response.data.data;
                    $rootScope.loadoff();
                } else {
                    SweetAlert.swal({ html: true, title: "Atenção", text: response.data.msg, type: "error" });
                }
            }, function errorCallback(response) {
                //error
            });
    }
    $scope.listarCursos();

    $scope.professores = [];
    $scope.listarProfessores = function () {
        // verificando se o filtro está preenchido
        var data = { "metodo": "listar", "data": '', "class": "professor", request: 'GET' };

        $rootScope.loadon();

        genericAPI.generic(data)
            .then(function successCallback(response) {
                //se o sucesso === true
                if (response.data.success == true) {
                    $scope.professores = response.data.data;
                    if (response.data.data.length > 0) $scope.obj.idprofessor = response.data.data[0].id;
                    $rootScope.loadoff();
                } else {
                    SweetAlert.swal({ html: true, title: "Atenção", text: response.data.msg, type: "error" });
                }
            }, function errorCallback(response) {
                //error
            });
    }
    $scope.listarProfessores();

    $scope.novo = false;
    $scope.cadNovo = function () {
        $scope.novo = true;
    }
    $scope.cancelaNovo = function () {
        $scope.novo = false;
        $scope.obj = {
            id: 0,
            idprofessor: 0,
            nome: ''
        }
    }
    $scope.salvarNovo = function (obj) {
        SweetAlert.swal({
            title: "Atenção",
            text: "Deseja realmente prosseguir com a operação?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#5cb85c",
            confirmButtonText: "Sim, iniciar!",
            cancelButtonText: "Não, cancele!",
            closeOnConfirm: false,
            closeOnCancel: true
        },
            function (isConfirm) {
                if (isConfirm) {
                    var copy = angular.copy(obj);
                    copy.datanascimento = moment(copy.datanascimento).format('YYYY-MM-DD');

                    var metodo = "cadastrar";
                    if (copy.id > 0) metodo = "atualizar";

                    var data = { "metodo": metodo, "data": copy, "class": "curso", request: 'POST' };

                    $rootScope.loadon();

                    genericAPI.generic(data)
                        .then(function successCallback(response) {
                            //se o sucesso === true
                            if (response.data.success == true) {
                                $rootScope.loadoff();
                                SweetAlert.swal({ html: true, title: "Sucesso", text: 'Curso salvo com sucesso!', type: "success" });

                                $scope.cancelaNovo();
                                $scope.listarCursos();
                            } else {
                                SweetAlert.swal({ html: true, title: "Atenção", text: response.data.msg, type: "error" });
                            }
                        }, function errorCallback(response) {
                            //error
                        });
                }
            });
    }

    $scope.editar = function (obj) {
        $scope.novo = true;
        $scope.obj = {
            id: obj.id,
            idprofessor: obj.idprofessor,
            nome: obj.nome,
            datanascimento: new Date(obj.datanascimento)
        }
    }

    $scope.deletar = function (obj) {
        SweetAlert.swal({
            title: "Atenção",
            text: "Deseja realmente prosseguir com a operação?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#5cb85c",
            confirmButtonText: "Sim, iniciar!",
            cancelButtonText: "Não, cancele!",
            closeOnConfirm: false,
            closeOnCancel: true
        },
            function (isConfirm) {
                if (isConfirm) {
                    var copy = angular.copy(obj);
                    
                    var data = { "metodo": "deletar", "data": copy, "class": "curso", request: 'POST' };

                    $rootScope.loadon();

                    genericAPI.generic(data)
                        .then(function successCallback(response) {
                            //se o sucesso === true
                            if (response.data.success == true) {
                                $rootScope.loadoff();
                                SweetAlert.swal({ html: true, title: "Sucesso", text: 'Curso deletar com sucesso!', type: "success" });

                                $scope.cancelaNovo();
                                $scope.listarCursos();
                                $scope.listarProfessores();
                            } else {
                                SweetAlert.swal({ html: true, title: "Atenção", text: response.data.msg, type: "error" });
                            }
                        }, function errorCallback(response) {
                            //error
                        });
                }
            });
    }
    
});