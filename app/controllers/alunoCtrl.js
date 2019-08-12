angular.module(module).controller('alunoCtrl', function ($rootScope, $scope, authenticationAPI, genericAPI, $location, SweetAlert, $uibModal, $timeout, $http) {
    //Verifica Sessao e permissão de acesso
    if (!$rootScope.usuario) { $location.path("/login"); return false; }

    $scope.title = 'Aluno';

    $scope.obj = {
        id: 0,
        idcurso: 0,
        nome: '',
        datanascimento: '',
        cep: '',
        logradouro: '',
        numero: '',
        bairro: '',
        cidade: '',
        estado: ''
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

    $scope.alunos = [];
    $scope.listarAlunos = function () {
        var dataRequest = {
            start: $scope.pagination.start,
            limit: $scope.pagination.limit
        };

        // verificando se o filtro está preenchido
        var data = { "metodo": "listarPaginado", "data": dataRequest, "class": "aluno", request: 'GET' };

        $rootScope.loadon();

        genericAPI.generic(data)
            .then(function successCallback(response) {
                //se o sucesso === true
                if (response.data.success == true) {
                    $scope.alunos = response.data.data;
                    $rootScope.loadoff();
                } else {
                    SweetAlert.swal({ html: true, title: "Atenção", text: response.data.msg, type: "error" });
                }
            }, function errorCallback(response) {
                //error
            });
    }
    $scope.listarAlunos();

    $scope.cursos = [];
    $scope.listarCursos = function () {
        // verificando se o filtro está preenchido
        var data = { "metodo": "listar", "data": '', "class": "curso", request: 'GET' };

        $rootScope.loadon();

        genericAPI.generic(data)
            .then(function successCallback(response) {
                //se o sucesso === true
                if (response.data.success == true) {
                    $scope.cursos = response.data.data;
                    if (response.data.data.length > 0) $scope.obj.idcurso = response.data.data[0].id;
                    $rootScope.loadoff();
                } else {
                    SweetAlert.swal({ html: true, title: "Atenção", text: response.data.msg, type: "error" });
                }
            }, function errorCallback(response) {
                //error
            });
    }
    $scope.listarCursos();

    $scope.novo = false;
    $scope.cadNovo = function () {
        $scope.novo = true;
    }
    $scope.cancelaNovo = function () {
        $scope.novo = false;
        $scope.obj = {
            id: 0,
            idcurso: 0,
            nome: '',
            datanascimento: '',
            cep: '',
            logradouro: '',
            numero: '',
            bairro: '',
            cidade: '',
            estado: ''
        }
    }

    $scope.consultaCep = function (obj) {
        $http({
            method: 'GET',
            url: `http://viacep.com.br/ws/${obj.cep}/json/`
        }).then(function successCallback(response) {
            var data = response.data;
            $scope.obj.logradouro = data.logradouro;
            $scope.obj.bairro = data.bairro;
            $scope.obj.cidade = data.localidade;
            $scope.obj.estado = data.uf;
        }, function errorCallback(response) {
                SweetAlert.swal({ html: true, title: "Atenção", text: response.data.msg, type: "error" });
        });
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

                    var data = { "metodo": metodo, "data": copy, "class": "aluno", request: 'POST' };

                    $rootScope.loadon();

                    genericAPI.generic(data)
                        .then(function successCallback(response) {
                            //se o sucesso === true
                            if (response.data.success == true) {
                                $rootScope.loadoff();
                                SweetAlert.swal({ html: true, title: "Sucesso", text: 'Aluno salvo com sucesso!', type: "success" });

                                $scope.cancelaNovo();
                                $scope.listarAlunos();
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
            idcurso: obj.idcurso,
            nome: obj.nome,
            datanascimento: new Date(obj.datanascimento),
            cep: obj.cep,
            logradouro: obj.logradouro,
            numero: obj.numero,
            bairro: obj.bairro,
            cidade: obj.cidade,
            estado: obj.estado
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
                    
                    var data = { "metodo": "deletar", "data": copy, "class": "aluno", request: 'POST' };

                    $rootScope.loadon();

                    genericAPI.generic(data)
                        .then(function successCallback(response) {
                            //se o sucesso === true
                            if (response.data.success == true) {
                                $rootScope.loadoff();
                                SweetAlert.swal({ html: true, title: "Sucesso", text: 'Aluno deletar com sucesso!', type: "success" });

                                $scope.cancelaNovo();
                                $scope.listarAlunos();
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

    $scope.relatorio = function () {
        window.open('./api/src/rest/relatorio_base.php?path=relatorio_alunos&orientation=R', '_blank');
    }
    
});